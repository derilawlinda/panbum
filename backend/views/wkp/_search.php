<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WkpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-wkp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_wkp')->textInput(['maxlength' => true, 'placeholder' => 'Id Wkp']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'lapangan')->textInput(['maxlength' => true, 'placeholder' => 'Lapangan']) ?>

    <?= $form->field($model, 'peta')->textInput(['maxlength' => true, 'placeholder' => 'Peta']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
