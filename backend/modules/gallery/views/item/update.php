<?php
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//use dosamigos\ckeditor\CKEditor;
use masterzero\activefield\ActiveForm;


$create = $model->isNewRecord;

$form = ActiveForm::begin([
    'id' => 'update-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>


    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'image')->elFinder() ?>
    <?= $form->field($model, 'content') ?>
    <?= $form->field($model, 'description')?>
    <?= $form->field($model, 'index')?>
    <?//$form->field($model, 'container_id')->hiddenInput(['value' => $container->id]) ?>

    <div class="form-group">
        <div class="col-md-4">
            <?= Html::submitButton( ($create) ? 'Создать' : 'Применить', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Назад',['list'],['class' => 'btn btn-dange']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>