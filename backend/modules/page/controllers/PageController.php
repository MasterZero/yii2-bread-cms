<?
namespace backend\modules\page\controllers;

use Yii;
//use \common\models\Page;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;

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
        	'dataProvider' => $this->modelName()::search( $show_removed ),
        	'show_removed' => $show_removed ]);
    }


    public function actionUpdate( $id = null )
    {

    	$modelName = $this->modelName();

        if(isset($id))
            $model = $modelName::findOne($id);

        if(!isset($id))
    	   $model = new $modelName;

        if ($model->load(Yii::$app->request->post()))
        {

            if($model->isNewRecord)
            {
                $model->created_at = new Expression('NOW()');
            }

            $model->updated_at = new Expression('NOW()');

            if($model->save())
                return $this->redirect(['list']);
        }

        return $this->render('update', [
            'model' => $model]);

    }

    public function actionHide($id)
    {
        $modelName = $this->modelName();

        $model = $modelName::findOne($id);

        if(!isset($model))
            throw new NotFoundHttpException;

        $model->removed ^= true;

        if(!$model->save())
            throw new \yii\db\Exception;

        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionDelete($id)
    {
        $modelName = $this->modelName();

        $model = $modelName::findOne($id);

        if(!isset($model))
            throw new NotFoundHttpException;

        $model->deleted ^= true;

        if(!$model->save())
            throw new \yii\db\Exception;

        return $this->redirect(Yii::$app->request->referrer/*['list']*/);
        //return $this->goBack((!empty(Yii::$app->request->referrer) ? Yii::$app->request->referrer : null));
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