<?php


namespace common\components\categoryActions;
use \yii\db\Expression;

class DeleteAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);


        if(!$model->deleteWithChildren())
        	throw new \yii\db\Exception;

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}