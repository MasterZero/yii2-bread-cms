<?php


namespace common\components\actions;

class ViewAction extends \yii\base\Action
{
    public function run( $url )
    {

    	$model = $this->controller->modelName()::findOne(['url' => $url , 'removed' => false ]);

        if(!$model)
            throw new \yii\web\NotFoundHttpException('Данной страницы не существует');


        return $this->controller->render('view', [
            'model' => $model]);

    }
}
