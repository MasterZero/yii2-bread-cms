<?php

use yii\helpers\Html;

?>
<h1><?= $model->name?></h1>

<?= $model->content ?>

<hr>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $categoryDataProvider,
    'itemView' => '_item',
]); ?>



<? foreach ($items as $item) { ?>
	

	<?= Html::img( $item->image );?>

<? } ?>