<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PekGeosains */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="pek-geosains-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target']) ?>

    <?= $form->field($model, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?= $form->field($model, 'submitted_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Submitted Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'confirmed_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Confirmed Date',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'confirmed')->checkbox() ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => true, 'placeholder' => 'File']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
