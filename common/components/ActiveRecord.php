<?php


namespace common\components;

use yii\data\ActiveDataProvider;
use \yii\db\Expression;
use yii;

abstract class ActiveRecord extends \yii\db\ActiveRecord
{

	abstract public static function table_chema( $migration );

	public static function migrate_up( $migration )
	{


        $tableOptions = null;
        if ($migration->db->driverName === 'mysql') {
            $tableOptions = 
                'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


		$migration->createTable(
			static::tableName(),
			static::table_chema($migration),
            $tableOptions );

        $category = static::getCategoryName();

        if($category)
        {
            $migration->createTable(
                $category::tableName(),
                $category::table_chema($migration),
                $tableOptions );

            $foreignKeyName = 
                'FK_'.\yii\helpers\StringHelper::basename($category);

            $migration->addForeignKey($foreignKeyName,
                static::tableName(),'category_id',
                $category::tableName(), 'id',
                'NO ACTION','NO ACTION');
            
        }

		return true;
	}

	public static function migrate_down( $migration )
	{
		$tbl_name = static::tableName();

		$chema = \Yii::$app->db->schema;

		if($chema->getTableSchema($tbl_name) != null)
            $migration->dropTable($tbl_name);


         $category = static::getCategoryName();

        if($category)
        {
            if($chema->getTableSchema($category::tableName()) != null)
                $migration->dropTable($category::tableName() );
            
        }

        return true;
	}

    public static function getCategoryName()
    {
        $class_name = static::className().'Category';
        
        return class_exists( $class_name ) ?
            $class_name :
            false;
    }

    public static function getBaseName()
    {
        $self_class = static::className();
        
        $matches = [];

        $is_ok = preg_match('/((?:[A-Z][a-z]+)+?)[A-Z][a-z]+/',
            $self_class,
            $matches);

        if(!$is_ok)
            return false;
        else
            return $matches[1];
        
    }

	public static function hasAttr($attr)
	{
			$model = new static;
			return $model->hasAttribute($attr);
	}

	public static function backend_list_query($show_trash )
	{
		$query = static::find();

		
		if(static::hasAttr('deleted'))
			$query = $query->where(['deleted' => $show_trash ]);
        else
            if($show_trash)
                throw new \yii\web\BadRequestHttpException(
                    'У данной таблицы нет метки "в корзине"');



        $base_model_name = \yii\helpers\StringHelper::basename(
            static::className());


        if(isset(yii::$app->request->queryParams[$base_model_name]))
        {
            foreach (yii::$app->request->queryParams[$base_model_name]
                as $key => $value)
            {

                if(empty($value))
                    continue;

                $query = $query->andFilterWhere(['like', $key, $value]);
            }
        }

		return $query;
	}

    public static function list_query()
    {

    	$query = static::find();

    	
    	if(static::hasAttr('deleted'))
    		$query = $query->andWhere(['deleted' => false]);


    	if(static::hasAttr('removed'))
    		$query = $query->andWhere(['removed' => false]);

    	return $query;
    }


    public static function backend_search( $show_trash )
    {
    	return new ActiveDataProvider([
		    'query' => static::backend_list_query($show_trash),
		    'pagination' => [
		        'pageSize' => 10,
		    ],
		]);
    }


    public static function frontend_search( )
    {
    	return  new ActiveDataProvider([
		    'query' => self::list_query(),
		    'pagination' => [
		        'pageSize' => 10,
		    ],
		]);
    }



    public static function search( $show_trash = 0 )
    {
    	return (Yii::$app->id == 'backend') ?
    	self::backend_search( $show_trash ) :
    	self::frontend_search( );

    }

    public function attributeLabels()
    {

        return array_merge([
            'id' => 'Номер',
            'name' => 'Название',
            'url' => 'Ссылка',
            'content' => 'Содержание',
            'image' => 'Изображение',
            'category_id' => 'Категория',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'deleted_at' => 'Дата удаления',
            'removed' => 'Скрыта',
            'deleted' => 'Удалена',
            'is_root' => 'root-Админ',
        ],$this->customLabels() );
    }

    public function customLabels()
    {
        return [];
    }



    public function rules()
    {
        return array_merge([
             /*[ 
               ['updated_at','created_at'],
                'safe','on' => 'search'],*/
        ],
        $this->customRules() );
    }


   public function search_rules()
   {
        $attr_list = [];
        foreach ($this->attributeLabels() as $attr => $label) {
            $attr_list[] = $attr;
        }

        return [[ $attr_list, 'safe']];
   }



    public function customRules()
    {
        return [];
    }


    public static function getSearchModel()
    {
        return static::className().'Search';
    }


    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $now = new Expression('NOW()');

        if($this->isNewRecord)
        {
            if($this->hasAttr('created_at'))
                $this->created_at = $now;

            if($this->hasAttr('deleted'))
                $this->deleted = false;

            if($this->hasAttr('removed'))
                $this->removed = false;
        }


        if($this->hasAttr('updated_at'))
                $this->updated_at = $now;

        return true;
    }
}












