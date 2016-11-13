<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PekPengsumur */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pek-pengsumur-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal',
									'id'=> 'pek-pengesumur-form-id',
									'action' => 'index.php?r=pek-pengsumur/create']); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target']) ?>

    <?= $form->field($model, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian']) ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true, 'placeholder' => 'File']) ?>
	
	<?= $form->field($model, 'wkp_name')->hiddenInput(['value'=>$wkp_name.' '.$no_unit])->label("") ?>
	<?= $form->field($model, 'id_unit')->hiddenInput(['value'=>$id_unit])->label("") ?>
    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
$('form#pek-pengesumur-form-id').on('beforeSubmit',function(e)
		{
			var form = $(this);
			var formData = new FormData();
			
			$.each($('form#pek-pengesumur-form-id :file'), function(i, file) {
				formData.append(file.name, file.files[0])
			}); 
			$.each($('form#pek-pengesumur-form-id :input:not(:file)'), function(i, elm) {
				formData.append(elm.name, elm.value)
			}); 
            // return false if form still have some validation errors
			
            if (form.find('.has-error').length) 
            {
                return false;
            }
            // submit form
            $.ajax({
			processData: false,
			contentType: false,
            url    : form.attr('action'),
            type   : 'post',
            data   : formData,
            success: function (response) 
            {
                
                // $.pjax.reload('#note_update_id'); for pjax update
                $('#formContainer').html(response);
                //console.log(getupdatedata);
            },
            error  : function () 
            {
                console.log('internal server error');
            }
            });
            return false;
		});
</script>

