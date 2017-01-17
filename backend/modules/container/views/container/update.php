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
    <?= $form->field($model, 'name')->copyName() ?>
    <?= $form->field($model, 'url')->PasteToUrl() ?>
    <?= $form->field($model, 'content')->tinyMCE() ?>

    <div class="form-group">
        <div class="col-md-4">
            <?= Html::submitButton( ($create) ? 'Создать' : 'Применить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>