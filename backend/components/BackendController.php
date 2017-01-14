<?
namespace backend\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BackendController extends \common\components\DefaultController
{

	public $defaultAction = 'list';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['login', 'error'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        //'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'list' => [ 'class' => 'common\components\actions\ListAction' ],
            'update' => [ 'class' => 'common\components\actions\UpdateAction' ],
            'hide' => [ 'class' => 'common\components\actions\HideAction' ],
            'delete' => [ 'class' => 'common\components\actions\DeleteAction' ],
        ];
    }


}