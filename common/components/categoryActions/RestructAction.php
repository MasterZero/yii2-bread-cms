<?php


namespace common\components\categoryActions;

use \yii\db\Expression;

class RestructAction extends \yii\base\Action
{

    public $modelName;

    public function run( $data )
    {
        $new_struct = json_decode($data, true );

        if(!isset($this->modelName) || empty($this->modelName))
            return false; // no model

        if(!$this->validateIds($new_struct))
            return false; // invalid data



        foreach ($new_struct as $id) {
            $model = $this->modelName::findOne($id['id']);

            if($model->depth != 0) // is root
                $model->makeRoot();

            if(isset($id['children']))
                $this->restructChildrens( $model , $id['children']);
        }


        return true;
    }

    function restructChildrens( $parentModel , $childrens)
    {
        foreach ($childrens as $children) {



            $model = $this->modelName::findOne($children['id']);
            $model->prependTo($parentModel);


            if(isset($children['children']))
                $this->restructChildrens( $model , $children['children']);
        }
    }


    function validateIds($ids)
    {
        if($ids == null)
            return true;

        foreach ($ids as $id) {

            if(isset($id['children']) &&
                !$this->validateIds($id['children']))
                return false;

            if(! $this->modelName::findOne($id['id']) )
                return false;
        }

        return true;
    }
}