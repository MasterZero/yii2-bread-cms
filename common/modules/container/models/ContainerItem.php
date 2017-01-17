<?


namespace common\modules\container\models;
use yii\data\ActiveDataProvider;

class ContainerItem extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%container_item}}';
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['name', 'url', 'content'], 'required','message' => 'Это обязательное поле'],
            [['name', 'url','image'], 'string', 'max' => 255],
            [['content','description'], 'string', 'max' => 65535],
            [['removed','deleted'], 'boolean'],
            [['container_id'], 'integer'],
            ['url', 'unique', 'message' => "Такой url уже существует."],
            // the email attribute should be a valid email address
            ['url', 'match', 'pattern' => '/^[a-zA-Z][a-zA-Z0-9-]{2,}$/i',
                'message' => "Поле должно состоять из букв английского алфавита, цифр и знака минуса (-).
                Поле должно начинаться только с буквы.
                Поле должно быть не менее 3 символов."],
            //[['image'], 'safe'],

        ];
    }



    public static function search( $container_id, $show_removed = null)
    {

    	$query = self::find()->where([ 'container_id' => $container_id ]);

        if (isset($show_removed) && $show_removed)
            $query = $query->andWhere(['deleted' => true]);
        else
            $query = $query->andWhere(['deleted' => false]);



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
            'image' => 'Изображение',
            'content' => 'Содержание',
            'description' => 'Описание',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
            'removed' => 'Скрыта',
            'deleted' => 'Удалена',
        ];
    }

}


