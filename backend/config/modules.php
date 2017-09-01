<?php


$ret_arr = [];

$modules_path =  __DIR__.'/../modules/';

$scanned_directory = array_diff(scandir($modules_path), ['..', '.']);

foreach ($scanned_directory as $filename) {
	if(is_dir($modules_path . $filename))
		$ret_arr[$filename] = [
				'class' => "backend\\modules\\$filename\\Module"
				];
}

/*$origin = [

 'user' => [
	'class' => 'alskdhaisdhaskd',
	],
 'user2' => [
	'class' => 'alskdhaisdhaskd'
	],
];


var_dump($ret_arr);
var_dump($origin);*/


return $ret_arr;







