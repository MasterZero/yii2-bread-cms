<?


namespace common\modules\gallery\models;
use yii\data\ActiveDataProvider;

class GalleryItem extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%gallery_item}}';
    }

    public function rules()
    {
        return [
            // the name, email, subject and body attributes are required
            [['name', 'image'], 'required','message' => 'Это обязательное поле'],
            [['name', 'image'], 'string', 'max' => 255],
            [['content','description'], 'string', 'max' => 65535],
            [['gallery_id','index'], 'integer'],
            [['index'], 'safe'],

        ];
    }



    public static function search($gallery_id , $show_removed = null)
    {

    	$query = self::find()->where(['gallery_id' => $gallery_id]);

        if (isset($show_removed) && $show_removed)
            $query = $query->andWhere(['deleted' => true]);
        else
            $query = $query->andWhere(['deleted' => false]);



    	return  new ActiveDataProvider([
		    'query' => $query,
		]);
    }


    public function getGallery()
    {
        return $this->hasOne( common\modules\gallery\Gallery::class_name , ['id' => 'category_id']);
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


