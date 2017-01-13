<?
namespace backend\modules\page\controllers;

use Yii;
//use \common\models\Page;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class PageController extends \yii\web\Controller
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

    public function actionList( $show_removed = false )
    {

        return $this->render('list', [
        	'dataProvider' => $this->modelName()::search(),
        	'show_removed' => $show_removed ]);
    }


    public function actionUpdate( $id = null )
    {

    	$modelName = $this->modelName();
    	$model = new $modelName;

        return $this->render('update', [
        	'model' => $model]);
    }


    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
            return false;


        $this->view->title = $this->module->name;
        return true;
    }



    public function modelName()
    {
    	$controller_name = $this->id;


    	return '\\common\\modules\\'.$controller_name.'\\models\\'. ucfirst($controller_name);
    }
}