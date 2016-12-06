<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */

?>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_unit").on("pjax:end", function() {
            $.pjax.reload({container:"#kv-pjax-container-unit"});  //Reload GridView
        });
    });'
);
?>
<div class="unit-form">
<?php yii\widgets\Pjax::begin(['id' => 'new_unit']) ?>
    <?php $form = ActiveForm::begin([
        'layout'=>'horizontal'
    ]); ?>

    <?= $form->errorSummary($model); ?>

   <?= $form->field($model, 'id_pltp')->widget(\kartik\widgets\Select2::classname(), [ 
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pltp::find()->orderBy('id')->asArray()->all(), 'id', 'nama_pltp'), 
        'options' => ['placeholder' => 'Choose Pltp'], 
        'pluginOptions' => [ 
            'allowClear' => true 
        ], 
    ]); ?>

    <?= $form->field($model, 'no_unit')->textInput(['placeholder' => 'No Unit']) ?>

    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4 pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>

