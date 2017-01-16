<?php


namespace common\components\categoryActions;

class HideAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);

        $model->removed ^= true;

        if(!$model->save())
            throw new \yii\db\Exception;

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}