<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Foto */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="foto-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal',
									'id'=> 'foto-form-id',
									'action' => 'index.php?r=foto/create']); ?>

    <?= $form->errorSummary($model); ?>

    

    <?= $form->field($model, 'name')->fileInput(['placeholder' => 'Name']) ?>

    <?= $form->field($model, 'uploaded_date')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Uploaded Date',
                'autoclose' => true
            ]
        ],
    ]); ?>
	
	<?= $form->field($model, 'id_unit')->hiddenInput(['value'=>$id_unit])->label("") ?>
    <div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
