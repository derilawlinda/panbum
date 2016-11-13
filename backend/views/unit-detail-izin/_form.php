<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailIzin */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="unit-detail-izin-form">
	
    <?php $form = ActiveForm::begin([
									'layout' => 'horizontal',
									'id'=> 'unit-detail-izin-form-id',
									'action' => 'index.php?r=unit-detail-izin/create',
									'options'=> ['enctype'=>'multipart/form-data']
									]); ?>

    <?= $form->errorSummary($model); ?>

  
	
    <?= $form->field($model, 'iup_file')->fileInput(); ?>

	
    <?= $form->field($model, 'iup_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Iup Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'iup_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Iup Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>
	
    <?= $form->field($model, 'ippkh_file')->fileInput(); ?>

    <?= $form->field($model, 'ippkh_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Ippkh Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

	<?= $form->field($model, 'ippkh_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Ippkh Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>
	
	<?= $form->field($model, 'imb_file')->fileInput(); ?>
	
    <?= $form->field($model, 'imb_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Imb Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'imb_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Imb Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    
	<?= $form->field($model, 'amdal_file')->fileInput();?>
    <?= $form->field($model, 'amdal_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Amdal Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>
	

    <?= $form->field($model, 'amdal_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Amdal Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>
	
	<?= $form->field($model, 'imka_file')->fileInput(); ?>

    
    <?= $form->field($model, 'imka_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Imka Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'imka_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Imka Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

   
    <?= $form->field($model, 'simaksi_file')->fileInput(); ?>
	
    <?= $form->field($model, 'simaksi_awal')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Simaksi Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'simaksi_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Simaksi Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>
	
	<?= $form->field($model, 'id_unit')->hiddenInput(['value'=>$id_unit])->label("") ?>
	<?= $form->field($model, 'wkp_name')->hiddenInput(['value'=>$wkp_name.' '.$no_unit])->label("") ?>
    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">

$('form#unit-detail-izin-form-id').on('beforeSubmit',function(e)
		{
			var form = $(this);
			var formData = new FormData();
			
			$.each($('form#unit-detail-izin-form-id :file'), function(i, file) {
				formData.append(file.name, file.files[0])
			}); 
			$.each($('form#unit-detail-izin-form-id :input:not(:file)'), function(i, elm) {
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
