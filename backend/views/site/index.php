<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Панель управления';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать, <?= yii::$app->user->identity->name?>!</h1>

        <p class="lead">Это панель управления. Сверху в меню можно выбрать модуль, который вы хотите редактировать. </p>


        <p><?= Html::a('Файловый менеджер',['elfinder'],['class' => 'btn btn-lg btn-success']); ?></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Смена пароля</h2>

                <p>Не забывайте регулярно менять пароль от панели управления. Это поможет избежать компрометацию пароля.</p>

                <p><a class="btn btn-default" href="/user/change">
                    Поменять пароль &raquo;
                </a></p>
            </div>
            <div class="col-lg-4">
                <h2>Документация</h2>

                <p>Очень трудно разобраться? Ничего не понятно, а нужно что то поменять на сайте? Не беда! в данном месте собрана детальная инструкция с картиночками по использованию панели управления.</p>

                <p><a class="btn btn-default" href="/doc">Документация &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Выход</h2>

                <p>После окончания всех работ, пожалуйста, выходите из панели управления для предотвращения нессакционированного доступа.</p>

                 <p>
                    <?= Html::beginForm(['/site/logout'], 'post')?>
                    <?= Html::submitButton(
                        '<i class="fa fa-sign-out"></i> Выйти &raquo;',
                        ['class' => 'btn btn-default logout',
                        'title' => 'Выйти']
                        );?>
                    <?= Html::endForm() ?>
                </p>
            </div>
        </div>

    </div>
</div>
