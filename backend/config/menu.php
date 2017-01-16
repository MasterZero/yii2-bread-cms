<?php
return [
    'menuItems' => [
    		[
	        	'label' => 'Главная',
	        	'url' => ['/site/index']
	        ],
	        [
	        	'label' => 'Страницы',
	        	'url' => ['/page'],
	        	/*'items' =>
	        	[
	            	['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
	            	['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
	        	]*/
	        ],
	        [
	        	'label' => 'Новости',
	        	'url' => ['/news'],
	        ],
		],
];
