<?php


namespace common\components\actions;

class CloneAction extends \yii\base\Action
{
    public function run($id)
    {
        $model = $this->controller->getModel($id);

        $clone = $model;

        

        if($clone->hasAttr('url'))
        	$clone->url = 'pk-'.$model->id;

        $clone->id = null;
        $clone->isNewRecord = true;

        if(!$clone->save())
            throw new \yii\db\Exception($clone->errors);

        return $this->controller->redirect(\Yii::$app->request->referrer);
    }
}