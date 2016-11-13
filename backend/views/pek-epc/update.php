<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekEpc */

$this->title = 'Update Pek Epc: ' . ' ' . $model->id_epc;
$this->params['breadcrumbs'][] = ['label' => 'Pek Epc', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_epc, 'url' => ['view', 'id' => $model->id_epc]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-epc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
