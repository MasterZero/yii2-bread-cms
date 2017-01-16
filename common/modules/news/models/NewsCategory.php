<?


namespace common\modules\news\models;
use yii\data\ActiveDataProvider;
use creocoder\nestedsets\NestedSetsBehavior;

class NewsCategory extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%news_category}}';
    }


    public function behaviors() {
        return [
            'tree' => [
                'class' => NestedSetsBehavior::className(),
                // 'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
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
            [['removed','index'], 'safe'],

        ];
    }


    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    public static function find()
    {
        return new \common\models\CategoryQuery(get_called_class());
    }


    public static function search( $show_removed = null)
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


