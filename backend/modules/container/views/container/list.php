<?
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


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
    'options' => [
        'class' => 'nav nav-tabs'
        ],
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

        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия',
            'headerOptions' => ['width' => '80'],
            'template' => '{edit} {hide} {update} {delete}',
            'buttons' => [

                'edit' => function ($url,$model) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-list"></span>',
                    Url::to(['item/', 'container_id' => $model->id]) );
                },
                'update' => function ($url,$model) {
                    return Html::a(
                    '<span class="glyphicon glyphicon-pencil"></span>',
                    $url);
                },

                'hide' => function ($url,$model) {

                	$icon = $model->removed ? 'glyphicon-eye-close' : 'glyphicon-eye-open';
                    return Html::a(
                    '<span class="glyphicon '.$icon.'"></span>',
                    $url);
                },
            ],
        ],


    ],
]) ?>



