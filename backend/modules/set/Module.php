<?php

namespace backend\modules\set;

class Module extends \yii\base\Module
{

	public $menuItems;
	public $name;
	public $defaultRoute = 'set';

    public function init()
    {
        parent::init();
    }
}