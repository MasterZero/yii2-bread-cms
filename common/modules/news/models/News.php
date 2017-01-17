<?


namespace common\modules\news\models;
use yii\data\ActiveDataProvider;

class News extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%news}}';
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['name', 'url', 'content'], 'required','message' => 'Это обязательное поле'],
            [['name', 'url', 'image'], 'string', 'max' => 255],
            [['content','description'], 'string', 'max' => 65535],
            [['removed'], 'boolean'],
            ['url', 'unique', 'message' => "Такой url уже существует."],
            // the email attribute should be a valid email address
            ['url', 'match', 'pattern' => '/^[a-zA-Z][a-zA-Z0-9-]{2,}$/i',
                'message' => "Поле должно состоять из букв английского алфавита, цифр и знака минуса (-).
                Поле должно начинаться только с буквы.
                Поле должно быть не менее 3 символов."],
            [['index',self::categoryField()], 'safe'],

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


    public function getCategory()
    {
        return $this->hasOne(self::className().'Category', ['id' => 'news_category_id']);
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'url' => 'Ссылка',
            'image' => 'Картинка',
            'description' => 'Описание',
            'content' => 'Содержание',
            'index' => 'Порядковый номер',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'removed' => 'Скрыта',
            'deleted' => 'Удалена',
            self::categoryField() => 'Категория',
        ];
    }


    public static function categoryField()
    {
        return \Yii::$app->controller->module->id.'_category_id';
    }

    public static function categoryModelName()
    {
        return self::class.'Category';
    }

}


