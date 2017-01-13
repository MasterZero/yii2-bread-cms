<?php


namespace common\components\actions;

class DeleteAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);

        $model->deleted ^= true;

        if(!$model->save())
            throw new \yii\db\Exception;

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}