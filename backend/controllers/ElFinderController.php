<?



namespace backend\controllers;
use Yii;
use yii\web\Controller;
use zxbodya\yii2\elfinder\ConnectorAction;

class ElFinderController extends Controller
{
    public function actions()
    {
        return [
            'connector' => array(
                'class' => ConnectorAction::className(),
                'settings' => array(
                    'root' => Yii::getAlias('@app').'/../frontend/web/uploads/'/*Yii::getAlias('@webroot').'/uploads/'*/,
                    'URL' => '/uploads/'/*Yii::getAlias('@web').'/uploads/'*/,
                    'rootAlias' => 'home',
                    'mimeDetect' => 'none'
                )
            ),
        ];
    }
}


