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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_unit',
        [
                'attribute' => 'wkp.id_wkp',
                'label' => 'Id Wkp'
            ],
        [
                'attribute' => 'pengembang.id_pengembang',
                'label' => 'Id Pengembang'
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Foto'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Accroad'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Cod'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Epc'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Geosains'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Kelayakan'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Konssipil'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Pengsumur'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Pek Transmisi'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Unit Detail Ded'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Unit Detail Izin'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Unit Detail Lahan'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Unit Detail Sosial'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Unit Detail Tanah'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Waktu'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnWaktu
    ]);
}
?>
    </div>
</div>
