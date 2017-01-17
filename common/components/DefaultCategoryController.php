<?
namespace common\components;

use Yii;
use \yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Expression;

class DefaultCategoryController extends DefaultController
{

    public function modelName()
    {
    	$controller_name = $this->module->id;


    	return parent::modelName().'Category';
    }
}