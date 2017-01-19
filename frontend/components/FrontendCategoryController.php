<?
namespace frontend\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class FrontendCategoryController extends \common\components\DefaultCategoryController
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
            'view' => [ 'class' => 'frontend\components\categoryActions\ViewAction' ],
            'list' => [ 'class' => 'frontend\components\categoryActions\ListAction' ],
        ];
    }


}