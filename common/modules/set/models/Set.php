<?


namespace common\modules\set\models;
use yii\data\ActiveDataProvider;

class Set extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%set}}';
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['name','description', 'value'], 'required','message' => 'Это обязательное поле'],
            [['name','description'], 'string', 'max' => 255],
            [['value'], 'string', 'max' => 65535],
            ['name', 'unique', 'message' => "Такой параметр уже существует."],
        ];
    }



    public static function search( $show_removed = null)
    {

    	$query = self::find();

        if (isset($show_removed) && $show_removed)
            $query = self::find()->where(['deleted' => true]);
        else
            $query = self::find()->where(['deleted' => false]);



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
            'value' => 'Значение',
            'description' => 'Описание',
        ];
    }

    public static function value($settingName)
    {
        $model = self::findOne([ 'name' => $settingName ]);

        if(!$model)
            throw \yii\db\Exception;

        
        return $model->value;
    }

}


