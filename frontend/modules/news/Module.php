<?php

namespace frontend\modules\news;

class Module extends \yii\base\Module
{
	public $menuItems;
	public $name;
	public $defaultRoute = 'news';

    public function init()
    {
        parent::init();
    }
}