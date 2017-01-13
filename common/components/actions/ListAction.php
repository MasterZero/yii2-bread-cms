<?php


namespace common\components\actions;

class ListAction extends \yii\base\Action
{
    public function run( $show_removed = false )
    {
        return $this->controller->render('list', [
        	'dataProvider' => $this->controller->modelName()::search( $show_removed ),
        	'show_removed' => $show_removed ]);
    }
}