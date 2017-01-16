<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
//use dosamigos\ckeditor\CKEditor;


$create = $model->isNewRecord;

$form = ActiveForm::begin([
    'id' => 'update-form',
    'options' => ['class' => 'form-horizontal col-md-6'],
]) ?>
    <?= $form->field($model, 'name', ['options' => ['class' => 'url-copy-field']]) ?>
    <?= $form->field($model, 'url',['options' => ['class' => 'url-generate-field']]) ?>
    <?= $form->field($model, 'content')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
])/*widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ])*/ ?>
    <?= $form->field($model, 'removed')->checkbox() ?>
    <?= $form->field($model, 'deleted')->checkbox() ?>

    <div class="form-group">
        <div class="col-md-4">
            <?= Html::submitButton( ($create) ? 'Создать' : 'Применить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>