<?
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


$menu_items = [
		[
	        	'label' => 'Назад',
	        	'url' => [ Yii::$app->controller->module->id . '/' ]
	    ],
		[
	        	'label' => 'Добавить',
	        	'url' => ['update']
	    ],
	];

?>





<?= Menu::widget([
    'items' => $menu_items,
    'options' => [
        'class' => 'nav nav-tabs'
        ],
    ]);

?>


<h1>Категории модуля "<?= Yii::$app->controller->module->name ?>"</h1>



<?= masterzero\widgets\Nestable::widget([
            'query' => $query,
        ]);
?>

