<?
use common\widgets\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['buttons'] = $trash ? ['list']:
[
    'add',
    'trash',
    /*[
        'icon' => 'plus',
        'label' => 'Кнопка',
        'url' => ['update'],
        'btn_class' => 'btn-danger',
    ]*/
];

?>

<h1><?= Yii::$app->controller->module->name ?>
     - <?= $trash ? 'корзина':'список';?></h1>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'controllerModel' => $baseModelName,
    'trash' => $trash,
    'columns' => [],
]) ?>



