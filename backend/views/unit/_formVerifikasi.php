<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Verifikasi Unit';
$this->params['breadcrumbs'][] = ['label' => 'Verifikasi Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use lo\modules\noty\Wrapper;

$linkDownloadOptions = [
    'target' => '#',
    'title'=>"Download file",
    'alt'=>"Download file"
];
$viewPdfOptions = [
    'target' => '#',
    'title'=>"Lihat PDF",
    'alt'=>"Lihat PDF"
];
function notempty($var) {
    return ($var==="0"||$var);
}
?>
<style>
    .radio, .radio+label {
        display: inline;
    }
    .radio {
        margin-left: 10px;
    }

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
</style>
<script src="//code.jquery.com/jquery-2.2.4.js"></script>

<div class="unit-form">

    <?php
    $form = ActiveForm::begin(['layout' => 'horizontal',
                'id' => 'verifikasi-form-id',
                'action' => Url::toRoute('unit/verifikasi-data') . '&id_unit=' . $modelUnit->id_unit,
                'fieldConfig' => [
                    'template' => " {beginWrapper}\n{input}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'col-md-2 control-label',
                        'offset' => 'form-offset',
                        'wrapper' => 'col-sm-11',
                        'error' => 'has-error',
                        'hint' => 'help-block',
                    ],
                ],
    ]);
    ?>


    <div class="row">
        <div class="col-sm-12">

            <div class="box box-solid">
                <div class="box-body">
                    <table class="table borderless">
                        <tbody>
                            <tr>
                                <td class="col-sm-1 right"><strong>Nama Wkp</strong></td>
                                <td class="col-sm-1 nopadding"><?=
                                            $form->field($modelWkp, 'id_wkp')
                                            ->dropDownList(
                                                    $wkpList, [
                                                'onchange' => '
													if(this.value != ""){
															$("#pltpdropdown").prop("disabled", false);
															$.get(
																"' . Url::toRoute('getpltpbywkp') . '", 
																{id_wkp: $(this).val()}, 
																function(res){
																	$("#pltpdropdown").html(res);
																}
															);
														}else{
															$("#unit").val("").change();
															$("#pltpdropdown").val("").change();
															$("#unit").prop("disabled", true);
															$("#pltpdropdown").prop("disabled", true);
															
														};
													
													
												',
                                                'prompt' => 'Pilih WKP..',
                                                'id' => 'wkpdropdown',
                                                'options' => ['class' => 'form-group invisible']
                                            ])
                                            ->label(false);
                                    ?>
                                </td>
                                <td class="col-sm-1 header">Potensi(MW)</td>
                                <td class="col-sm-1 header">Disetujui</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Lapangan PLTP</strong></td>
                                <td class="col-sm-1"><?=
                                            $form->field($modelUnit, 'id_pltp')
                                            ->dropDownList(
                                                    $pltpList, ['prompt' => 'Pilih PLTP..',
                                                'id' => 'pltpdropdown',
                                                'onchange' => '
													
														if(this.value != ""){
															$("#unitdropdown").prop("disabled", false);
															$.get(
																	"' . Url::toRoute('get-unit-by-pltp') . '", 
																	{id_pltp: $(this).val()}, 
																	function(res){
																		
																		$("#unitdropdown").html(res);
																	}
																);
														}else{
															$("#unitdropdown").prop("disabled", true);
															$("#unitdropdown").val("").change();
														}
														
													
												 
												 '
                                            ])
                                            ->label(false);
                                    ?>
                                </td>
                                <td class="col-sm-1 header-isi"><?= $form->field($modelUnitDetail, 'potensi')->textInput(['placeholder' => 'Potensi'])->label(false) ?></td>
                                
                                <td rowspan="7" class="col-sm-1" style="text-align: center;">
                                    <?= $form->field($modelUnitDetail, 'attr_status')->radioList(array(1 => 'Ya', 0 => 'Tidak')); ?>
                                    <?= $form->field($modelUnitDetail, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-8 col-sm-offset-2">
                                        Status terakhir : <?php if($modelUnitDetail->attr_status === 0 || $modelUnitDetail->attr_status === 1){
                                        if($modelUnitDetail->attr_status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>No Unit</strong></td>
                                
                                <td class="col-sm-1"> <?=
                                            $form->field($modelUnit, 'no_unit')
                                            ->dropDownList(
                                                    $unitList, ['prompt' => 'Pilih Unit..',
                                                'id' => 'unitdropdown',
                                                'onchange' => '
													
														if(this.value != ""){
															$("#unit-form-id :input:not(#wkpdropdown):not(#pltpdropdown)").prop("disabled", false);
															
														}else{
															$("#unit-form-id :input:not(#wkpdropdown):not(#pltpdropdown):not(#unitdropdown)").prop("disabled", true);
														}
														
													
												 
												 '
                                            ])
                                            ->label(false);
?></td>
                                <td class="col-sm-1 header">Renc. Pembangunan (MW)</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Perkiraan Investasi Rp.</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'investasi')->textInput(['placeholder' => 'No Unit'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'rencana')->textInput(['placeholder' => 'Rencana'])->label(false) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Provinsi</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'prov')->textInput(['placeholder' => 'Propinsi'])->label(false) ?></td>
                                <td class="col-sm-1 header">Kapasitas Terpasang (MW)</td>
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Kab/Kota</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'kabkot')->textInput(['placeholder' => 'Kabupaten/Kota'])->label(false) ?></td>
                                <td><?= $form->field($modelUnitDetail, 'kap_terpasang')->textInput(['placeholder' => 'dalam MW'])->label(false) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>SK WKP</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWkp, 'skwkp')->textInput(['placeholder' => 'SK WKP'])->label(false) ?></td>
                                <td class="col-sm-1 header">Harga</td>

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Tahap Pengembangan</strong></td>
                                <td class="col-sm-1"><?=
                                    $form->field($modelUnitDetail, 'tahap')->dropDownList(
                                            ["Persiapan Lelang/Penugasan" => "Persiapan Lelang/Penugasan",
                                        "Proses Penerbitan IPB" => "Proses Penerbitan IPB",
                                        "Eksplorasi"=>"Eksplorasi",
                                        "Eksploitasi" => "Eksploitasi",
                                        "Pemanfaatan" => "Pemanfaatan"], ['prompt' => 'Pilih Tahapan..'
                                            ]
                                    )->label(false)
                                    ?></td>
                                <td rowspan="2"><?= $form->field($modelUnitDetail, 'harga')->textInput(['placeholder' => 'Harga'])->label(false) ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-12">				
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Pengembang</h3>
                </div>
                <div class="box-body">
                    <table class="table borderless">
                        <tbody>
                            <tr>
                                <td class="col-sm-1"><strong>Nama Pemegang Izin</strong></td>
                                <td class="col-sm-2"><?= $form->field($modelPengembang, 'izin')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pemegang Izin'])->label(false) ?></td>
                                <td rowspan="4" class="col-sm-2">
                                    
                                    
                                    <?= $form->field($modelPengembang, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-6']); ?>
                                    <?= $form->field($modelPengembang, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-6'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-6 col-sm-offset-5">
                                        Status terakhir : <?php if($modelPengembang->status === 1 ||$modelPengembang->status === 0){
                                        if($modelPengembang->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Nama Pengembang</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelPengembang, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pengembang'])->label(false) ?></td>
                            </tr>
                             <tr>
                                <td class="col-sm-1 right"><strong>Direktur Utama</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelPengembang, 'dirut')->textInput(['maxlength' => true, 'placeholder' => 'Direktur Utama'])->label(false) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Alamat</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelPengembang, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat'])->label(false) ?></td>
                            </tr>
                            <tr>
                                    <td class="col-sm-1" ><strong>Pemegang Saham</strong></td>
                                    <td class="col-sm-2" style="padding-bottom: 40px !important;"><?= $form->field($modelUnitDetail, 'saham')->textArea(['rows' => 3, 'maxlength' => true, 'placeholder' => 'Pemegang Saham'])->label(false) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>							
        </div>	
    </div>

    <div class="row">
        <div class="col-sm-12">


            <div class="box box-solid">
                <div class="box-body">
                    <table class="table borderless">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th>Peta Lokasi WKP</th>
                                <th>Foto</th>
                                <th>Disetujui</th>
                            </tr>
                        </thead>								
                        <tbody>
                            <tr>
                                <td rowspan="2" class="col-sm-5 foto" style="padding-top:100px;text-align:center"><?php echo!empty($modelFoto->peta) ? Html::img(Url::base().'/uploads/'.$modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Peta/' . $modelFoto->peta, ['height' => 200]) : Html::img('image/map.png', ['height' => 200]); ?></td>
                                <td class="col-sm-4 foto" style="text-align: center;padding-top: 5px">
                                    <?php echo!empty($modelFoto->name) ? Html::img(Url::base().'/uploads/'. $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name, ['height' => 200]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>
                                </td>
                                <td rowspan="2" class="col-sm-3">
                                    <?= $form->field($modelFoto, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelFoto, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-9 col-sm-offset-2">
                                        Status terakhir : <?php if($modelFoto->status === 0 || $modelFoto->status === 1){
                                        if($modelFoto->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>

                                <td class="col-sm-1 foto" style="text-align: center;padding-top: 5px"> 
                                    <?php echo!empty($modelFoto->name2) ? Html::img(Url::base().'/uploads/'.$modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name2, ['height' => 200]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>			


        </div>

    </div>


    <div class="row">
        <div class="col-sm-12">			
            <div class="box box-solid">
                <div class="box-body">
                    <table class="table table-small">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th>Data</th>
                                <th colspan="5"> Penjelasan</th>
                                <th> Disetujui </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td rowspan="3" class="data col-sm-1"><strong>Tanah</strong></td>
                                <td class="col-sm-2">Luas Lahan</td>
                                <td colspan="4" class="col-sm-5"> <?= $form->field($modelTanah, 'luas_lahan')->textInput(['placeholder' => 'Luas Lahan'])->label(false) ?></td>		
                                <td rowspan="3" class="col-sm-2">
                                    <?= $form->field($modelTanah, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelTanah, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-10 col-sm-offset-2">
                                        Status terakhir : <?php if($modelTanah->status === 1 ||$modelTanah->status === 0 ){
                                        if($modelTanah->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>

                                <td >Status</td>
                                <td colspan="3" ><?= $form->field($modelTanah, 'status_tanah')->textInput(['placeholder' => 'Status'])->label(false) ?></td>	
                                <td ><?= $form->field($modelTanah, 'status_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td>Legalitas No Akte</td>
                                <td colspan="3" ><?= $form->field($modelTanah, 'legalitas')->textInput(['maxlength' => true, 'placeholder' => 'Legalitas'])->label(false); ?></td>	
                                <td ><?php echo $modelTanah["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a("<i class='fa fa-copy'></i>", ['view-pdf', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>

                            </tr>

                            <tr>
                                <td rowspan="4" class="data col-sm-1"><strong>Status Lahan</strong></td>
                                <td class="col-sm-1">Hutan Konservasi</td>
                                <td colspan="4" class="col-sm-1"> <?= $form->field($modelLahan, 'hutan_kons')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>		
                                <td rowspan="4">
                                    <?= $form->field($modelLahan, 'status_lahan')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelLahan, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-10 col-sm-offset-2">
                                        Status terakhir : <?php if($modelLahan->status_lahan === 0 || $modelLahan->status_lahan === 1){
                                        if($modelLahan->status_lahan == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                
                                </td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Hutan Lindung</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelLahan, 'hutan_lin')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td >Hutan Produksi</td>
                                <td colspan="4" ><?= $form->field($modelLahan, 'hutan_prod')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td>Area Penggunaan Lahan</td>
                                <td colspan="4" ><?= $form->field($modelLahan, 'area')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>

                            <tr>
                                <td rowspan="2" class="data"><strong>Produksi</strong></td>
                                <td >Uap</td>
                                <td colspan="4" ><?= $form->field($modelProduksi, 'gas')->textInput(['maxlength' => true, 'placeholder' => 'Produksi Gas'])->label(false) ?></td>		
                                <td rowspan="2" class="col-sm-2">
                                    <?= $form->field($modelProduksi, 'status_produksi')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelProduksi, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-10 col-sm-offset-2">
                                        Status terakhir : <?php if($modelProduksi->status_produksi === 1 || $modelProduksi->status_produksi === 0){
                                        if($modelProduksi->status_produksi == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                
                                </td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Listrik</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelProduksi, 'listrik')->textInput(['maxlength' => true, 'placeholder' => 'Dalam MegaWatt(MW)'])->label(false) ?></td>	

                            </tr>


                            <tr>
                                <td rowspan="7" class="data"><strong>Izin</strong></td>
                                <td>IUP/IPB</td>
                                <td class="col-sm-1" ><?= $modelIzin["iup_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>
                                <td colspan="3" class="col-sm-3"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'iup_awal',
                                        'attribute2' => 'iup_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                                <td rowspan="7" class="col-sm-2">
                                    <?= $form->field($modelIzin, 'status_izin')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelIzin, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-10 col-sm-offset-2">
                                        Status terakhir : <?php if($modelIzin->status_izin===1 || $modelIzin->status_izin===0){
                                        if($modelIzin->status_izin == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                
                                </td>

                            </tr>
                            <tr>
                                <td >Izin Jasa Lingkungan</td>
                                <td class="col-sm-1"><?= $modelIzin["ijl_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>		
                                <td colspan="3" class="col-sm-3"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'ijl_awal',
                                        'attribute2' => 'ijl_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IPPKH</td>
                                <td class="col-sm-1"><?= $modelIzin["ippkh_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>		
                                <td colspan="3" class="col-sm-3"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'ippkh_awal',
                                        'attribute2' => 'ippkh_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMB</td>
                                <td class="col-sm-1"><?= $modelIzin["imb_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>		
                                <td colspan="3" class="col-sm-3"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'imb_awal',
                                        'attribute2' => 'imb_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Amdal</td>
                                <td class="col-sm-1"><?= $modelIzin["amdal_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>		
                                <td colspan="3" class="col-sm-3"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'amdal_awal',
                                        'attribute2' => 'amdal_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMKA</td>
                                <td class="col-sm-1"><?= $modelIzin["imka_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>		
                                <td colspan="3" class="col-sm-3"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'imka_awal',
                                        'attribute2' => 'imka_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td >Simaksi</td>
                                <td ><?= $modelIzin["simaksi_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?></td>		
                                <td colspan="3" class="col-sm-3" ><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'simaksi_awal',
                                        'attribute2' => 'simaksi_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="data col-sm-1"><strong>Sosial</strong></td>
                                <td colspan="5" style="vertical-align:top;height:150px;" class="col-sm-3"> <?= $form->field($modelSosial, 'sosial_text')->textArea([ 'rows' => '6', 'placeholder' => 'Data sosial'])->label(false) ?></td>
                                <td class="col-sm-2">
                                    <?= $form->field($modelSosial, 'sosial_status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelSosial, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                                    <br>
                                    <span class="col-sm-10 col-sm-offset-2">
                                        Status terakhir : <?php if($modelSosial->sosial_status === 0 || $modelSosial->sosial_status === 1 ){
                                        if($modelSosial->sosial_status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-solid">
                <div class="box-header with-border" style="text-align:center">
                    <h3 class="box-title">Resume Uraian Pekerjaan</h3>
                </div>
                <div class="box-body">
                    <table class="table borderless">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th class="col-sm-2">Progress Terlaksana</th>
                                <th class="col-sm-1"> File </th>
                                <th class="col-sm-2"> Target</th>
                                <th class="col-sm-2"> Capaian</th>
                                <th class="col-sm-1"> Disetujui </th>
                                <th  class="col-sm-1"> Catatan </th>
                                <th  class="col-sm-1"> Status terakhir </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Penyelidikan Geosains</strong></td>
                                <td><?= $modelPekGeosains["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td><?= $form->field($modelPekGeosains, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td><?= $form->field($modelPekGeosains, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td><?= $form->field($modelPekGeosains, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td><?= $form->field($modelPekGeosains, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekGeosains->status === 1 ||$modelPekGeosains->status ===0 ){
                                        if($modelPekGeosains->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Pemboran Sumur Eskplorasi</strong></td>
                                <td class="col-sm-1"><?= $modelPekEksplorasi["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Pemboran Sumur Eksplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Pemboran Sumur Eksplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekEksplorasi, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekEksplorasi, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekEksplorasi, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekEksplorasi, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekEksplorasi->status === 1 || $modelPekEksplorasi->status === 0){
                                        if($modelPekEksplorasi->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Studi Kelayakan</strong></td>
                                <td class="col-sm-1"><?= $modelPekKelayakan["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekKelayakan, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekKelayakan, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekKelayakan, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekKelayakan, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekKelayakan->status===1 || $modelPekKelayakan->status===0){
                                        if($modelPekKelayakan->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>PPA</strong></td>
                                <td class="col-sm-1"><?= $modelPekPpa["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'PPA/' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'PPA/' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                               <td class="col-sm-1"><?= $form->field($modelPekPpa, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekPpa, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekPpa, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekPpa, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekKelayakan->status === 1 || $modelPekKelayakan->status === 0){
                                        if($modelPekKelayakan->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Uji Sumur</strong></td>
                                <td class="col-sm-1"><?= $modelPekUjimonsumur["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekUjimonsumur, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekUjimonsumur, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekUjimonsumur, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekUjimonsumur, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekUjimonsumur->status===1 ||$modelPekUjimonsumur->status===0 ){
                                        if($modelPekUjimonsumur->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Pemboran Sumur Eksploitasi</strong></td>
                                <td class="col-sm-1"><?= $modelPekPengsumur["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Pengembangan Sumur Eksploitasi/' . $modelPekPengsumur["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Pengembangan Sumur Eksploitasi/' . $modelPekPengsumur["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekPengsumur, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekPengsumur, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekPengsumur, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekPengsumur, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekPengsumur->status === 1 || $modelPekPengsumur->status === 0 ){
                                        if($modelPekPengsumur->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Konstruksi Sipil</strong></td>
                                <td class="col-sm-1"><?= $modelPekKonssipil["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekKonssipil, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekKonssipil, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekKonssipil, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekKonssipil, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekKonssipil->status === 1 || $modelPekKonssipil->status ===0){
                                        if($modelPekKonssipil->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Konstruksi Jalan</strong></td>
                                <td class="col-sm-1"><?= $modelPekAccroad["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekAccroad, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekAccroad, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekAccroad, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekAccroad, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekAccroad->status === 1 || $modelPekAccroad->status === 0){
                                        if($modelPekAccroad->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Engineering</strong></td>
                                <td class="col-sm-1"><?= $modelPekEngineering["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekEngineering, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekEngineering, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekEngineering, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekEngineering, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekEngineering->status===1 ||$modelPekEngineering->status===0 ){
                                        if($modelPekEngineering->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Procurement</strong></td>
                                <td class="col-sm-1"><?= $modelPekProcurement["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekProcurement, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekProcurement, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekProcurement, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekProcurement, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekProcurement->status === 1 || $modelPekProcurement->status === 0){
                                        if($modelPekProcurement->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Construction</strong></td>
                                <td class="col-sm-1"><?= $modelPekConstruction["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekConstruction, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekConstruction, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekConstruction, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekConstruction, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekConstruction->status===1 ||$modelPekConstruction->status===0 ){
                                        if($modelPekConstruction->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Overall Progress EPC</strong></td>
                                <td class="col-sm-1"><?= $modelPekOverallepc["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Overall Progress EPC/' . $modelPekOverallepc["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Overall Progress EPC/' . $modelPekOverallepc["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekOverallepc, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekOverallepc, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                
                                <td class="col-sm-1"><?= $form->field($modelPekOverallepc, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekOverallepc, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekOverallepc->status === 1 || $modelPekOverallepc->status === 0){
                                        if($modelPekOverallepc->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Transmisi</strong></td>
                                <td class="col-sm-1"><?= $modelPekTransmisi["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekTransmisi, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekTransmisi, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekTransmisi, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekTransmisi, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekTransmisi->status === 1 || $modelPekTransmisi->status === 0 ){
                                        if($modelPekTransmisi->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>COD</strong></td>
                                <td class="col-sm-1"><?= $modelPekCod["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions): "<span class='label label-danger'>No File</span>"; ?> </td>
                                <td class="col-sm-1"><?= $form->field($modelPekCod, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekCod, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekCod, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?></td>
                                <td class="col-sm-1"><?= $form->field($modelPekCod, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?></td>
                                <td>
                                    <span class="col-sm-10 col-sm-offset-2">
                                     <?php if($modelPekCod->status === 1 || $modelPekCod->status === 0 ){
                                        if($modelPekCod->status == 1){
                                            echo "<span class='label label-success'>Disetujui</span>";
                                        }else{
                                            echo "<span class='label label-danger'>Ditolak</span>";
                                            
                                        }
                                        
                                    }else{
                                        
                                       echo "<span class='label label-warning'>Belum diverifikasi</span>"; 
                                    }
                                    
                                    ?>
                                    </span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <!-- box -->
            </div>			
            <!--sm5-->
        </div>
        <!-- 2nd row -->
    </div>

    <div class="row">
        <div class="col-sm-12">

            <div class="box box-solid">

                <div class="box-body">
                    <table class="table borderless">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th colspan="4">Waktu Pengembangan</th>
                                <th rowspan="3">Disetujui </th>

                            </tr>
                            <tr class="trhead">
                                <th rowspan="2">Kegiatan </th>
                                <th rowspan="2">Total Tahun</th>
                                <th colspan="2">Bulan/Tahun</th>
                            </tr>
                            <tr class="trhead">
                                <th>Mulai</th>
                                <th>Akhir</th>
                            </tr>
                        </thead>						
                        <tbody>
                            <tr>
                                <td class="col-sm-1 right"><strong>Pelelangan</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWaktu, 'pelelangan_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td class="col-sm-4" colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'pelelangan_mulai',
                                        'attribute2' => 'pelelangan_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                                <td rowspan="5" class="col-sm-1">
                                    <?= $form->field($modelWaktu, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
                                    <?= $form->field($modelWaktu, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Penerbitan IPB/IUP</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWaktu, 'penerbitan_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td class="col-sm-1" colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'penerbitan_mulai',
                                        'attribute2' => 'penerbitan_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Eksplorasi</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWaktu, 'eksplorasi_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td class="col-sm-1" colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'eksplorasi_mulai',
                                        'attribute2' => 'eksplorasi_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Eksploitasi</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWaktu, 'eksploitasi_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td class="col-sm-1" colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'eksploitasi_mulai',
                                        'attribute2' => 'eksploitasi_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>COD</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWaktu, 'cod_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td class="col-sm-1" colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'cod_mulai',
                                        'attribute2' => 'cod_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>	



        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-solid">
                <div style="text-align:center;" class="box-header with-border">
                    <h3 class="box-title">Kendala</h3>
                </div>
                <div style="height:150px;" class="box-body">
                    <div class="col-sm-9">
    <?= $form->field($modelKendala, 'kendala')->textArea(['maxlength' => true, 'placeholder' => 'Kendala', 'rows' => 4])->label(false) ?>
                    </div>
                    <div class="col-sm-3">
    <?= $form->field($modelKendala, 'status')->radioList([1 => 'Ya', 0 => 'Tidak'], ['class' => 'col-sm-offset-3']); ?>
    <?= $form->field($modelKendala, 'remark')->textArea(['placeholder' => 'Catatan', 'class' => 'commentClass col-sm-offset-3'])->label(false) ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>




    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-1 pull-right">
<?= Html::submitButton("Save", ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?= $form->errorSummary($modelTanah); ?>
<?php ActiveForm::end(); ?>
    <br>
<?php
echo Wrapper::widget([
    'layerClass' => 'lo\modules\noty\layers\Noty',
    'options' => [
        'dismissQueue' => true,
        'layout' => 'topRight',
        'timeout' => 1000,
        'theme' => 'relax',
    ]
]);
?>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#verifikasi-form-id :input:not(:radio):not(.commentClass):not(.btn)").prop("disabled", true);
            $("#verifikasi-form-id :radio").prop('checked', false);
            $('form#verifikasi-form-id').on('beforeSubmit', function (e)
            {

                $(".loading").show();
                var form = $(this);
                var formData = new FormData();
                

                $.each($('form#verifikasi-form-id :input:enabled:checked'), function (i, elm) {
                    formData.append(elm.name, elm.value)
                });
                $.each($('form#verifikasi-form-id textarea'), function (i, elm) {
                    formData.append(elm.name, elm.value)
                });

                // return false if form still have some validation errors

                if ($('.error-sumary').attr('style') == 'display:none') {

                    return false;
                }
                // submit form

                $.ajax({
                    processData: false,
                    contentType: false,
                    url: form.attr('action'),
                    type: 'post',
                    data: formData,
                    success: function (response)
                    {
                         $(".loading").hide();
                         
                    },
                    error: function ()
                    {
                        console.log('internal server error');
                    }
                });
                return false;
            });
        });
    </script>
