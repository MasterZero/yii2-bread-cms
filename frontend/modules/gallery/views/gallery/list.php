<?  ?>

<h1>Галерея</h1>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
]); ?>