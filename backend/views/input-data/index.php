<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;


$this->title = 'Input Data';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);

?>
<script src="//code.jquery.com/jquery-2.2.4.js"></script>


<div class="inputdata-index">

    
	
	<?php $form = ActiveForm::begin([
									'layout' => 'horizontal',
									'id'=> 'form-input-pekerjaan',
									'action' => ['getform']]); ?>
	<div class="form">
	
	<?php echo $form->field($model, 'id_wkp')
				->dropDownList(
					$wkpList,
					[
					'onchange' => '
						$("#inputdatadropdown").prop("disabled", true);
						$.get(
							"' . Url::toRoute('getunitbywkp') . '", 
							{id_wkp: $(this).val()}, 
							function(res){
								$("#unitdropdown").html(res);
							}
						);
					',
					 'prompt' => 'Pilih WKP..',
					])
				->label('WKP');
	?>
	
	<?php echo $form->field($unitModel, 'id_unit')
				->dropDownList(
					[],
					['prompt' => 'Pilih Unit..',
					 'id' => 'unitdropdown',
					 'onchange' => '
						
							if(this.value != ""){
								$("#inputdatadropdown").prop("disabled", false);
							}else{
								$("#inputdatadropdown").prop("disabled", true);
							}
							
						
					 
					 '
					 
					])
				->label('Unit');
	?>
	
	<?php 
	
	echo $form->field($inputDataModel, 'id_input')
				->dropDownList(
					$inputDataList,
					['prompt' => 'Pilih Pekerjaan..',
					 'id' => 'inputdatadropdown',
					 "disabled"=>"disabled"
					])
				->label('Data yang akan di Input');
	?>
	<?php Pjax::end() ?>
	<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Input', ['class' => 'btn btn-primary','id' => 'submitButton']) ?>
        </div>
    </div>
	<?php $form = ActiveForm::end(); ?>
	</div>
	
	<div id="formContainer" class="well">Pilih WKP dan unit yang akan di input</div>
   

</div>

<script type="text/javascript">

$(document).ready(function () {
        $('body').on('beforeSubmit', 'form#form-input-pekerjaan', function () {
            var form = $(this);
            // return false if form still have some validation errors
            if (form.find('.has-error').length) 
            {
                return false;
            }
            // submit form
            $.ajax({
            url    : form.attr('action'),
            type   : 'get',
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
		
		
		
		 
		 
    });

</script>
