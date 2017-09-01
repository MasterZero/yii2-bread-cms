<?
use common\widgets\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


if($trash)
    $this->params['buttons'] = ['list'];
else
{
    $this->params['buttons'] = [
        'add',
        'trash',
        /*[
            'icon' => 'plus',
            'label' => 'Кнопка',
            'url' => ['update'],
            'btn_class' => 'btn-danger',
        ]*/
    ];

    if($baseModelName::getCategoryName())
        $this->params['buttons'][] = 'category';

    if($baseModelName::getBaseName())
        $this->params['buttons'][] = 'base';
}

?>

<h1><?= Yii::$app->controller->module->name ?>
     - <?= $trash ? 'корзина':'список';?> категорий</h1>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'controllerModel' => $baseModelName,
    'trash' => $trash,
    'columns' => [],
]) ?>



