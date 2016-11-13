<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal',
									'id'=> 'unit-form-id',
									'action' => 'index.php?r=unit/update']); ?>

    <?= $form->errorSummary($model); ?>

   

    <?= $form->field($model, 'id_wkp')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->orderBy('id_wkp')->asArray()->all(), 'id_wkp', 'nama'),
        'options' => ['placeholder' => 'Choose Wkp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_pengembang')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pengembang::find()->orderBy('id_pengembang')->asArray()->all(), 'id_pengembang', 'nama'),
        'options' => ['placeholder' => 'Choose Pengembang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'investasi')->textInput(['placeholder' => 'Investasi'])->label("Perkiraan Investasi (Rp.)") ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true, 'placeholder' => 'Propinsi'])->label("Propinsi") ?>

    <?= $form->field($model, 'kabkot')->textInput(['maxlength' => true, 'placeholder' => 'Kabkot'])->label("Kabupaten/Kota") ?>

    <?= $form->field($model, 'no_unit')->textInput(['placeholder' => 'No Unit']) ?>

    <?= $form->field($model, 'potensi')->textInput(['placeholder' => 'Potensi']) ?>

    <?= $form->field($model, 'rencana')->textInput(['placeholder' => 'Rencana']) ?>
	
	 <?= $form->field($model, 'id_unit')->hiddenInput(['maxlength' => true, 'placeholder' => 'Id Unit'])->label("") ?>
   
    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript">
$('form#unit-form-id').on('beforeSubmit',function(e)
		{
			var form = $(this);
			var formData = new FormData();
			
			$.each($('form#unit-form-id :file'), function(i, file) {
				formData.append(file.name, file.files[0])
			}); 
			$.each($('form#unit-form-id :input:not(:file)'), function(i, elm) {
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
				$.pjax.reload({container:"#inputForm"});
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
