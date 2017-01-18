<?php


namespace common\components\itemActions;

use \yii\db\Expression;

class UpdateAction extends \yii\base\Action
{
    public function run( $container_id = null, $id = null )
    {

    	$model = $this->controller->getModel($id);


        $field_name = \Yii::$app->controller->module->id . '_id';

        if(!$model->isNewRecord)
            $container_id = $model->$field_name;
        elseif (is_null($container_id))
            throw new NotFoundHttpException;



        $container = $this->controller->containerModelName()::findOne($container_id);

        if(!isset($container))
            throw new NotFoundHttpException;

        if ($model->load(\Yii::$app->request->post()))
        {
            
            $model->$field_name = $container_id;

            if($model->isNewRecord)
            {
                $model->created_at = new Expression('NOW()');

                $model->deleted = $model->removed = false;
            }

            $model->updated_at = new Expression('NOW()');


            if($model->save())
                return $this->controller->redirect(['list','container_id' => $container_id]);
        }

        return $this->controller->render('update', [
            'model' => $model,
            'container' => $container, ]);

    }
}