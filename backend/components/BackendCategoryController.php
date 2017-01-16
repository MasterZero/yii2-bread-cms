<?
namespace backend\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class BackendCategoryController extends \common\components\DefaultCategoryController
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
        ];
    }


    public function actions()
    {
        return [
            'list' => [ 'class' => 'common\components\categoryActions\ListAction' ],
            'update' => [ 'class' => 'common\components\categoryActions\UpdateAction' ],
            'hide' => [ 'class' => 'common\components\categoryActions\HideAction' ],
            'delete' => [ 'class' => 'common\components\categoryActions\DeleteAction' ],
            'restruct' => [
                'class' => 'common\components\categoryActions\RestructAction',
                'modelName' => $this->modelName() ],
            /*'nodeMove' => [
                'class' => 'slatiusa\nestable\NodeMoveAction',
                'modelName' => $this->modelName(),
            ],*/
        ];
    }


}