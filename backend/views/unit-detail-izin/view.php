<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailIzin */

$this->title = $model->izin_id;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Izin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-detail-izin-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unit Detail Izin'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->izin_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->izin_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'izin_id',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'iup_awal',
        'iup_akhir',
        'iup_file',
        'iup_status',
        'ippkh_awal',
        'ippkh_akhir',
        'ippkh_file',
        'ippkh_status',
        'imb_awal',
        'imb_akhir',
        'imb_file',
        'imb_status',
        'amdal_awal',
        'amdal_akhir',
        'amdal_file',
        'amdal_status',
        'imka_awal',
        'imka_akhir',
        'imka_file',
        'imka_status',
        'simaksi_awal',
        'simaksi_akhir',
        'simaksi_file',
        'simaksi_status',
        'input_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
