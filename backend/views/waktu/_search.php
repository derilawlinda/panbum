<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WaktuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-waktu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_waktu')->textInput(['placeholder' => 'Id Waktu']) ?>

    <?= $form->field($model, 'id_unit')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Unit::find()->orderBy('id_unit')->asArray()->all(), 'id_unit', 'id_unit'),
        'options' => ['placeholder' => 'Choose Unit'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'pelelangan_tahun')->textInput(['placeholder' => 'Pelelangan Tahun']) ?>

    <?= $form->field($model, 'pelelangan_mulai')->textInput(['placeholder' => 'Pelelangan Mulai']) ?>

    <?= $form->field($model, 'pelelngan_akhir')->textInput(['placeholder' => 'Pelelngan Akhir']) ?>

    <?php /* echo $form->field($model, 'penerbitan_tahun')->textInput(['placeholder' => 'Penerbitan Tahun']) */ ?>

    <?php /* echo $form->field($model, 'penerbitan_mulai')->textInput(['placeholder' => 'Penerbitan Mulai']) */ ?>

    <?php /* echo $form->field($model, 'penerbitan_akhir')->textInput(['placeholder' => 'Penerbitan Akhir']) */ ?>

    <?php /* echo $form->field($model, 'eksplorasi_tahun')->textInput(['placeholder' => 'Eksplorasi Tahun']) */ ?>

    <?php /* echo $form->field($model, 'eskplorasi_awal')->textInput(['placeholder' => 'Eskplorasi Awal']) */ ?>

    <?php /* echo $form->field($model, 'eksplorasi_akhir')->textInput(['placeholder' => 'Eksplorasi Akhir']) */ ?>

    <?php /* echo $form->field($model, 'cod_tahun')->textInput(['placeholder' => 'Cod Tahun']) */ ?>

    <?php /* echo $form->field($model, 'cod_mulai')->textInput(['placeholder' => 'Cod Mulai']) */ ?>

    <?php /* echo $form->field($model, 'cod_akhir')->textInput(['placeholder' => 'Cod Akhir']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
