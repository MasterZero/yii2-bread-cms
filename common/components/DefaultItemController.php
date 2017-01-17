<?
namespace common\components;


class DefaultItemController extends DefaultController
{

    public function modelName()
    {
    	return parent::modelName().'Item';
    }

     public function containerModelName()
    {
    	return parent::modelName();
    }
}