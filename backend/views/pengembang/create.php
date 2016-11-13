<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pengembang */

$this->title = 'Create Pengembang';
$this->params['breadcrumbs'][] = ['label' => 'Pengembang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengembang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
