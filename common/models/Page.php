<?


namespace common\models;
use yii\data\ActiveDataProvider;

class Page extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%page}}';
    }





    public static function search()
    {

    	$query = self::find();



    	return  new ActiveDataProvider([
		    'query' => $query,
		    /*'pagination' => [
		        'pageSize' => 10,
		    ],*/
		]);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'url' => 'Ссылка',
            'content' => 'Содержание',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'removed' => 'Скрыта',
            'deleted' => 'Удалена',
        ];
    }

}


