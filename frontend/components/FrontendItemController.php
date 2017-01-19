<?
namespace backend\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BackendItemController extends \common\components\DefaultItemController
{

	public $defaultAction = 'list';


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
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
            'list' => [ 'class' => 'common\components\itemActions\ListAction' ],
            'update' => [ 'class' => 'common\components\itemActions\UpdateAction' ],
            'hide' => [ 'class' => 'common\components\itemActions\HideAction' ],
            'delete' => [ 'class' => 'common\components\itemActions\DeleteAction' ],
        ];
    }


}