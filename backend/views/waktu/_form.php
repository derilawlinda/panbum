<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Waktu */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="waktu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_waktu')->textInput(['placeholder' => 'Id Waktu']) ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'pelelangan_tahun')->textInput(['placeholder' => 'Pelelangan Tahun']) ?>

    <?= $form->field($model, 'pelelangan_mulai')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Pelelangan Mulai',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'pelelangan_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Pelelngan Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'penerbitan_tahun')->textInput(['placeholder' => 'Penerbitan Tahun']) ?>

    <?= $form->field($model, 'penerbitan_mulai')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Penerbitan Mulai',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'penerbitan_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Penerbitan Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'eksplorasi_tahun')->textInput(['placeholder' => 'Eksplorasi Tahun']) ?>

    <?= $form->field($model, 'eksplorasi_mulai')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Eskplorasi Awal',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'eksplorasi_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Eksplorasi Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'cod_tahun')->textInput(['placeholder' => 'Cod Tahun']) ?>

    <?= $form->field($model, 'cod_mulai')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Cod Mulai',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'cod_akhir')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Cod Akhir',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
