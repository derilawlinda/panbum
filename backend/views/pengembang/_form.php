<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengembang */
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
        $("#new_pengembang").on("pjax:end", function() {
            $.pjax.reload({container:"#kv-pjax-container-pengembang"});  //Reload GridView
        });
    });'
);
?>
<div class="pengembang-form">
<?php yii\widgets\Pjax::begin(['id' => 'new_pengembang']) ?>
    <?php $form = ActiveForm::begin([
        'layout'=>'horizontal'
    ]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'alamat')->textArea(['maxlength' => true, 'placeholder' => 'Alamat','rows'=>3]) ?>

    <?= $form->field($model, 'dirut')->textInput(['maxlength' => true, 'placeholder' => 'Direktur Utama'])->label('Direktur Utama') ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => true, 'placeholder' => 'User']) ?>

    <?= $form->field($model, 'remark')->textArea(['maxlength' => true, 'placeholder' => 'Catatan','rows'=>3])->label('Catatan') ?>

   
    <div class="form-group">
         <div class="col-lg-offset-2 col-lg-4 pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
         </div>
    </div>

    <?php ActiveForm::end(); ?>
     <?php yii\widgets\Pjax::end() ?>

</div>
