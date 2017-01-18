<?php

namespace backend\modules\gallery;

class Module extends \yii\base\Module
{

	public $menuItems;
	public $name;
	public $defaultRoute = 'gallery';

    public function init()
    {
        parent::init();
    }
}