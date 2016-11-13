<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekPengsumur */

$this->title = 'Update Pek Pengsumur: ' . ' ' . $model->id_pengsumur;
$this->params['breadcrumbs'][] = ['label' => 'Pek Pengsumur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengsumur, 'url' => ['view', 'id' => $model->id_pengsumur]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-pengsumur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
