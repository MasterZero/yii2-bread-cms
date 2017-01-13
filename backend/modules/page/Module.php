<?php

namespace backend\modules\page;

class Module extends \yii\base\Module
{

	public $menuItems;
	public $name;
	public $defaultRoute = 'page';

    public function init()
    {
        parent::init();

        /*$this->menuItems =  [
	        [
	        	'label' => 'Новая страница',
	        	'url' => ['update']
	        ],
	        [
	        	'label' => 'Корзина',
	        	'url' => ['product/index'],
	        	'items' =>
	        	[
	            	['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
	            	['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
	        	]
	        ],
	        [
	        	'label' => 'Login',
	        	'url' => ['site/login'],
	        	'visible' => \Yii::$app->user->isGuest,
	        ],
		];*/
        // ... остальной инициализирующий код ...
    }
}