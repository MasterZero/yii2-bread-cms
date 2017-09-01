<?

use yii\helpers\Html;


?>

<?php 

        foreach ($items as $button) {

            echo Html::a(
                '<i class="fa fa-'.
                $button['icon'].
                '"></i> '.
                $button['label'],
                $button['url'],
                ['class' => 'btn '.$button['btn_class']]);
        }

        ?>


