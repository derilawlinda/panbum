<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KendalaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-kendala-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kendala')->textInput(['placeholder' => 'Id Kendala']) ?>

    <?= $form->field($model, 'id_unit')->textInput(['maxlength' => true, 'placeholder' => 'Id Unit']) ?>

    <?= $form->field($model, 'kendala')->textInput(['maxlength' => true, 'placeholder' => 'Kendala']) ?>

    <?= $form->field($model, 'penyelesaian')->textInput(['maxlength' => true, 'placeholder' => 'Penyelesaian']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
