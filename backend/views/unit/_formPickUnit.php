<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use lo\modules\noty\Wrapper;


$this->title = 'Input Data';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);

?>
<script src="//code.jquery.com/jquery-2.2.4.js"></script>
<style>

.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
    margin-top: 20px;
}

</style>
<?php echo Wrapper::widget([
'layerClass' => 'lo\modules\noty\layers\Noty',
'options' => [
        'dismissQueue' => true,
        'layout' => 'topRight',
        'timeout' => 1000,
        'theme' => 'relax',
    ]

]); ?>
<div class="inputdata-index">

    
	
	<?php $form = ActiveForm::begin([
									'layout' => 'horizontal',
									'id'=> 'form-pilih-unit',
									'fieldConfig' => [
										'template' => "{input}"],
									'action' => ['create-unit']]); ?>
	<div class="well">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
	<?= $form->field($modelWkp, 'id_wkp')
											->dropDownList(
												$wkpList,
												[
												'onchange' => '
													if(this.value != ""){
															$("#pltpdropdown").prop("disabled", false);
															$.get(
																"' . Url::toRoute('getpltpbywkp') . '", 
																{id_wkp: $(this).val()}, 
																function(res){
																	$("#pltpdropdown").html(res);
																}
															);
														}else{
															$("#unit").val("").change();
															$("#pltpdropdown").val("").change();
															$("#unit").prop("disabled", true);
															$("#pltpdropdown").prop("disabled", true);
															
														};
													
													
												',
												 'prompt' => 'Pilih WKP..',
												 'id'=>'wkpdropdown',
												 'options' => ['class' => 'form-group invisible']
												])
											->label(false);?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
	<?= $form->field($modelUnit, 'id_pltp')
											->dropDownList(
												[],
												['prompt' => 'Pilih PLTP..',
												 'id' => 'pltpdropdown',
												 'onchange' => '
													
														if(this.value != ""){
															$("#unitdropdown").prop("disabled", false);
															$.get(
																	"' . Url::toRoute('get-unit-by-pltp') . '", 
																	{id_pltp: $(this).val()}, 
																	function(res){
																		
																		$("#unitdropdown").html(res);
																		$("#unitdropdown").append("<option value=\"9999\">Unit baru</option>");
																	}
																);
														}else{
															$("#unitdropdown").prop("disabled", true);
															$("#unitdropdown").val("").change();
														}
														
													
												 
												 '
												 
												])
											->label(false);?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-3">
       <?= $form->field($modelUnit, 'no_unit')
											->dropDownList(
												[],
												['prompt' => 'Pilih Unit..',
												 'id' => 'unitdropdown',
												 'disabled'=>'disabled',
												 'onchange' => '
														console.log($(this).val());
														if($(this).val() != ""){
															if($(this).val() == 9999){
																$("#submitButton").prop("disabled", true);
																$("#inputText").show();
																	
															}else{
																$("#submitButton").prop("disabled", false);
																$("#inputText").val("").change();
																$("#inputText").hide();
															}
															
															
														}else{
																$("#inputText").hide();
																$("#inputText").val("").change();
																$("#submitButton").prop("disabled", true);
														
														};'
												 
												])
											->label(false);?>
	
			</div>
	<div id="inputText" class="col-sm-2 col-sm-offset-1" style="margin-left: 6px;display:none">
		<?= $form->field($modelUnit, 'no_unit')->textInput(['placeholder' => 'No Unit Baru',
															'id'=>"unitInputText",
															'onchange'=>'
																if($(this).val() == ""){
																	$("#submitButton").prop("disabled", true);
																};
															
															',
															'onkeyup' => '
																
																if($(this).val() == ""){
																	$("#submitButton").prop("disabled", true);
																	
																	
																}else{
																	$("#submitButton").prop("disabled", false);
																};'])->label(false) ?>
	</div>
	</div>
	
	
	
	<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Input', ['class' => 'btn btn-primary','id' => 'submitButton',"disabled"=>"disabled"]) ?>
        </div>
    </div>
	<?php $form = ActiveForm::end(); ?>
	</div>
	
	<div class="row">
		<div id="inputData"> </div>
	</div>
	
   

</div>

<script type="text/javascript">

$(document).ready(function () {
        
		$('body').on('beforeSubmit', 'form#form-pilih-unit', function () {
            if($("#unitInputText").val() != ""){
				$("#unitdropdown").attr("name","notused");
			}else{
				$("#unitInputText").attr("name","notused");
				$("#unitdropdown").attr("name","Unit[no_unit]");
			};
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
                if(response == "Data Exist"){
					return false;
				}else{
					$('.inputdata-index').html(response);
				}
				
				
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
