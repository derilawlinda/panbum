<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'placeholder' => 'Password Hash']) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true, 'placeholder' => 'Auth Key']) ?>

    <?php /* echo $form->field($model, 'confirmed_at')->textInput(['placeholder' => 'Confirmed At']) */ ?>

    <?php /* echo $form->field($model, 'unconfirmed_email')->textInput(['maxlength' => true, 'placeholder' => 'Unconfirmed Email']) */ ?>

    <?php /* echo $form->field($model, 'blocked_at')->textInput(['placeholder' => 'Blocked At']) */ ?>

    <?php /* echo $form->field($model, 'registration_ip')->textInput(['maxlength' => true, 'placeholder' => 'Registration Ip']) */ ?>

    <?php /* echo $form->field($model, 'flags')->textInput(['placeholder' => 'Flags']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
