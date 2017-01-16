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
            [['name'], 'required','message' => 'Это обязательное поле'],
            [['removed'], 'boolean'],
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


