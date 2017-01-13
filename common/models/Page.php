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
}


