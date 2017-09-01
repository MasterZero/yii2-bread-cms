<?php


namespace common\components\actions;
use \yii\db\Expression;

class DestroyAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);

        if(!$model->delete())
            throw new \yii\db\Exception;

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}