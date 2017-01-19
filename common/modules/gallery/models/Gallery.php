<?


namespace common\modules\gallery\models;
use yii\data\ActiveDataProvider;

class Gallery extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%gallery}}';
    }

    public function behaviors() {
        return [
            'tree' => [
                'class' => \creocoder\nestedsets\NestedSetsBehavior::className(),
                'treeAttribute' => 'tree',
                'leftAttribute' => 'lft',
                'rightAttribute' => 'rgt',
                'depthAttribute' => 'depth',
            ],
        ];
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['name', 'url'], 'required','message' => 'Это обязательное поле'],
            [['name', 'url', 'image'], 'string', 'max' => 255],
            [['content','description'], 'string', 'max' => 65535],
            ['url', 'unique', 'message' => "Такой url уже существует."],
            // the email attribute should be a valid email address
            ['url', 'match', 'pattern' => '/^[a-zA-Z][a-zA-Z0-9-]{2,}$/i',
                'message' => "Поле должно состоять из букв английского алфавита, цифр и знака минуса (-).
                Поле должно начинаться только с буквы.
                Поле должно быть не менее 3 символов."],

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

        if (isset($show_removed) && $show_removed)
            $query = self::find()->where(['deleted' => true]);
        else
            $query = self::find()->where(['deleted' => false]);



    	return  new ActiveDataProvider([
		    'query' => $query,
		]);
    }


    public static function searchFrontend( $url = null )
    {

        if(is_null($url))
            $query = self::find()->where(['depth' => 0] );
        else
        {
            $model = self::find()->where(['url' => $url])->one();
            $query = $model->children(1);
        }

        $query->andWhere( [ 'removed' => false] );
        $query->andWhere( [ 'deleted' => false] );



        return  new ActiveDataProvider([
            'query' => $query,
        ]);
    }


    public function getFrontendImages()
    {
        return (self::className().'Item')::findAll([
            'gallery_id' => $this->id,
            'removed' => false,
            'deleted' => false]);
    }


    public function getImages()
    {
        return $this->hasMany(self::className().'Item', ['gallery_id' => 'id']);
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
        ];
    }
}


