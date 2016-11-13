<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekKelayakan */

$this->title = 'Update Pek Kelayakan: ' . ' ' . $model->id_kelayakan;
$this->params['breadcrumbs'][] = ['label' => 'Pek Kelayakan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kelayakan, 'url' => ['view', 'id' => $model->id_kelayakan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-kelayakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
