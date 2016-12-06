<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Wkp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Pltp', 
        'relID' => 'pltp', 
        'value' => \yii\helpers\Json::encode($model->pltps),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_wkp").on("pjax:end", function() {
            $.pjax.reload({container:"#kv-pjax-container-wkp"});  //Reload GridView
        });
    });'
);
?>
<div class="wkp-form">
<?php yii\widgets\Pjax::begin(['id' => 'new_wkp']) ?>
    <?php $form = ActiveForm::begin([
        'layout'=>'horizontal'
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama WKP'])->label("Nama WKP") ?>

    <?= $form->field($model, 'skwkp')->textInput(['maxlength' => true, 'placeholder' => 'SK WKP'])->label("SK WKP") ?>

     <?= $form->field($model, 'luas')->textInput(['placeholder' => 'Luas (Ha)'])->label("Luas (Ha)") ?>

    <?= $form->field($model, 'pem_izin')->textInput(['maxlength' => true, 'placeholder' => 'Pemegang Izin'])->label("Pemegang Izin") ?>

   <?= $form->field($model, 'remark')->textarea(['maxlength' => true, 'placeholder' => 'Catatan','rows'=>3])->label("Catatan") ?>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4 pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
