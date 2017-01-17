<?php


namespace common\components\itemActions;

class ListAction extends \yii\base\Action
{
    public function run( $container_id, $show_removed = false )
    {

    	$container = $this->controller->containerModelName()::findOne($container_id);

    	if(!isset($container))
            throw new NotFoundHttpException;

        return $this->controller->render('list', [
        	'dataProvider' => $this->controller->modelName()::search( $container_id , $show_removed ),
        	'show_removed' => $show_removed,
        	'container' => $container]);
    }
}