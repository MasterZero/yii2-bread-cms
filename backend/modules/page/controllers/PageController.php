<?
namespace backend\modules\page\controllers;

use Yii;
use \common\models\Page;
use \yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{

	public $defaultAction = 'list';

    public function actionList( $show_removed = false )
    {
    	var_dump($show_removed);

        return $this->render('list', [
        	'dataProvider' => Page::search(),
        	'show_removed' => $show_removed ]);
    }
}