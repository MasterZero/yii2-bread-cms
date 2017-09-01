<?
use common\widgets\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['buttons'] = [
    'add',
];



?>

<h1><?= Yii::$app->controller->module->name ?></h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'controllerModel' => $baseModelName,
    'trash' => $trash,
    'columns' => [],
]) ?>



