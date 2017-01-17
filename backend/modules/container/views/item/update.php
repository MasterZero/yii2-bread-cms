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
    <?= $form->field($model, 'image')->elFinder() ?>
    <?= $form->field($model, 'content')->tinyMCE() ?>
    <?= $form->field($model, 'description')->tinyMCE() ?>
    <?//$form->field($model, 'container_id')->hiddenInput(['value' => $container->id]) ?>

    <div class="form-group">
        <div class="col-md-4">
            <?= Html::submitButton( ($create) ? 'Создать' : 'Применить', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Назад',['list'],['class' => 'btn btn-dange']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>