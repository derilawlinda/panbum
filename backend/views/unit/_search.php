<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-unit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
		'layout'=>'horizontal'
    ]); ?>

    <?php /* $form->field($model, 'id_unit')->textInput(['maxlength' => true, 'placeholder' => 'Id Unit']) */ ?>

    <?= $form->field($model, 'id_pltp')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pltp::find()->orderBy('id')->asArray()->all(), 'id', 'nama_pltp'),
        'options' => ['placeholder' => 'Choose Wkp'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'id_pengembang')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Pengembang::find()->orderBy('id_pengembang')->asArray()->all(), 'id_pengembang', 'nama'),
        'options' => ['placeholder' => 'Choose Pengembang'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php /* $form->field($model, 'investasi')->textInput(['placeholder' => 'Investasi']) */ ?>

    <?php /* $form->field($model, 'prov')->textInput(['maxlength' => true, 'placeholder' => 'Prov']) */ ?>

    <?php /* echo $form->field($model, 'kabkot')->textInput(['maxlength' => true, 'placeholder' => 'Kabkot']) */ ?>

    <?php /* echo $form->field($model, 'no_unit')->textInput(['placeholder' => 'No Unit']) */ ?>

    <?php /* echo $form->field($model, 'potensi')->textInput(['placeholder' => 'Potensi']) */ ?>

    <?php /* echo $form->field($model, 'rencana')->textInput(['placeholder' => 'Rencana']) */ ?>

    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
