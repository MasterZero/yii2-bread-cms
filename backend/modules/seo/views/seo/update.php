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
    <?= $form->field($model, 'description') ?>
    <?= $form->field($model, 'keywords') ?>
    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <div class="col-md-4">
            <?= Html::submitButton( ($create) ? 'Создать' : 'Применить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>