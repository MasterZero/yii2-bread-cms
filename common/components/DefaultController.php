<?
namespace common\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;
//use common\modules\set\models\Set;



class DefaultController extends \yii\web\Controller
{

    public $defaultAction = 'list';


    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
            return false;

        //if(isset($this->module) && isset($this->module->name))
           // $this->view->title =  Set::value('name').' - '.$this->module->name;
        return true;
    }



    public function getModel($id = null)
    {

        $modelName = $this->modelName;

        if(!isset($modelName))
            throw new NotFoundHttpException;

        if(!isset($id))
            return new $modelName;
        else
        {
             $model = $modelName::findOne($id);

            if(!isset($model))
                throw new NotFoundHttpException;


            return $model;
        }
    }

    public function GetModelName()
    {
    	$module_name = $this->module->id;
        $controller_name = $this->id;

        $modelname = 
            '\\common\\modules\\'.
            $module_name.
            '\\models\\'.
            ucfirst($module_name);

        if($controller_name != 'module')
            $modelname .= ucfirst($controller_name);

    	return $modelname;
    }

    
    public static function sendAdminMail($subject, $html)
    {
        //$from = Set::value('send_from');
        //$to = Set::value('send_mail');
        //$to2 = Set::value('send_mail2');
    
        if(!empty($to))
            Yii::$app->mailer->compose()
                    ->setFrom($from )
                    ->setTo($to)
                    ->setSubject($subject)
                    ->setHtmlBody($html)
                    ->send();
                    
        if(!empty($to2))
            Yii::$app->mailer->compose()
                    ->setFrom($from )
                    ->setTo($to2)
                    ->setSubject($subject)
                    ->setHtmlBody($html)
                    ->send();
    }







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
            'destroy' => [ 'class' => 'common\components\actions\DestroyAction' ],
            'clone' => [ 'class' => 'common\components\actions\CloneAction' ],
        ];
    }
    
}
