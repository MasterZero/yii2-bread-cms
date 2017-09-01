<?
namespace common\components;

class Module extends \yii\base\Module
{
	public static $name = 'Модуль';
	public static $icon = 'code';
	public $defaultRoute = 'module';


	public static function getName()
	{
		return static::$name;
	}

	public static function getIcon()
	{
		return static::$icon;
	}

}

