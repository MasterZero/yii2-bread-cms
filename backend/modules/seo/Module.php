<?php

namespace backend\modules\seo;

class Module extends \yii\base\Module
{

	public $menuItems;
	public $name;
	public $defaultRoute = 'seo';

    public function init()
    {
        parent::init();
    }
}