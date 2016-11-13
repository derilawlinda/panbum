<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UnitDetailSosialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-unit-detail-sosial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sosial')->textInput(['maxlength' => true, 'placeholder' => 'Id Sosial']) ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'sosial_text')->textInput(['maxlength' => true, 'placeholder' => 'Sosial Text']) ?>

    <?= $form->field($model, 'sosial_status')->checkbox() ?>

    <?= $form->field($model, 'input_date')->textInput(['placeholder' => 'Input Date']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
