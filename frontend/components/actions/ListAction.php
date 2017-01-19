<?php


namespace frontend\components\actions;

class ListAction extends \yii\base\Action
{
    public function run( )
    {
        return $this->controller->render('list', [
        	'dataProvider' => $this->controller->modelName()::searchFrontend(  ),
        	]);
    }
}