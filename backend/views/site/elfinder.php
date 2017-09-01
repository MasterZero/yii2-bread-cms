<?php

/* @var $this yii\web\View */
use mihaildev\elfinder\ElFinder;


$this->title = 'Файловый менеджер';
?>
	<?= ElFinder::widget([
	'containerOptions' => ['style' => 'height: 80vh;']]);?>
