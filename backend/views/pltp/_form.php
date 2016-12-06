<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pltp */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Unit', 
        'relID' => 'unit', 
        'value' => \yii\helpers\Json::encode($model->units),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_pltp").on("pjax:end", function() {
            $.pjax.reload({container:"#kv-pjax-container-pltp"});  //Reload GridView
        });
    });'
);
?>
<div class="pltp-form">
<?php yii\widgets\Pjax::begin(['id' => 'new_pltp']) ?>
    <?php $form = ActiveForm::begin([
        'layout'=>'horizontal'
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_wkp')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->orderBy('id_wkp')->asArray()->all(), 'id_wkp', 'nama'),
        'options' => ['placeholder' => 'Choose Wkp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nama WKP'); ?>
    
    <?= $form->field($model, 'id_pengembang')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pengembang::find()->orderBy('id_pengembang')->asArray()->all(), 'id_pengembang', 'nama'),
        'options' => ['placeholder' => 'Pilih Pengembang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Pengembang'); ?>
    
    <?= $form->field($model, 'nama_pltp')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pltp']) ?>

    <?= $form->field($model, 'remark')->textarea(['maxlength' => true, 'placeholder' => 'Catatan','rows'=>3])->label("Catatan") ?>

   
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-4 pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
     <?php yii\widgets\Pjax::end() ?>

</div>
