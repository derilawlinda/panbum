<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Waktu */

$this->title = $model->id_waktu;
$this->params['breadcrumbs'][] = ['label' => 'Waktu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="waktu-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Waktu'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_waktu], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_waktu], [
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
        'id_waktu',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'pelelangan_tahun',
        'pelelangan_mulai',
        'pelelngan_akhir',
        'penerbitan_tahun',
        'penerbitan_mulai',
        'penerbitan_akhir',
        'eksplorasi_tahun',
        'eskplorasi_awal',
        'eksplorasi_akhir',
        'cod_tahun',
        'cod_mulai',
        'cod_akhir',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
