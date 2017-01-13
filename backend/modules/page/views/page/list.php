<?
use yii\grid\GridView;
use yii\widgets\Menu;


?>





<?= Menu::widget([
    'items' => \Yii::$app->controller->module->menuItems,
    ]);


?>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        /*'created_at:datetime',*/
        // ...
    ],
]) ?>



