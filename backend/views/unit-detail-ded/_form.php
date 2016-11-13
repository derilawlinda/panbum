<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailDed */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="unit-detail-ded-form">
	
	
    <?php $form = ActiveForm::begin([
									'layout' => 'horizontal',
									'id'=> 'unit-detail-ded-form-id',
									'action' => 'index.php?r=unit-detail-ded/create'
									]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'nama_perencana')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perencana']) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat']) ?>

    <?= $form->field($model, 'no_kontrak')->textInput(['maxlength' => true, 'placeholder' => 'No Kontrak']) ?>

    <?= $form->field($model, 'tgl_awal_ded')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Awal Ded',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'tgl_akhir_ded')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Akhir Ded',
                'autoclose' => true
            ]
        ],
    ]); ?>

	<?= $form->field($model, 'id_unit')->hiddenInput(['value'=>$id_unit])->label("") ?>

    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
$('form#unit-detail-ded-form-id').on('beforeSubmit',function(e)
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
