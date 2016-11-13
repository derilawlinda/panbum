<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Foto */

$this->title = 'Foto';
$this->params['breadcrumbs'][] = ['label' => 'Foto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'id_unit'=>$id_unit
    ]) ?>

</div>
