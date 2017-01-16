<?
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


$menu_items = [
		[
	        	'label' => 'Добавить',
	        	'url' => ['update']
	    ],
	];

?>





<?= Menu::widget([
    'items' => $menu_items,
    ]);

?>


<h1>Категории модуля "<?= Yii::$app->controller->module->name ?>"</h1>



<?= masterzero\widgets\Nestable::widget([
            'query' => $query,
        ]);
?>

