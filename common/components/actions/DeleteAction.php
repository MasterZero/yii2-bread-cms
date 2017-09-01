<?php


namespace common\components\actions;
use \yii\db\Expression;

class DeleteAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);

        if(!$model->hasAttr('deleted'))
            throw new \yii\web\BadRequestHttpException(
                    'У данной таблицы нет метки "в корзине"');


        $model->deleted ^= true;


        if($model->deleted)
        	$model->deleted_at = new Expression('NOW()');

        if(!$model->save())
            throw new \yii\db\Exception;

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}