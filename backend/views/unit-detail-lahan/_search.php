<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitDetailLahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-unit-detail-lahan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_lahan')->textInput(['maxlength' => true, 'placeholder' => 'Id Lahan']) ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'hutan_kons')->textInput(['placeholder' => 'Hutan Kons']) ?>

    <?= $form->field($model, 'status_kons')->checkbox() ?>

    <?= $form->field($model, 'hutan_lin')->textInput(['placeholder' => 'Hutan Lin']) ?>

    <?php /* echo $form->field($model, 'status_lin')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'hutan_prod')->textInput(['placeholder' => 'Hutan Prod']) */ ?>

    <?php /* echo $form->field($model, 'status_prod')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'area')->textInput(['placeholder' => 'Area']) */ ?>

    <?php /* echo $form->field($model, 'status_area')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'input_date')->textInput(['placeholder' => 'Input Date']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
