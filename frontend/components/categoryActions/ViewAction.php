<?php


namespace frontend\components\categoryActions;

class ViewAction extends \yii\base\Action
{
    public function run( $url )
    {

    	$model = $this->controller->modelName()::findOne(['url' => $url , 'removed' => false,'deleted' => false,  ]);

        if(!$model)
            throw new \yii\web\NotFoundHttpException('Данной страницы не существует');
        


        

        return $this->controller->render('view', [
            'model' => $model,
            'categoryDataProvider' => $model->searchFrontend( $url ),
            'items' => $model->images ]);

    }
}