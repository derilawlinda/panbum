<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetail */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="unit-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tahap')->textInput(['maxlength' => true, 'placeholder' => 'Tahap']) ?>

    <?= $form->field($model, 'investasi')->textInput(['placeholder' => 'Investasi']) ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true, 'placeholder' => 'Prov']) ?>

    <?= $form->field($model, 'kabkot')->textInput(['maxlength' => true, 'placeholder' => 'Kabkot']) ?>

    <?= $form->field($model, 'no_unit')->textInput(['placeholder' => 'No Unit']) ?>

    <?= $form->field($model, 'potensi')->textInput(['placeholder' => 'Potensi']) ?>

    <?= $form->field($model, 'rencana')->textInput(['placeholder' => 'Rencana']) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>

    <?= $form->field($model, 'attr_status')->checkbox() ?>

    <?= $form->field($model, 'kap_terpasang')->textInput(['placeholder' => 'Kap Terpasang']) ?>

    <?= $form->field($model, 'saham')->textInput(['maxlength' => true, 'placeholder' => 'Saham']) ?>

    <?= $form->field($model, 'harga')->textInput(['maxlength' => true, 'placeholder' => 'Harga']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
