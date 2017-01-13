<?
namespace backend\modules\page\controllers;

use Yii;
//use \common\models\Page;
use \yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{

	public $defaultAction = 'list';

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



    public function modelName()
    {
    	$controller_name = $this->id;


    	return '\\common\\models\\'. ucfirst($controller_name);
    }
}