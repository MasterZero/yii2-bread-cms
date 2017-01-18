<?php


namespace common\components\categoryActions;

class ListAction extends \yii\base\Action
{
    public function run( $show_removed = false)
    {
        return $this->controller->render('list', [
        	'query' => $this->controller->modelName()::find(),
        	'show_removed' => $show_removed ]);
    }
}