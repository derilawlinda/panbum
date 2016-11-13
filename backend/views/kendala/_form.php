<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kendala */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="kendala-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id_kendala')->textInput(['placeholder' => 'Id Kendala']) ?>

    <?= $form->field($model, 'id_unit')->textInput(['maxlength' => true, 'placeholder' => 'Id Unit']) ?>

    <?= $form->field($model, 'kendala')->textInput(['maxlength' => true, 'placeholder' => 'Kendala']) ?>

    <?= $form->field($model, 'penyelesaian')->textInput(['maxlength' => true, 'placeholder' => 'Penyelesaian']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
