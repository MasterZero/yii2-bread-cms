<?


namespace common\modules\seo\models;
use yii\data\ActiveDataProvider;

class Seo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%seo}}';
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['keywords','description','title'], 'required'],
            [['module', 'controller', 'keywords', 'description', 'title'], 'string', 'max' => 255],
            [['model_pk'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'title' => 'Заголовок',
        ];
    }

}


