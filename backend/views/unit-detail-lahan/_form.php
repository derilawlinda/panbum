<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailLahan */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="unit-detail-lahan-form">

    
	<?php $form = ActiveForm::begin([
									'layout' => 'horizontal',
									'id'=> 'unit-detail-lahan-form-id',
									'action' => 'index.php?r=unit-detail-lahan/create'
									]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'hutan_kons')->textInput(['placeholder' => 'Dalam hektar']) ?>

    <?= $form->field($model, 'hutan_lin')->textInput(['placeholder' => 'Dalam hektar']) ?>

    <?= $form->field($model, 'hutan_prod')->textInput(['placeholder' => 'Dalam hektar']) ?>

    <?= $form->field($model, 'area')->textInput(['placeholder' => 'Dalam hektar']) ?>

 	<?= $form->field($model, 'id_unit')->hiddenInput(['value'=>$id_unit])->label("") ?>


    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton($model->isNewRecord ? 'Save' : 'Save', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div >

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
$('form#unit-detail-lahan-form-id').on('beforeSubmit',function(e)
		{
			var form = $(this);
            // return false if form still have some validation errors
            if (form.find('.has-error').length) 
            {
                return false;
            }
            // submit form
            $.ajax({
            url    : form.attr('action'),
            type   : 'post',
            data   : form.serialize(),
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
