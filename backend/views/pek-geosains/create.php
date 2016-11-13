<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PekGeosains */

$this->title = 'Penyelidikan Geosains';
$this->params['breadcrumbs'][] = ['label' => 'Pek Geosains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pek-geosains-create">

    <h3><?= Html::encode($this->title).' di '.$wkp_name. ' unit '.$no_unit ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
		'wkp_name'=>$wkp_name,
		'id_unit'=>$id_unit,
		'id_wkp'=>$id_wkp,
		'no_unit'=>$no_unit
    ]) ?>

</div>
