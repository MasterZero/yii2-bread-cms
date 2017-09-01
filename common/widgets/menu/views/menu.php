<?

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>

<?php 

        NavBar::begin([
            'brandLabel' => 'Панель / '.Yii::$app->user->identity->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
       
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $items,
            'encodeLabels' => false,
        ]);
        NavBar::end();
        ?>


