<?  ?>

<h1>Новости</h1>

<?= \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item',
]); ?>