<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="panel panel-info">
  <div class="panel-heading">
      <h1 class="display-3"><?= Html::encode($this->title) ?></h1>
  </div>
  <div class="panel-body">

        <? if(yii::$app->params['regNewAdmin']) { ?>
            <ul class="nav nav-tabs">
                <li class="nav-item active">
                    <?= Html::a('Войти',['login'],
                        ['class' => 'nav-link' ]); ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('Зарегистрироваться',['signup'],
                        ['class' => 'nav-link' ]); ?>
                </li>
            </ul>
        <? } ?>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
            <?= $form->field($model, 'captcha')->widget(
            yii\captcha\Captcha::className(),[
                'template' => '
                    <div class="row">
                        <div class="col-lg-4 col-md-4">{image}</div>
                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">{input}</div>
                    </div>
                    ',
            ] ) ?>
            <div class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>

  </div>
</div>




