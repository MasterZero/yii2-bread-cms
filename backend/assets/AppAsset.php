<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',

    ];
    public $js = [
        'js/ckeditor/ckeditor.js',
        'js/ckeditor/adapters/jquery.js',
        //'js/elfinder/elfinder.min.js',
        //'js/elfinder/require.min.js',
        //'js/elfinder/main.cke.js',


        'js/custom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
