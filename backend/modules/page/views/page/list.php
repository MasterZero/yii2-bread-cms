<?
use yii\grid\GridView;
use yii\widgets\Menu;


$menu_items = ($show_removed) ?
	[
		[
	        	'label' => 'Назад',
	        	'url' => ['list']
	    ]
	] : // full menu
	[
		[
	        	'label' => 'Добавить',
	        	'url' => ['update']
	    ],
	    [
	        	'label' => 'Корзина',
	        	'url' => ['list', 'show_removed' => true ]
	    ],
	];



?>





<?= Menu::widget([
    'items' => $menu_items,
    ]);


?>


<h1><?= Yii::$app->controller->module->name ?></h1>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'url',
        'created_at',
        'updated_at',
        /*'created_at:datetime',*/
        // ...
    ],
]) ?>



