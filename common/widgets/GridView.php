<?
namespace common\widgets;

use yii\helpers\Html;
use yii\helpers\Url;


class GridView extends \yii\grid\GridView
{
	public $controllerModel = null;
	public $trash = 0;

    public $columns = [];
    public $add_it_if_exist = [
        'id',
        'name',
        'url',
        'image',
        'is_root',
        'category_id',
        'created_at',
        'updated_at',
        ];

	public function init()
	{

		$template = '';
        $class_model = $this->controllerModel;


        if(empty($this->columns))
        {
            foreach ($this->add_it_if_exist as $column)
            {
                if($class_model::hasAttr($column))
                    $this->columns[] = $column;
            }
        }


		if($this->trash)
		{
			if($class_model::hasAttr('deleted_at'))
				$this->columns[] = 'deleted_at';

			$template .= '{delete} {destroy} ';
		}
		else
		{
			if($class_model::hasAttr('removed'))
			$template .= '{hide} ';

			$template .= '{update} {clone} ';


			if($class_model::hasAttr('deleted'))
				$template .= '{delete} ';
            else
                $template .= '{destroy} ';

		}

		
		foreach ($this->columns as $key => $column) {
			if(!is_string($column))
				continue;

			$this->columns[$key] = [
		            'attribute'=> $column,
		            'content'=> function ($model, $key, $index, $column){

		            		$attr = $column->attribute;
							return Html::a($model->$attr,
		                		Url::to(['update', 'id' => $key]),
		                		['title' => 'Редактировать'] );
						}
		        ];
		}


		$this->columns[] = [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            //'headerOptions' => ['width' => '80'],
            'template' => $template,
            'buttons' => [
                'update' => function ($url,$model) {
                    return Html::a(
                    '<span title="Редактировать" 
                    	class="glyphicon glyphicon-pencil">
                    </span>', 
                    $url);
                },

                'clone' => function ($url,$model) {
                    return Html::a(
                    '<span title="Клонировать" 
                    	class="fa fa-clone">
                    </span>', 
                    $url);
                },

                'hide' => function ($url,$model) {

                	$icon = $model->removed ? 'glyphicon-eye-close' : 'glyphicon-eye-open';

                	$title = $model->removed ? 'Скрыто. Сделать видимым' :
                		'Видно всем. Скрыть';

                    return Html::a(
                    '<span class="glyphicon '.$icon.
                    '" title="'.$title.
                    '"></span>', 
                    $url);
                },

                'delete' => function ($url,$model) {

                	$icon = $model->deleted ? 'fa fa-check' : 'fa fa-trash';

                	$title = $model->deleted ? 'Восстановить' :
                		'В корзину';

                    return Html::a(
                    '<i class="glyphicon '.$icon.
                    '" title="'.$title.
                    '"></i>', 
                    $url);
                },


                'destroy' => function ($url,$model) {
                    return Html::a(
                    '<span title="Уничтожить" 
                    	class="fa fa-close">
                    </span>', 
                    $url);
                },
            ],
        ];

		return parent::init();
	}

}
