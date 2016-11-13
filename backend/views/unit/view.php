<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */

$this->title = $model->id_unit;
$this->params['breadcrumbs'][] = ['label' => 'Unit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Unit'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->id_unit],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->id_unit], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_unit], [
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
        'id_unit',
        [
            'attribute' => 'wkp.id_wkp',
            'label' => 'Id Wkp',
        ],
        [
            'attribute' => 'pengembang.id_pengembang',
            'label' => 'Id Pengembang',
        ],
        'investasi',
        'prov',
        'kabkot',
        'no_unit',
        'potensi',
        'rencana',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerFoto->totalCount){
    $gridColumnFoto = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_foto',
                        'name',
            'uploaded_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerFoto,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-foto']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Foto'),
        ],
        'columns' => $gridColumnFoto
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekAccroad->totalCount){
    $gridColumnPekAccroad = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_accroad',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekAccroad,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-accroad']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Accroad'),
        ],
        'columns' => $gridColumnPekAccroad
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekCod->totalCount){
    $gridColumnPekCod = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_cod',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekCod,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-cod']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Cod'),
        ],
        'columns' => $gridColumnPekCod
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekEpc->totalCount){
    $gridColumnPekEpc = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_epc',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekEpc,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-epc']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Epc'),
        ],
        'columns' => $gridColumnPekEpc
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekGeosains->totalCount){
    $gridColumnPekGeosains = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_geosains',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekGeosains,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-geosains']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Geosains'),
        ],
        'columns' => $gridColumnPekGeosains
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekKelayakan->totalCount){
    $gridColumnPekKelayakan = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_kelayakan',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekKelayakan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-kelayakan']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Kelayakan'),
        ],
        'columns' => $gridColumnPekKelayakan
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekKonssipil->totalCount){
    $gridColumnPekKonssipil = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_konssipil',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekKonssipil,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-konssipil']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Konssipil'),
        ],
        'columns' => $gridColumnPekKonssipil
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekPengsumur->totalCount){
    $gridColumnPekPengsumur = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_pengsumur',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekPengsumur,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-pengsumur']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Pengsumur'),
        ],
        'columns' => $gridColumnPekPengsumur
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerPekTransmisi->totalCount){
    $gridColumnPekTransmisi = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_transmisi',
                        'target',
            'capaian',
            'remark',
            'status',
            'submitted_date',
            'confirmed_date',
            'confirmed',
            'file',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerPekTransmisi,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-pek-transmisi']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Pek Transmisi'),
        ],
        'columns' => $gridColumnPekTransmisi
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUnitDetailDed->totalCount){
    $gridColumnUnitDetailDed = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_ded',
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
    echo Gridview::widget([
        'dataProvider' => $providerUnitDetailDed,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit-detail-ded']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Unit Detail Ded'),
        ],
        'columns' => $gridColumnUnitDetailDed
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUnitDetailIzin->totalCount){
    $gridColumnUnitDetailIzin = [
        ['class' => 'yii\grid\SerialColumn'],
            'izin_id',
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
    echo Gridview::widget([
        'dataProvider' => $providerUnitDetailIzin,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit-detail-izin']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Unit Detail Izin'),
        ],
        'columns' => $gridColumnUnitDetailIzin
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUnitDetailLahan->totalCount){
    $gridColumnUnitDetailLahan = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_lahan',
                        'hutan_kons',
            'status_kons',
            'hutan_lin',
            'status_lin',
            'hutan_prod',
            'status_prod',
            'area',
            'status_area',
            'input_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUnitDetailLahan,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit-detail-lahan']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Unit Detail Lahan'),
        ],
        'columns' => $gridColumnUnitDetailLahan
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUnitDetailSosial->totalCount){
    $gridColumnUnitDetailSosial = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_sosial',
                        'sosial_text',
            'sosial_status',
            'input_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUnitDetailSosial,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit-detail-sosial']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Unit Detail Sosial'),
        ],
        'columns' => $gridColumnUnitDetailSosial
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerUnitDetailTanah->totalCount){
    $gridColumnUnitDetailTanah = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_tanah',
                        'luas_lahan',
            'status_luas',
            'status_tanah',
            'status_tahun',
            'status_status',
            'legalitas',
            'status_legalitas',
            'input_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUnitDetailTanah,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-unit-detail-tanah']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Unit Detail Tanah'),
        ],
        'columns' => $gridColumnUnitDetailTanah
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerWaktu->totalCount){
    $gridColumnWaktu = [
        ['class' => 'yii\grid\SerialColumn'],
            'id_waktu',
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
    echo Gridview::widget([
        'dataProvider' => $providerWaktu,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-waktu']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Waktu'),
        ],
        'columns' => $gridColumnWaktu
    ]);
}
?>
    </div>
</div>
