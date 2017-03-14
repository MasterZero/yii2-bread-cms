<?php


namespace common\components\actions;
use \yii\db\Expression;

class DeleteAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);

        $model->deleted ^= true;
// Серега привет

        if($model->deleted)
        	$model->deleted_at = new Expression('NOW()');

        if(!$model->save())
            throw new \yii\db\Exception;

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}
