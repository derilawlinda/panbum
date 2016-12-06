<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pltp */

$this->title = 'Tambahkan Pltp';
$this->params['breadcrumbs'][] = ['label' => 'Pltp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pltp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
