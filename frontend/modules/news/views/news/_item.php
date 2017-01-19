<?

use \yii\helpers\Html;

echo $model->name;
?>


<?= Html::a( 'Посмотреть', $this->context->getUrlByModel($model) ) ?>

