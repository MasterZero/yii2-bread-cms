<?php
use yii\helpers\Html;
use common\components\ActiveForm;


$this->params['buttons'] = ['back'];


$create = $model->isNewRecord;?>


<h1><?= $create ? 'Создание' : 'Редактирование'; ?> 
"<?= Yii::$app->controller->module->name ?>"
</h1>

<div class="container">
    <div class="row">
        <div class="col-md-8">

            <?$form = ActiveForm::begin([
                //'id' => 'update-form',
                'options' => ['class' => 'form-horizontal'],
            ]) ?>



                <?= $form->field($model, 'name')->copyName() ?>
                <?= $form->field($model, 'url')->PasteToUrl() ?>
                <?= $form->field($model, 'content')->CKEditor() ?>

                <div class="form-group">
                    <div class="col-md-4">
                        <?= Html::submitButton( ($create) ? 'Создать' : 'Сохранить', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Отмена',['list'],['class' => 'btn btn-danger']) ?>
                    </div>
                </div>
            <?php ActiveForm::end() ?>

        </div>
    </div>
</div>