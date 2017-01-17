<?
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;


$menu_items = ($show_removed) ?
	[
		[
	        	'label' => 'Назад',
	        	'url' => ['list', 'container_id' => $container->id]
	    ]
	] : // full menu
	[
        [
                'label' => 'Назад',
                'url' => ['container/']
        ],
		[
	        	'label' => 'Добавить',
	        	'url' => ['update','container_id' => $container->id]
	    ],
	    [
	        	'label' => 'Корзина',
	        	'url' => ['list', 'show_removed' => true , 'container_id' => $container->id ]
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


<h1><?= Yii::$app->controller->module->name ?> объекта "<?= $container->name ?>"</h1>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'url',
        'created_at',
        'updated_at',
        [
            'attribute'=>'image',
            'content'=>function($data){
                return Html::img($data['image'],[ 'class' => 'img-responsive' ]);
            }
        ],
        /*'created_at:datetime',*/
        // ...

        [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '80'],
            'template' => '{hide} {update} {delete}',
            'buttons' => [
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



