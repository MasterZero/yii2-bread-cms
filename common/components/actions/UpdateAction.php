<?php


namespace common\components\actions;

use \yii\db\Expression;

class UpdateAction extends \yii\base\Action
{
    public function run( $id = null )
    {

    	$model = $this->controller->getModel($id);

        if ($model->load(\Yii::$app->request->post()))
        {

            if($model->isNewRecord)
            {
                $model->created_at = new Expression('NOW()');
            }

            $model->updated_at = new Expression('NOW()');

            if($model->save())
                return $this->controller->redirect(['list']);
        }

        return $this->controller->render('update', [
            'model' => $model]);

    }
}