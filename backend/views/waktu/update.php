<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Waktu */

$this->title = 'Update Waktu: ' . ' ' . $model->id_waktu;
$this->params['breadcrumbs'][] = ['label' => 'Waktu', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_waktu, 'url' => ['view', 'id' => $model->id_waktu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="waktu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
