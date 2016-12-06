<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PltpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-pltp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'id_wkp')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Wkp::find()->orderBy('id_wkp')->asArray()->all(), 'id_wkp', 'id_wkp'),
        'options' => ['placeholder' => 'Choose Wkp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nama_pltp')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pltp']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>

    <?= $form->field($model, 'id_pengembang')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pengembang::find()->orderBy('id_pengembang')->asArray()->all(), 'id_pengembang', 'id_pengembang'),
        'options' => ['placeholder' => 'Choose Pengembang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
