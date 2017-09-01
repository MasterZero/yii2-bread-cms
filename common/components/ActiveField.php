<?
namespace common\components;

use mihaildev\elfinder\InputFile;
use mihaildev\elfinder\ElFinder;
use mihaildev\ckeditor\CKEditor;


class ActiveField extends \yii\widgets\ActiveField
{

	public $copyUrlClassName = 'url-copy-field';
	public $pasteUrlClassName = 'url-generate-field';

	public function copyName()
	{
		$this->options['class'] .= ' '.$this->copyUrlClassName;
		return $this;
	}

	public function PasteToUrl()
	{
		$this->options['class'] .= ' '.$this->pasteUrlClassName;
		return $this;
	}

	public function CKEditor()
	{
		return $this->textArea()->widget(CKEditor::className(),[

			'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
				'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
	        'inline' => false, //по умолчанию false

	        /* Some CKEditor Options */]),
		]);
	}

	public function elFinder()
	{
		return $this->widget(InputFile::className(), [
	    'language'      => 'ru',
	    'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
	    //'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
	    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
	    'options'       => ['class' => 'form-control'],
	    'buttonOptions' => [
	    	'class' => 'btn btn-default',
	    	'title' => 'Обзор'],
	    'buttonName'	=> '<i class="fa fa-folder-open-o"></i>',
	    'multiple'      => false       // возможность выбора нескольких файлов
		]);
	}
}