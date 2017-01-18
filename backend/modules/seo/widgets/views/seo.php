<?
use yii\helpers\Html;
use masterzero\activefield\ActiveForm;
use yii\helpers\Url;


$create = $model->isNewRecord;

?>


<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#SeoModal">
        SEO
      </button>

<!-- Modal -->
<div class="modal fade" id="SeoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seo</h4>
      </div>

      <?$form = ActiveForm::begin([
		    'id' => 'seo-form',
		    'options' => ['class' => 'form-horizontal'],
		    'action' => ['/seo',
		    'module' => $model->module,
		    'controller' => $model->controller,
		    'model_pk' => $model->model_pk,]
		]) ?>

      <div class="modal-body">
	        <?= $form->field($model, 'description') ?>
		    <?= $form->field($model, 'keywords') ?>
		    <?= $form->field($model, 'title') ?>
      </div>

      <div class="modal-footer">
       	<?= Html::submitButton( ($create) ? 'Создать' : 'Применить', ['class' => 'btn btn-primary']) ?>
            <?= (!$create) ? 
            	Html::a( 'Удалить', Url::to(['/seo/seo/delete','id' => $model->id]) , ['class' => 'btn btn-danger']) :
            	''; ?>
      </div>

      <?php ActiveForm::end() ?>
    </div>
  </div>
</div>
