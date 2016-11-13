<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitDetailTanahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-unit-detail-tanah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tanah')->textInput(['maxlength' => true, 'placeholder' => 'Id Tanah']) ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'luas_lahan')->textInput(['placeholder' => 'Luas Lahan']) ?>

    <?= $form->field($model, 'status_luas')->checkbox() ?>

    <?= $form->field($model, 'status_tanah')->textInput(['maxlength' => true, 'placeholder' => 'Status Tanah']) ?>

    <?php /* echo $form->field($model, 'status_tahun')->textInput(['maxlength' => true, 'placeholder' => 'Status Tahun']) */ ?>

    <?php /* echo $form->field($model, 'status_status')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'legalitas')->textInput(['maxlength' => true, 'placeholder' => 'Legalitas']) */ ?>

    <?php /* echo $form->field($model, 'status_legalitas')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'input_date')->textInput(['placeholder' => 'Input Date']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
