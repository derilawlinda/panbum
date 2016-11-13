<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pengembang */

$this->title = 'Update Pengembang: ' . ' ' . $model->id_pengembang;
$this->params['breadcrumbs'][] = ['label' => 'Pengembang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengembang, 'url' => ['view', 'id' => $model->id_pengembang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengembang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
