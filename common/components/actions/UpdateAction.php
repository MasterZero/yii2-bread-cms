<?php


namespace common\components\actions;


use \yii\helpers\Url;

class UpdateAction extends \yii\base\Action
{
    public function run( $id = null )
    {

    	$model = $this->controller->getModel($id);

        if ($model->load(\Yii::$app->request->post()))
        {

            if($model->save())
                return $this->controller->redirect(  Url::to('list'));
        }

        return $this->controller->render('update', [
            'model' => $model]);

    }
}