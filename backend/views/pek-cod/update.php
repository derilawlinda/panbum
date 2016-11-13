<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PekCod */

$this->title = 'Update Pek Cod: ' . ' ' . $model->id_cod;
$this->params['breadcrumbs'][] = ['label' => 'Pek Cod', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cod, 'url' => ['view', 'id' => $model->id_cod]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pek-cod-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
