<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitDetailDedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-unit-detail-ded-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ded')->textInput(['maxlength' => true, 'placeholder' => 'Id Ded']) ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nama_perencana')->textInput(['maxlength' => true, 'placeholder' => 'Nama Perencana']) ?>

    <?= $form->field($model, 'status_nama')->checkbox() ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat']) ?>

    <?php /* echo $form->field($model, 'status_alamat')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'no_kontrak')->textInput(['maxlength' => true, 'placeholder' => 'No Kontrak']) */ ?>

    <?php /* echo $form->field($model, 'status_kontrak')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'tgl_awal_ded')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Awal Ded',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'tgl_akhir_ded')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Tgl Akhir Ded',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'status_tgl_ded')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'input_date')->textInput(['placeholder' => 'Input Date']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
