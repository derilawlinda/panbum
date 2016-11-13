<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitDetailDed */

$this->title = $model->id_ded;
$this->params['breadcrumbs'][] = ['label' => 'Unit Detail Ded', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-detail-ded-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unit Detail Ded'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_ded], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_ded], [
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
        'id_ded',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'nama_perencana',
        'status_nama',
        'alamat',
        'status_alamat',
        'no_kontrak',
        'status_kontrak',
        'tgl_awal_ded',
        'tgl_akhir_ded',
        'status_tgl_ded',
        'input_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
