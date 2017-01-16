<?php


namespace common\components\categoryActions;

class ListAction extends \yii\base\Action
{
    public function run( )
    {
        return $this->controller->render('list', [
        	'query' => $this->controller->modelName()::find() ]);
    }
}