<?php


namespace frontend\components\categoryActions;

class ListAction extends \yii\base\Action
{
    public function run( )
    {
        return $this->controller->render('list', [
        	'dataProvider' => $this->controller->modelName()::searchFrontend(  ),
        	]);
    }
}