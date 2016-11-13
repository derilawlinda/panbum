<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Foto */

$this->title = 'Update Foto: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Foto', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_foto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="foto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
