<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


$menuItems = [
    [
        'url' => ['/url/to/module'],
        'icon' => 'bus',
        'label' => 'Костыльная ссылка в меню',
    ],
];




AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>







    <div class="wrap ">
        

    <?= \common\widgets\menu\MenuWidget::widget(['items' => $menuItems]); ?>



        <div class="container">
            <div class="row">
                <div class="btn-group">

                    <?
                    if(isset($this->params['buttons']))
                    {
                        echo 
                            \common\widgets\navigation\NavigationWidget::
                            widget(
                                ['items' => $this->params['buttons']]);
                        
                    }?>
                </div>
                


                
                <?= Alert::widget() ?>
                <?= $content ?>

                <?/* Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])*/ ?>



            </div>
        </div>
    </div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Custom Development Studio <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
