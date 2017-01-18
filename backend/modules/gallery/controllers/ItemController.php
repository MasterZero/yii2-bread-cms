<?
namespace backend\modules\gallery\controllers;

class ItemController extends \backend\components\BackendItemController
{
	public function containerModelName()
	{
		return \common\modules\gallery\models\Gallery::className();
	}
}