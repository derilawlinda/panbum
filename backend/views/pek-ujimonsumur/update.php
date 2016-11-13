<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekUjimonsumur */

$this->title = 'Update Pek Ujimonsumur: ' . ' ' . $model->id_ujimonsumur;
$this->params['breadcrumbs'][] = ['label' => 'Pek Ujimonsumur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ujimonsumur, 'url' => ['view', 'id' => $model->id_ujimonsumur]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-ujimonsumur-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
