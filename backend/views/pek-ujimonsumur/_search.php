<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PekUjimonsumurSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-pek-ujimonsumur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ujimonsumur')->textInput(['maxlength' => true, 'placeholder' => 'Id Ujimonsumur']) ?>

    <?= $form->field($model, 'id_unit')->textInput(['maxlength' => true, 'placeholder' => 'Id Unit']) ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target']) ?>

    <?= $form->field($model, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>

    <?php /* echo $form->field($model, 'status')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'submitted_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Submitted Date',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'confirmed_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Confirmed Date',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'confirmed')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'file')->textInput(['maxlength' => true, 'placeholder' => 'File']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
