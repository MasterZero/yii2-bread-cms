<?
namespace backend\modules\page\controllers;

use Yii;
use backend\modules\page\models\Page;
use \yii\web\NotFoundHttpException;

class PageController extends \yii\web\Controller
{
    public function actionList()
    {


        return $this->render('list');
    }
}