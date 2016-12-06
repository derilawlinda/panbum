<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Form Penugasan PLTP';
$this->params['breadcrumbs'][] = ['label' => 'Penugasan PLTP', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("PLTP: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("PLTP: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>
<style>
    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
        margin-top: 30px;
    }
</style>


<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form','layout'=>'horizontal','action' => Url::toRoute('update')]); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($modelUser, 'username')->textInput(['maxlength' => true,'readonly'=>true]) ?>
        </div>
        
    </div>
     <div class="row">
    <div class="col-sm-6">
            <?= $form->field($modelUser, 'email')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    </div>
     </div>

    <div class="padding-v-md">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsPltp[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'nama_pltp'
           
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-industry"></i> Pltp
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Tambahkan PLTP</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
             
            <?php foreach ($modelsPltp as $index => $modelPltp): ?>
            <div class="item panel panel-borderless"><!-- widgetBody -->  
            <div class="row">
                    <div class="col-sm-6">
                                <?= $form->field($modelPltp, "[{$index}]id",[
                                    'template' => '<div class="col-sm-7 col-sm-offset-1">{input}</div>'
                                ])->dropDownList(
								$pltpList, 
                                                               ['prompt'=>'PLTP...',
                                                                'value'=>$modelPltp->id])->label(false); ?>
                    
                    </div>
                 <div class="col-sm-6">
                     <button type="button" class="pull-right remove-item btn btn-danger btn-xs offset2"><i class="fa fa-minus"></i></button>
                 </div>
               </div>
            </div>
            <?php endforeach; ?>
                 
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
         <div class="col-lg-offset-2 col-lg-2 pull-right">
        <?= Html::submitButton($modelPltp->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?= $form->field($modelUser, 'id')->hiddenInput()->label(false) ?>
    <?php ActiveForm::end(); ?>

</div>
