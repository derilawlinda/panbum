<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-unit-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tahap')->textInput(['maxlength' => true, 'placeholder' => 'Tahap']) ?>

    <?= $form->field($model, 'investasi')->textInput(['placeholder' => 'Investasi']) ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true, 'placeholder' => 'Prov']) ?>

    <?php /* echo $form->field($model, 'kabkot')->textInput(['maxlength' => true, 'placeholder' => 'Kabkot']) */ ?>

    <?php /* echo $form->field($model, 'no_unit')->textInput(['placeholder' => 'No Unit']) */ ?>

    <?php /* echo $form->field($model, 'potensi')->textInput(['placeholder' => 'Potensi']) */ ?>

    <?php /* echo $form->field($model, 'rencana')->textInput(['placeholder' => 'Rencana']) */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['maxlength' => true, 'placeholder' => 'Status']) */ ?>

    <?php /* echo $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) */ ?>

    <?php /* echo $form->field($model, 'attr_status')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'kap_terpasang')->textInput(['placeholder' => 'Kap Terpasang']) */ ?>

    <?php /* echo $form->field($model, 'saham')->textInput(['maxlength' => true, 'placeholder' => 'Saham']) */ ?>

    <?php /* echo $form->field($model, 'harga')->textInput(['maxlength' => true, 'placeholder' => 'Harga']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
