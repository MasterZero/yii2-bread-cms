<?php

namespace backend\modules\container;

class Module extends \yii\base\Module
{

	public $menuItems;
	public $name;
	public $defaultRoute = 'container';

    public function init()
    {
        parent::init();
    }
}