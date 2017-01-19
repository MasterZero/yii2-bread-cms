<?php

namespace frontend\modules\page;

class Module extends \yii\base\Module
{

	public $menuItems;
	public $name;
	public $defaultRoute = 'page';

    public function init()
    {
        parent::init();
    }
}