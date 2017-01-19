<?
namespace frontend\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class FrontendController extends \common\components\DefaultController
{

	public $defaultAction = 'view';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['login', 'error'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'view' => [ 'class' => 'frontend\components\actions\ViewAction' ],
            'list' => [ 'class' => 'frontend\components\actions\ListAction' ],
        ];
    }


}