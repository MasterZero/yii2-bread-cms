<?
namespace common\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;
use common\modules\set\models\Set;

class DefaultController extends \yii\web\Controller
{

    public $model = null;

    public function beforeAction($action)
    {
        if(!parent::beforeAction($action))
            return false;

        if(isset($this->module) && isset($this->module->name))
            $this->view->title =  Set::value('name').' - '.$this->module->name;

        return true;
    }

    public function getModel($id = null)
    {

        $modelName = $this->modelName();

        if(!isset($modelName))
            throw new NotFoundHttpException;

        if(!isset($id))
            return new $modelName;
        else
        {
             $model = $modelName::findOne($id);

            if(!isset($model))
                throw new NotFoundHttpException;


            $this->model = $model;


            return $model;
        }
    }

    public function modelName()
    {
    	$controller_name = $this->module->id;
    	return '\\common\\modules\\'.$controller_name.'\\models\\'. ucfirst($controller_name);
    }

    public function getUrlByModel($model)
    {
        return '\\'.\yii::$app->controller->id.'\\'.$model->url;
    }
}