<?php


namespace common\components\actions;

class ListAction extends \yii\base\Action
{
    public function run( $trash = false )
    {

    	$model = new $this->controller->model->searchModel;

    	$model->load(\Yii::$app->request->queryParams);

        return $this->controller->render('list', [
        	'dataProvider' => $model->search( $trash ),
        	'searchModel' => $model,
            'baseModelName' => $this->controller->modelName,
        	'trash' => $trash,
        	]);
    }
}