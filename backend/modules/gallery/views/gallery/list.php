<?
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;


use kartik\icons\Icon;

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


<h1><?= Yii::$app->controller->module->name ?></h1>


<?= masterzero\widgets\Nestable::widget([
            'query' => $query,
            'buttons' => [


                ['label' => Icon::show('bars', [], Icon::FA),
                    'url' => function($data){ return Url::toRoute(['item/list', 'container_id'=>$data->primaryKey]);},
                    'options'=>['title'=>'Список изображений', 'data-pjax' => 0]],

                ['label' => Icon::show('pencil', [], Icon::FA),
                    'url' => function($data){ return Url::toRoute(['update', 'id'=>$data->primaryKey]);},
                    'options'=>['title'=>'Редактировать', 'data-pjax' => 0]],

                ['label' => Icon::show('eye', [], Icon::FA),
                    'url' => function($data){ return Url::toRoute(['hide', 'id'=>$data->primaryKey]);},
                    'options'=>[
                        'title'=>'Скрыть',
                        'data-method' => 'POST',
                        'data-pjax' => '0',
                        'data-confirm'=>"Вы действительно хотите скрыть этот элемент?",
                    ],
                    'visible' => function($data){ return $data->hasAttribute('removed')&&!$data->removed;}],
                ['label' => Icon::show('eye-slash', [], Icon::FA),
                    'url' => function($data){ return Url::toRoute(['hide', 'id'=>$data->primaryKey]);},
                    'options'=>['title'=>'Восстановить'],
                    'visible' => function($data){ return $data->hasAttribute('removed')&&$data->removed;}],
                ['label' => Icon::show('remove', [], Icon::FA),
                    'url' => function($data){ return Url::toRoute(['delete', 'id'=>$data->primaryKey]);},
                    'options'=>[
                        'title'=>'Удалить',
                        'data-method' => 'POST',
                        'data-pjax' => '0',
                        'data-confirm'=>"Вы действительно хотите удалить этот элемент?",
                    ],
                    ],
            ]


        ]);
?>

