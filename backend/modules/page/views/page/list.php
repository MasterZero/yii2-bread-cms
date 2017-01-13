<?
use yii\grid\GridView;
use yii\widgets\Menu;


$menu_items = ($show_removed) ?
			[[
	        	'label' => 'Назад',
	        	'url' => ['list']
	    ]] : 
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
    'items' => $menu_items/*\Yii::$app->controller->module->menuItems*/,
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



