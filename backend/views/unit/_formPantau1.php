<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */
$linkDownloadOptions = [
    'target' => '#',
    'title' => "Download file",
    'alt' => "Download file"
];
$viewPdfOptions = [
    'target' => '#',
    'title' => "Lihat PDF",
    'alt' => "Lihat PDF"
];
?>

<style>

    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
        margin-top: 20px;
    }
    .file-preview-image{
        width:75% !important;
        height:75% !important;

    }
    .file-footer-caption{
        display:none;
    }
    .file-thumbnail-footer {
        position: relative;
        width: 98%;
    }
    .file-preview-frame:not(.file-preview-error):hover {
        box-shadow: none; 
    }
    .file-preview-frame {
        position: relative;
        display: table;
        margin: 0px;
        height: 100%;
        border: 0px;
        box-shadow: none;
        padding: 6px;
        float: left;
        text-align: center;
        vertical-align: middle;
    }
    .kv-field-from{
        font-size:12px;
    }
    .kv-field-to{
        font-size:12px;
    }

    .nopadding {
        padding: 0 !important;
        margin: 0 !important;
    }
    .kv-date-remove{
        display:none;
    }
    .box-header {
        color: #444;
        display: block;
        padding: 4px;
        position: relative;
        background: gainsboro;
    }
    dl{
        margin-bottom : 0px;
    }
    .dl-horizontal dt {
        /* float: left; */
        /* width: 160px; */
        /* overflow: hidden; */
        /* clear: left; */
        text-align: left; 
        /* text-overflow: ellipsis; */
        /* white-space: nowrap; */
        font-weight : normal;
    }
    .trhead{
        background: gainsboro;
        vertical-align : middle;

    }
    th{
        text-align:center;
        vertical-align : middle !important;
    }

    .table > tbody > tr > td {

        vertical-align: middle;
        padding: 3px;

    }
    .header{
        font-weight: bold;
        background: gainsboro;
        text-align: center;
    }
    .header-isi{
        font-weight: bold;
        text-align: center;
    }


    dl.dl-horizontal.left{
        margin-left: 0;
    }
    dl.dl-horizontal.left dt{
        text-align: left;
        margin-bottom: 1em;
        width: auto;
        padding-right: 1em;
    }
    td.col-md-2.right{
        text-align: center;

    }

    .data{
        text-align:center;
        vertical-align : middle;
    }

    .sd{
        text-align: center;

    }

    .foto{
        height : 200px;
        vertical-align:top !important; 
        width: 50%;
    }
    .form-horizontal .form-group {
        margin-right: -15px;
        margin-left: -15px;
        margin-bottom: 0px;
        margin-top: 3px;
    }
    .form-offset{
        height:36px;
    }
    .table tbody tr td, .table tbody tr th, .table tfoot tr td, .table tfoot tr th, .table thead tr td, .table thead tr th {
        padding: 1px !important;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
        font-size: 12px;
    }
    .centered {
        text-align:center;
        vertical-align: middle !important;
    }

</style>
<div style="display: block; padding-bottom:10px">
    <?php
    echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'Print PDF', ['pdf', 'id' => $modelUnit->id_unit, 'bulan' => $bulan, 'tahun' => $tahun], [
        'class' => 'btn-sm btn-danger',
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
    )
    ?>
</div>
<div class="unit-form">

    <div class="row">
        <div class="col-sm-7">

            <div class="box box-solid">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-sm-1 right"><strong>Nama WKP</strong></td>
                                <td class="col-sm-3 nopadding"><?php echo $modelWkp->nama ?>
                                </td>
                                <td class="col-sm-1 header">Potensi(MW)</td>
                                <td class="col-sm-1 header">Harga</td>
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>PLTP</strong></td>
                                <td class="col-sm-1"><?php echo $modelPltp->nama_pltp ?></td>
                                <td style="text-align:center;vertical-align: middle;" rowspan="2"><?php echo $modelUnitDetail->potensi ?></td>
                                <td rowspan="2" class="centered"><?php echo $modelUnitDetail->harga; ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Unit</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnit->no_unit ?>
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Rencana investasi (USD)</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->investasi ?></td>
                                <td rowspan="2" class="col-sm-1 header">Renc. Pengembangan (MW)</td>
                                <td class="col-sm-2 header">Status dan Catatan</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Provinsi</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->prov ?></td>
                                <td rowspan="5" style="text-align:center;vertical-align: middle;" >
                                    <?php echo $modelUnitDetail->attr_status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?>
                                    <br> 
                                    <?php echo "Catatan : " . $modelUnitDetail->remark ?>
                                </td>
                                
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Kab/Kot</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->kabkot ?></td>
                                <td class="col-sm-1" style="text-align:center;vertical-align: middle;"><?php echo $modelUnitDetail->rencana ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>SK WKP</strong></td>
                                <td class="col-sm-1"><?php echo $modelWkp->skwkp ?></td>
                                <td rowspan="2" class="col-sm-1 header">Kapasitas Terpasang (MW)</td>
                                

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Luas WKP</strong></td>
                                <td class="col-sm-1"><?php echo $modelWkp->luas ?></td>

                            </tr>
                            
                            <tr>
                                <td class="col-sm-1 right"><strong>Tahap Pengembangan</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->tahap ?></td>
                                <td><?= $modelUnitDetail->kap_terpasang?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header with-border" style="text-align:center">
                        <span class="box-title"><strong>Informasi Pengembang</strong></span>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Nama Pemegang Izin</strong></td>
                                    <td class="col-sm-1"><?php echo $modelPengembang->izin ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Nama Pengembang</strong></td>
                                    <td class="col-sm-1"><?php echo $modelPengembang->nama ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Direktur Utama</strong></td>
                                    <td class="col-sm-1"><?php echo $modelPengembang->dirut ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Alamat</strong></td>
                                    <td class="col-sm-2" style="padding-bottom: 43px;"><?php echo $modelPengembang->alamat ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pemegang Saham</strong></td>
                                    <td class="col-sm-2" style="padding-bottom: 43px;"><?php echo $modelUnitDetail->saham ?></td>
                                </tr>
                                <tr>
                                    <td style="background: gainsboro;"><strong>Status</strong></td>
                                    <td style="background: gainsboro;"><strong>Catatan</strong></td>
                                    
                                </tr>
                                <tr>
                                    <td class="centered" ><?php echo $modelPengembang->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td ><?php echo $modelPengembang->remark; ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">

            <div class="box box-solid">
                <div class="box-body">
                    <table class="table table-bordered table-small">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th>Data</th>
                                <th colspan="5"> Penjelasan</th>
                                <th class="col-sm-1" style="border-bottom-color:#ccc !important;"> Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td rowspan="4" class="data col-sm-2"><strong>Tanah</strong></td>
                                <td class="col-sm-1">Luas Lahan</td>
                                <td colspan="4" class="col-sm-1"> <?php echo $modelTanah->luas_lahan ?></td>	
                                <td rowspan="4" class="right centered"><?php echo $modelTanah->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>

                            </tr>
                            <tr>

                                <td class="col-sm-1">Status</td>
                                <td colspan="3" class="col-sm-1"><?php echo $modelTanah->status_tanah ?></td>	
                                <td class="col-sm-1 centered"><?php echo "Tahun : " . $modelTanah->status_tahun ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Legalitas No Akte</td>
                                <td colspan="3" class="col-sm-1"><?php echo $modelTanah->legalitas ?></td>	

                                <td>
                                    <?php echo $modelTanah["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a("<i class='fa fa-copy'></i>", ['view-pdf', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>

                            </tr>
                            <tr>

                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelTanah->remark ?></td>	


                            </tr>


                            <tr>
                                <td rowspan="5" class="data col-sm-1"><strong>Status Lahan</strong></td>
                                <td class="col-sm-1">Hutan Konservasi</td>
                                <td colspan="4" class="col-sm-1"> <?php echo $modelLahan->hutan_kons ?></td>
                                <td rowspan="5" class="right centered"><?php echo $modelLahan->status_lahan ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>


                            </tr>
                            <tr>

                                <td class="col-sm-1">Hutan Lindung</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelLahan->hutan_lin ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Hutan Produksi</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelLahan->hutan_prod ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-2">Area Penggunaan Lain</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelLahan->area ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-2">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelLahan->remark ?></td>	

                            </tr>

                            <tr>
                                <td rowspan="3" class="data col-sm-1"><strong>Produksi</strong></td>
                                <td class="col-sm-1">Uap</td>
                                <td colspan="2" class="col-sm-1"><?php echo $modelProduksi->gas ?></td>	
                                <td colspan="2" class="col-sm-1"><span>Kumulatif <?php echo date('Y'); ?>: </span><?php echo $modelProduksi->cumuap ?> Ton</td>	
                                <td rowspan="3" class="right centered"><?php echo $modelProduksi->status_produksi ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>

                            </tr>
                            <tr>

                                <td class="col-sm-1">Listrik</td>
                                <td colspan="2" class="col-sm-1"><?php echo $modelProduksi->listrik . " MW" ?></td>
                                <td colspan="2" class="col-sm-1"><span>Kumulatif <?php echo date('Y'); ?>: </span><?php echo $modelProduksi->cumlistrik ?> MW</td>

                            </tr>
                            <tr>
                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelProduksi->remark ?></td>	
                            </tr>


                            <tr>
                                <td rowspan="8" class="data col-sm-1"><strong>Izin</strong></td>
                                <td class="col-sm-1">IUP/IPB</td>
                                <td class="col-sm-1">
                                    <?php echo $modelIzin["iup_file"] ? Html::a("<i class='fa fa-download'></i>", ['Download', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->iup_awal . ' s/d ' . $modelIzin->iup_akhir ?></td>
                                <td rowspan="8" class="right centered"><?php echo $modelIzin->status_izin ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-3">Izin Jasa Lingkungan</td>
                                <td class="col-sm-1">
                                    <?php echo $modelIzin["ijl_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->ijl_awal . ' s/d ' . $modelIzin->ijl_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IPPKH</td>

                                <td class="col-sm-1">
                                    <?php echo $modelIzin["ippkh_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->ippkh_awal . ' s/d ' . $modelIzin->ippkh_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMB</td>
                                <td class="col-sm-1">
                                    <?php echo $modelIzin["imb_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->imb_awal . ' s/d ' . $modelIzin->imb_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Amdal</td>
                                <td class="col-sm-1">
                                    <?php echo $modelIzin["amdal_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>

                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->amdal_awal . ' s/d ' . $modelIzin->amdal_akhir ?></td></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMKA</td>
                                <td class="col-sm-1">
                                    <?php echo $modelIzin["imka_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->imka_awal . ' s/d ' . $modelIzin->imka_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Simaksi</td>
                                <td class="col-sm-1">
                                    <?php echo $modelIzin["simaksi_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->simaksi_awal . ' s/d ' . $modelIzin->simaksi_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->remark ?></td>	
                            </tr>
                            <tr>
                                <td class="data col-sm-1"><strong>Sosial</strong></td>
                                <td colspan="5" style="vertical-align:top;height:150px;" class="col-sm-1"> <?php echo $modelSosial->sosial_text ? $modelSosial->sosial_text : "<span class='text-danger'>No data</span>"  ?></td>
                                <td class="right centered"><?php echo $modelSosial->sosial_status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header with-border" style="text-align:center">
                        <span class="box-title"><strong>Resume Uraian Kegiatan</strong></span>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-small">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th class="col-sm-1">Kegiatan</th>
                                    <th class="col-sm-1"> File</th>
                                    <th class="col-sm-1"> Target</th>
                                    <th class="col-sm-1"> Capaian</th>
                                    <th class="col-sm-1"> Status</th>
                                    <th class="col-sm-1"> Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td ><strong>Penyelidikan Geosains</strong></td>
                                    <td ><?php echo $modelPekGeosains["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                    <td ><?php echo $modelPekGeosains->target ?></td>
                                    <td ><?php echo $modelPekGeosains->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekGeosains->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekGeosains->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Pemboran Sumur Eskplorasi</strong></td>
                                    <td><?php echo $modelPekEksplorasi["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Pemboran Sumur Eksplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Pemboran Sumur Eksplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekEksplorasi->target ?></td>
                                    <td><?php echo $modelPekEksplorasi->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekEksplorasi->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekEksplorasi->remark ?></td>

                                </tr>
                                <tr>
                                    <td><strong>Studi Kelayakan</strong></td>
                                    <td><?php echo $modelPekKelayakan["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                    <td><?php echo $modelPekKelayakan->target ?></td>
                                    <td><?php echo $modelPekKelayakan->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekKelayakan->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekKelayakan->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>PPA</strong></td>
                                    <td><?php echo $modelPekPpa["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'PPA/' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'PPA/' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                    <td><?php echo $modelPekPpa->target ?></td>
                                    <td><?php echo $modelPekPpa->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekPpa->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekPpa->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Uji Sumur</strong></td>
                                    <td><?php echo $modelPekUjimonsumur["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                    <td><?php echo $modelPekUjimonsumur->target ?></td>
                                    <td><?php echo $modelPekUjimonsumur->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekUjimonsumur->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekUjimonsumur->remark ?></td>

                                </tr>
                                <tr>
                                    <td><strong>Pemboran Sumur Eksploitasi</strong></td>
                                    <td><?php echo $modelPekPengsumur["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Pengembangan Sumur Eksploitasi/' . $modelPekPengsumur["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekPengsumur->target ?></td>
                                    <td><?php echo $modelPekPengsumur->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekPengsumur->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekPengsumur->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Konstruksi Sipil</strong></td>
                                    <td><?php echo $modelPekKonssipil["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekKonssipil->target ?></td>
                                    <td><?php echo $modelPekKonssipil->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekKonssipil->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekKonssipil->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Konstruksi Jalan</strong></td>
                                    <td><?php echo $modelPekAccroad["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekAccroad->target ?></td>
                                    <td><?php echo $modelPekAccroad->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekAccroad->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekAccroad->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Engineering</strong></td>
                                    <td><?php echo $modelPekEngineering["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekEngineering->target ?></td>
                                    <td><?php echo $modelPekEngineering->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekEngineering->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekEngineering->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Procurement</strong></td>
                                    <td><?php echo $modelPekProcurement["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekProcurement->target ?></td>
                                    <td><?php echo $modelPekProcurement->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekProcurement->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekProcurement->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Construction</strong></td>
                                    <td><?php echo $modelPekProcurement["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Procurement/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekConstruction->target ?></td>
                                    <td><?php echo $modelPekConstruction->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekConstruction->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekConstruction->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Overall Progress EPC</strong></td>
                                    <td><?php echo $modelPekConstruction["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekOverallepc->target ?></td>
                                    <td><?php echo $modelPekOverallepc->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekOverallepc->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekOverallepc->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Transmisi</strong></td>
                                    <td><?php echo $modelPekTransmisi["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <td><?php echo $modelPekTransmisi->target ?></td>
                                    <td><?php echo $modelPekTransmisi->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekTransmisi->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekTransmisi->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>COD</strong></td>
                                    <td><?php echo $modelPekCod["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) . '|' . Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions) : ""; ?>
                                    <td><?php echo $modelPekCod->target ?></td>
                                    <td><?php echo $modelPekCod->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekCod->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?php echo $modelPekCod->remark ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- box -->
                </div>

                <!--row-->
            </div>

            <!--sm5-->
        </div>
        <!-- 2nd row -->
    </div>

    <div class="row">
        <div class="col-sm-7">

            <div class="box box-solid">

                <div class="box-body">
                    <table class="table table-bordered table-small">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th colspan="4">Timeline Pengembangan</th>
                                <th rowspan="3" class="col-sm-1" >Status</th>

                            </tr>
                            <tr class="trhead">
                                <th class="col-sm-2" rowspan="2">Kegiatan </th>
                                <th class="col-sm-2" rowspan="2">Total Tahun</th>
                                <th class="col-sm-2" colspan="2">Bulan/Tahun</th>
                            </tr>
                            <tr class="trhead">
                                <th>Mulai</th>
                                <th>Akhir</th>
                            </tr>
                        </thead>						
                        <tbody>
                            <tr>
                                <td ><strong>Pelelangan</strong></td>
                                <td class="col-sm-1"><?php echo $modelWaktu->pelelangan_tahun ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->pelelangan_mulai ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->pelelangan_akhir ?></td>
                                <td rowspan="6" class="centered"><?php echo $modelWaktu->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Penerbitan IPB/IUP</strong></td>
                                <td class="col-sm-1"><?php echo $modelWaktu->penerbitan_tahun ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->penerbitan_mulai ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->penerbitan_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Eksplorasi</strong></td>
                                <td class="col-sm-1"><?php echo $modelWaktu->eksplorasi_tahun ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->eksplorasi_mulai ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->eksplorasi_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Eksploitasi</strong></td>
                                <td class="col-sm-1"><?php echo $modelWaktu->eksploitasi_tahun ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->eksploitasi_mulai ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->eksploitasi_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>COD</strong></td>
                                <td class="col-sm-1"><?php echo $modelWaktu->cod_tahun ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->cod_mulai ?></td>
                                <td class="col-sm-4"><?php echo $modelWaktu->cod_akhir ?></td>
                            </tr>
                            <tr>
                                <td style="height:40px;"><strong>Catatan</strong></td>
                                <td colspan="3"><?php echo $modelWaktu->remark; ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>	

            <div class="box box-solid " style="border: 1px solid #ddd;padding:2px;">
                <div style="text-align:center;" class="box-header with-border">
                    <span class="box-title"><strong>Kendala</strong></span>
                </div>
                <div style="height:150px;" class="box-body">
                    <?php $modelKendala->kendala ?>
                </div>
            </div>

        </div>
        <div class="col-sm-5">

            <div class="row">
                <div class="box box-solid">
                    <div class="box-body">
                        <table class="table table-bordered table-small">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th>Peta Lokasi WKP</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>								
                            <tbody>
                                <tr>
                                    <td rowspan="2" class="col-sm-1 foto" style="text-align: center; vertical-align: middle !important;"><?php echo !empty($modelFoto->peta) ? Html::img(Url::base().'/uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Peta/' . $modelFoto->peta, ['height' => 150]):"<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>
                                    <td class="col-sm-1 foto" style="text-align: center; vertical-align: middle !important;"><?php echo !empty($modelFoto->name) ? Html::img(Url::base().'/uploads/'. $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name, ['height' => 75]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>
                                </tr>
                                <tr>

                                    <td class="col-sm-1 foto" style="text-align: center; vertical-align: middle !important;"> 
                                        <?php echo!empty($modelFoto->name2) ? Html::img(Url::base().'/uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name2, ['height' => 75]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>

                                </tr>
                                <tr>
                                    <td>
                                        <strong>Status</strong>
                                    </td>
                                    <td>
                                    <?php echo $modelFoto->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Catatan</strong>
                                    </td>
                                    <td>
                                    <?php echo $modelFoto->remark; ?>
                                    </td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>			
            </div>

        </div>

    </div>





</div>

