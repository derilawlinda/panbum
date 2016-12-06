<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;
use lo\modules\noty\Wrapper;
use yii\helpers\BaseUrl;
/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Input Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
?>

<style>
    .table tbody tr td, .table tbody tr th, .table tfoot tr td, .table tfoot tr th, .table thead tr td, .table thead tr th {
        padding: 1px !important;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
        font-size: 12px;
    }
    div.form-group.field-waktu-remark{
        padding-bottom: 20px;
    }
    div.form-group.field-waktu-remark.has-success{
        padding-bottom: 20px;
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
        text-align:center;

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
    .left{
        border-bottom-color: #ccc !important;
        border-left-color:#ccc !important;
        border-top-color: #ccc !important;
    }
    
    .top{
        border-top-color: #ccc !important;
        
    }
    .bottom{
        border-bottom-color: #ccc !important;
       
    }
    .right{
        border-bottom-color: #ccc !important;
        border-right-color:#ccc !important;
        border-top-color: #ccc !important;
    }
</style>
<script src="scripts/jquery.js"></script>

<div class="unit-form">


    <?php
    $form = ActiveForm::begin(['layout' => 'horizontal',
                'id' => 'unit-form-id',
                'action' => Url::toRoute('unit/update') . '&id_unit=' . $modelUnit->id_unit,
                'fieldConfig' => [
                    'template' => " {beginWrapper}\n{label}\n{input}\n{endWrapper}",
                    'horizontalCssClasses' => [
                        'label' => 'pull-left',
                        'offset' => 'form-offset',
                        'wrapper' => 'col-sm-11',
                        'error' => 'has-error',
                        'hint' => 'help-block',
                    ],
                ],
    ]);
    ?>



    <div class="row">

        <div class="col-sm-6">

            <div class="box box-solid">
                <div class="box-body">
                    <table class="table table-bordered table-condensed col-sm">
                        <tbody>
                            <tr>
                                <td class="col-sm-1"><strong>Nama WKP</strong></td>
                                <td class="col-sm-2 nopadding"><?=
                                            $form->field($modelWkp, 'id_wkp')
                                            ->textInput(['readonly'=>true,'id'=>'wkpfield'])
                                            ->label(false);
                                    ?>
                                </td>
                                <td class="col-sm-1 header">Potensi(MW)</td>
                                <td class="col-sm-2 header">Harga</td>
                                
                            </tr>
                            <tr>
                                <td><strong>PLTP</strong></td>
                                <td><?=
                                            $form->field($modelUnit, 'id_pltp')
                                            ->textInput(['readonly'=>true,'id'=>'pltpfield'])
                                            ->label(false);
                                    ?>
                                </td>
                                <td rowspan="2"><?= $form->field($modelUnitDetail, 'potensi')->textInput(['placeholder' => 'Potensi'])->label(false) ?></td>
                                <td rowspan="2"><?= $form->field($modelUnitDetail, 'harga')->textInput(['placeholder' => 'Harga'])->label(false) ?></td>
                                
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1"><strong>Unit</strong></td>
                                <td class="col-sm-1"> <?=
                                            $form->field($modelUnit, 'no_unit')
                                            ->textInput(['readonly'=>true,'id'=>'unitfield'])
                                            ->label(false);
                                    ?></td>
                                
                            </tr>
                            <tr>
                                <td><strong>Rencana Investasi (USD)</strong></td>
                                <td><?= $form->field($modelUnitDetail, 'investasi')->textInput(['placeholder' => 'USD'])->label(false) ?></td>
                                <td rowspan="2" class="col-sm-1 header">Renc. Pengembangan (MW)</td>
                                <td rowspan="2" class="header">Status dan Catatan</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1"><strong>Provinsi</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'prov')->textInput(['placeholder' => 'Propinsi'])->label(false) ?></td>
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1"><strong>Kab/Kota</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'kabkot')->textInput(['placeholder' => 'Kabupaten/Kota'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelUnitDetail, 'rencana')->textInput(['placeholder' => 'Rencana'])->label(false) ?></td>
                                <td rowspan="4" >
                                    <?php echo $modelUnitDetail->attr_status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>";
                                    echo $form->field($modelUnitDetail, 'remark')->textArea([ 'rows' => '3',
                                        'placeholder' => 'Catatan'])->label(false)
                                ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1"><strong>SK WKP</strong></td>
                                <td class="col-sm-3"><?= $form->field($modelWkp, 'skwkp')->textInput(['placeholder' => 'SK WKP'])->label(false) ?></td>
                                <td rowspan="2" class="col-sm-1 header">Kapasitas Terpasang (MW)</td>
                                

                            </tr>
                             <tr>
                                <td><strong>Luas WKP(Ha)</strong></td>
                                <td><?= $form->field($modelWkp, 'luas')->textInput(['placeholder' => 'dalam hektar'])->label(false) ?></td>
                                
                            </tr>
                            <tr>
                                <td><strong>Tahapan pengembangan</strong></td>
                                <td><?=
                                    $form->field($modelUnitDetail, 'tahap')->dropDownList(
                                            ["Persiapan Lelang/Penugasan" => "Persiapan Lelang/Penugasan",
                                        "Proses Penerbitan IPB" => "Proses Penerbitan IPB",
                                        "Eksplorasi"=>"Eksplorasi",
                                        "Eksploitasi" => "Eksploitasi",
                                        "Pemanfaatan" => "Pemanfaatan"], ['prompt' => 'Pilih Tahapan..'
                                            ]
                                    )->label(false)
                                    ?></td>
                                <td><?= $form->field($modelUnitDetail, 'kap_terpasang')->textInput(['placeholder' => 'dalam MW'])->label(false) ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header with-border" style="text-align:center">
                        <h3 class="box-title">Informasi Pengembang</h3>
                    </div>
                    <div class="box-body">
                        <table class="table borderless">
                            <tbody>
                                <tr>
                                    <td class="col-sm-1"><strong>Nama Pemegang Izin</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'izin')->textInput(['disabled' => 'disabled', 'maxlength' => true, 'placeholder' => 'Nama Pemegang Izin'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1"><strong>Nama Pengembang</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'nama')->textInput(['disabled' => 'disabled', 'maxlength' => true, 'placeholder' => 'Nama Pengembang'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1"><strong>Direktur Utama</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'dirut')->textInput(['maxlength' => true, 'placeholder' => 'Direktur Utama'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1" ><strong>Alamat</strong></td>
                                    <td class="col-sm-2" style="padding-bottom: 40px !important;"><?= $form->field($modelPengembang, 'alamat')->textArea(['rows' => 3, 'maxlength' => true, 'placeholder' => 'Alamat'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1" ><strong>Pemegang Saham</strong></td>
                                    <td class="col-sm-2" style="padding-bottom: 40px !important;"><?= $form->field($modelUnitDetail, 'saham')->textArea(['rows' => 3, 'maxlength' => true, 'placeholder' => 'Pemegang Saham'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td><strong>Catatan</strong></td>                                    
                                </tr>
                                <tr>
                                    <td><?php echo $modelPengembang->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td style="padding-bottom: 40px !important;"><?= $form->field($modelPengembang, 'remark')->textArea([ 'rows' => '3','placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

 

        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">

            <div class="box box-solid">
                <div class="box-body">
                    <table class="table table-small table-bordered">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th style="border-bottom-color: #ccc !important;">Data</th>
                                <th colspan="5" class="col-sm-10" style="border-bottom-color: #ccc !important;" > Penjelasan</th>
                                <th class="col-sm-1" style="border-bottom-color:#ccc !important;"> Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td rowspan="4" class="left data col-sm-2"><strong>Tanah</strong></td>
                                <td class="col-sm-1 top">Luas Lahan</td>
                                <td colspan="4" class="col-sm-1"> <?= $form->field($modelTanah, 'luas_lahan')->textInput(['placeholder' => 'Luas Lahan'])->label(false) ?></td>		
                                <td rowspan="4" class="right"><?php echo $modelTanah->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Status</td>
                                <td colspan="3" class="col-sm-1"><?= $form->field($modelTanah, 'status_tanah')->textInput(['placeholder' => 'Status'])->label(false) ?></td>	
                                <td class="col-sm-1"><?= $form->field($modelTanah, 'status_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Legalitas No Akte</td>
                                <td colspan="3" class="col-sm-1"><?= $form->field($modelTanah, 'legalitas')->textInput(['maxlength' => true, 'placeholder' => 'Legalitas'])->label(false); ?></td>	

                                <td class="col-sm-1">
                                    <?= $modelTanah["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a("<i class='fa fa-copy'></i>", ['view-pdf', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    
                                    <?=
                                    $form->field($modelTanah, 'file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
                                                                if($(this)[0].files.length > 0){
                                                                        $($(this).pa.t()[0]).css('background-color','#00a65a');
                                                                }
                                                                else{
                                                                        $($(this).parent()[0]).attr('style','');
                                                                        $($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
                                                                }}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>

                            </tr>
                            <tr>

                                <td class="bottom col-sm-1">Catatan</td>
                                <td colspan="4" class="bottom col-sm-1"><?= $form->field($modelTanah, 'remark')->textInput(['placeholder' => 'Catatan'])->label(false) ?></td>	


                            </tr>


                            <tr>
                                <td rowspan="5" class="left data col-sm-1"><strong>Status Lahan</strong></td>
                                <td class="col-sm-1">Hutan Konservasi</td>
                                <td colspan="4" class="col-sm-1"> <?= $form->field($modelLahan, 'hutan_kons')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>		
                                <td rowspan="5" class="right"><?php echo $modelLahan->status_lahan ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Hutan Lindung</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelLahan, 'hutan_lin')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Hutan Produksi</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelLahan, 'hutan_prod')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-2">Area Penggunaan Lain</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelLahan, 'area')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-2 bottom">Catatan</td>
                                <td colspan="4" class="col-sm-1 bottom"><?= $form->field($modelLahan, 'remark')->textInput(['placeholder' => 'Catatan'])->label(false) ?></td>	

                            </tr>

                            <tr>
                                <td rowspan="3" class="left data col-sm-1"><strong>Produksi</strong></td>
                                <td class="col-sm-1">Uap</td>
                                <td colspan="3" class="col-sm-1"><?= $form->field($modelProduksi, 'gas')->textInput(['maxlength' => true, 
                                                                                                                     'placeholder' => 'Produksi Uap',
                                                                                                                     'onchange' => ' 
                                                                                                                        var initialValue = $("#cumuap").html()*1;
                                                                                                                        var uapthismonth = $("#uapthismonth").html()*1;
                                                                                                                        var cumuap = (initialValue + (this.value*1)) - uapthismonth;
                                                                                                                        $("#cumuapval").html(cumuap);
                                                                                                                      ',
                                    ])->label(false) ?></td>		
                                
                                <td>Kumulatif <br> <span id="uapthismonth" style="display: none"> <?php echo $modelProduksi->gas ?></span><span id="cumuap" style="display: none"> <?php echo $modelProduksi->cumuap ?></span><span id="cumuapval"> <?php echo $modelProduksi->cumuap ?></span></td>
                                
                                <td rowspan="3" class="right"><?php echo $modelProduksi->status_produksi ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Listrik</td>
                                <td colspan="3" class="col-sm-1"><?= $form->field($modelProduksi, 'listrik')->textInput(['maxlength' => true, 'placeholder' => 'Dalam MegaWatt(MW)','onchange' => ' 
                                                                                                                        var initialValueListrik = $("#cumlistrik").html()*1;
                                                                                                                        var listrikthismonth = $("#listrikthismonth").html()*1;
                                                                                                                        var cumlistrik = (initialValueListrik + (this.value*1)) - listrikthismonth;
                                                                                                                        $("#cumlistrikval").html(cumlistrik);
                                                                                                                      ',
                                    ])->label(false) ?></td>			
                                <td>Kumulatif <br><span id="listrikthismonth" style="display: none"> <?php echo $modelProduksi->listrik ?></span><span id="cumlistrik" style="display: none"> <?php echo $modelProduksi->cumlistrik ?></span><span id="cumlistrikval"> <?php echo $modelProduksi->cumlistrik ?></span></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 bottom">Catatan</td>
                                <td colspan="4" class="col-sm-1 bottom"><?= $form->field($modelProduksi, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>	
                            </tr>


                            <tr>
                                <td rowspan="8" class="left data col-sm-1"><strong>Izin</strong></td>
                                <td class="col-sm-1">IUP/IPB</td>
                                <td class="col-sm-1">
                                    <?= $modelIzin["iup_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'iup_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'iup_awal',
                                        'attribute2' => 'iup_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                           
                                          ]
                                    ]);
                                    ?></td>
                                <td rowspan="8" class="right"><?php echo $modelIzin->status_izin ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3">Izin Jasa Lingkungan</td>
                                <td class="col-sm-1">
                                    <?= $modelIzin["ijl_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'ijl_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'ijl_awal',
                                        'attribute2' => 'ijl_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                         
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                            
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IPPKH</td>
                                
                                <td class="col-sm-1">
                                    <?= $modelIzin["ippkh_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'ippkh_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
                                                    if($(this)[0].files.length > 0){
                                                            $($(this).parent()[0]).css('background-color','#00a65a');
                                                    }
                                                    else{
                                                            $($(this).parent()[0]).attr('style','');
                                                            $($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
                                                    }}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'ippkh_awal',
                                        'attribute2' => 'ippkh_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMB</td>
                                <td class="col-sm-1">
                                    <?= $modelIzin["imb_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'imb_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'imb_awal',
                                        'attribute2' => 'imb_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">AMDAL</td>
                                <td class="col-sm-1">
                                    <?= $modelIzin["amdal_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'amdal_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'amdal_awal',
                                        'attribute2' => 'amdal_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMKA</td>
                                <td class="col-sm-1">
                                    <?= $modelIzin["imka_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'imka_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'imka_awal',
                                        'attribute2' => 'imka_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Simaksi</td>
                                <td class="col-sm-1">
                                    <?= $modelIzin["simaksi_file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                    <?=
                                    $form->field($modelIzin, 'simaksi_file')->widget(FileInput::classname(), [
                                        'pluginOptions' => [
                                            'showCaption' => false,
                                            'showRemove' => false,
                                            'showUpload' => false,
                                            'browseClass' => 'btn btn-primary btn-block',
                                            'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                            'browseLabel' => '',
                                            'showPreview' => false,
                                        ],
                                        'pluginEvents' => [
                                            "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                        ],
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>		
                                <td colspan="3" class="col-sm-1"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelIzin,
                                        'attribute' => 'simaksi_awal',
                                        'attribute2' => 'simaksi_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 bottom">Catatan</td>
                                <td colspan="4" class="col-sm-1 bottom"><?= $form->field($modelIzin, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>	
                            </tr>
                            <tr>
                                <td class="left data col-sm-1"><strong>Sosial</strong></td>
                                <td colspan="5" style="vertical-align:top;height:70px;" class="col-sm-1 bottom"> <?=
                                    $form->field($modelSosial, 'sosial_text')->textArea([ 'rows' => '2',
                                        'placeholder' => 'Data sosial'])->label("Permasalahan Sosial")
                                    ?>
                                   
                                    <?=  $form->field($modelSosial, 'remark')->textArea([ 'rows' => '2',
                                        'placeholder' => 'Catatan'])->label("Catatan")
                                    ?>
                                </td>
                                <td class="right"><?php echo $modelSosial->sosial_status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header with-border" style="text-align:center">
                        <h3 class="box-title">Resume Uraian Kegiatan</h3>
                    </div>
                    <div class="box-body">
                        <table class="table borderless">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th class="col-sm-1">Progress Kegiatan</th>
                                    <th class="col-sm-1"> Upload</th>
                                    <th class="col-sm-2"> Target</th>
                                    <th class="col-sm-2"> Capaian</th>
                                    <th class="col-sm-1"> Status</th>
                                    <th class="col-sm-3"> Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Penyelidikan Geosains</strong></td>
                                    <td><?= $modelPekGeosains["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>                                     
                                        <?=
                                        $form->field($modelPekGeosains, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?>

                                    </td>
                                    
                                    <td><?= $form->field($modelPekGeosains, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekGeosains, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekGeosains->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekGeosains, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Pemboran Sumur Eskplorasi</strong></td>
                                    <td class="col-sm-1">
                                        <?= $modelPekEksplorasi["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Pemboran Sumur Eksplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Pemboran Sumur Eksplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                        <?=
                                        $form->field($modelPekEksplorasi, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td ><?= $form->field($modelPekEksplorasi, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekEksplorasi, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekEksplorasi->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekEksplorasi, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Studi Kelayakan</strong></td>
                                    <td >
                                        <?= $modelPekKelayakan["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                        <?=
                                        $form->field($modelPekKelayakan, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekKelayakan, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekKelayakan, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekKelayakan->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekKelayakan, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>PPA</strong></td>
                                    <td>
                                        <?= $modelPekPpa["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'PPA/' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'PPA/' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                        <?=
                                        $form->field($modelPekPpa, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
                                                        if($(this)[0].files.length > 0){
                                                                $($(this).parent()[0]).css('background-color','#00a65a');
                                                        }
                                                        else{
                                                                $($(this).parent()[0]).attr('style','');
                                                                $($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
                                                        }}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekPpa, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekPpa, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekPpa->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekPpa, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Uji Sumur Eksplorasi</strong></td>
                                    <td class="col-sm-1">
                                        <?= $modelPekUjimonsumur["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?> 
                                        <?=
                                        $form->field($modelPekUjimonsumur, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekUjimonsumur, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekUjimonsumur, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekUjimonsumur->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekUjimonsumur, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Pemboran Sumur Eksploitasi</strong></td>
                                    <td >
                                        <?= $modelPekPengsumur["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Pengembangan Sumur Eksploitasi/' . $modelPekPengsumur["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Pengembangan Sumur Eksploitasi/' . $modelPekPengsumur["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekPengsumur, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekPengsumur, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekPengsumur, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekPengsumur->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekPengsumur, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Konstruksi Sipil</strong></td>
                                    <td class="col-sm-1">
                                        <?= $modelPekKonssipil["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekKonssipil, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td ><?= $form->field($modelPekKonssipil, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekKonssipil, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekKonssipil->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                     <td><?= $form->field($modelPekKonssipil, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Konstruksi Jalan</strong></td>
                                    <td>
                                        <?= $modelPekAccroad["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekAccroad, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekAccroad, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekAccroad, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekAccroad->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekAccroad, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Engineering</strong></td>
                                    <td>
                                        <?= $modelPekEngineering["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekEngineering, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td ><?= $form->field($modelPekEngineering, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekEngineering, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekEngineering->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekEngineering, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Procurement</strong></td>
                                    <td>
                                        <?= $modelPekProcurement["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekProcurement, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekProcurement, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekProcurement, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekProcurement->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekProcurement, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Construction</strong></td>
                                    <td>
                                        <?= $modelPekConstruction["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekConstruction, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekConstruction, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekConstruction, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekConstruction->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekConstruction, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Overall Progress EPC</strong></td>
                                    <td>
                                        <?= $modelPekOverallepc["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Overall Progress EPC/' . $modelPekOverallepc["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Overall Progress EPC/' . $modelPekOverallepc["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekOverallepc, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekOverallepc, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekOverallepc, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekOverallepc->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekOverallepc, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>Transmisi</strong></td>
                                    <td>
                                        <?= $modelPekTransmisi["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], $viewPdfOptions) : ""; ?>
                                        <?=
                                        $form->field($modelPekTransmisi, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekTransmisi, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekTransmisi, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekTransmisi->status ? "<i class='fa fa-cirkAccrcle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekTransmisi, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td ><strong>COD</strong></td>
                                    <td >
                                        <?= $modelPekCod["file"] ? Html::a("<i class='fa fa-download'></i>", ['download', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions).'|'.Html::a('<i class="fa fa-copy"></i>', ['view-pdf', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], $linkDownloadOptions): ""; ?>

                                        <?=
                                        $form->field($modelPekCod, 'file')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'showCaption' => false,
                                                'showRemove' => false,
                                                'showUpload' => false,
                                                'browseClass' => 'btn btn-primary btn-block',
                                                'browseIcon' => '<i class="fa fa-file-pdf-o"></i> ',
                                                'browseLabel' => '',
                                                'showPreview' => false,
                                            ],
                                            'pluginEvents' => [
                                                "change" => "function() { 
																					if($(this)[0].files.length > 0){
																						$($(this).parent()[0]).css('background-color','#00a65a');
																					}
																					else{
																						$($(this).parent()[0]).attr('style','');
																						$($(this).parent()[0]).attr('class','btn btn-primary btn-block btn-file');
																					}}"
                                            ],
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    
                                    <td><?= $form->field($modelPekCod, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                    <td><?= $form->field($modelPekCod, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td><?php echo $modelPekCod->status ? "<i class='fa fa-cirkAccrcle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                                    <td><?= $form->field($modelPekCod, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Catatan'])->label(false) ?></td>
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
        <div class="col-sm-6">

            <div class="box box-solid">

                <div class="box-body">
                    <table class="table borderless">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th colspan="4">Timeline Pengembangan</th>
                                <th rowspan="3" class="col-sm-1" >Status</th>

                            </tr>
                            <tr class="trhead">
                                <th rowspan="2" class="col-sm-4">Kegiatan </th>
                                <th rowspan="2" class="col-sm-2">Total Tahun</th>
                                <th colspan="2" class="col-sm-6">Bulan/Tahun</th>
                                
                            </tr>
                            <tr class="trhead">
                                <th>Mulai</th>
                                <th>Akhir</th>
                            </tr>
                        </thead>						
                        <tbody>
                            <tr>
                                <td ><strong>Pelelangan</strong></td>
                                <td><?= $form->field($modelWaktu, 'pelelangan_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'pelelangan_mulai',
                                        'attribute2' => 'pelelangan_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                                <td rowspan="5"><?php echo $modelWaktu->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?></td>
                            </tr>
                            <tr>
                                <td ><strong>Penerbitan IPB/IUP</strong></td>
                                <td><?= $form->field($modelWaktu, 'penerbitan_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'penerbitan_mulai',
                                        'attribute2' => 'penerbitan_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td ><strong>Eksplorasi</strong></td>
                                <td><?= $form->field($modelWaktu, 'eksplorasi_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'eksplorasi_mulai',
                                        'attribute2' => 'eksplorasi_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td ><strong>Eksploitasi</strong></td>
                                <td><?= $form->field($modelWaktu, 'eksploitasi_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'eksploitasi_mulai',
                                        'attribute2' => 'eksploitasi_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td ><strong>COD</strong></td>
                                <td><?= $form->field($modelWaktu, 'cod_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>
                                <td colspan="2"><?php
                                    echo DatePicker::widget([
                                        'model' => $modelWaktu,
                                        'attribute' => 'cod_mulai',
                                        'attribute2' => 'cod_akhir',
                                        'options' => ['placeholder' => 'Awal'],
                                        'options2' => ['placeholder' => 'Berakhir'],
                                        'type' => DatePicker::TYPE_RANGE,
                                        'form' => $form,
                                        'pluginOptions' => [
                                            'format' => 'dd-mm-yyyy',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td style="height:40px;"><strong>Catatan</strong></td>
                                <td colspan="3"><?= $form->field($modelWaktu, 'remark')->textArea([ 'rows' => '2','placeholder' => 'Catatan'])->label(false) ?> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>	

            <div class="box box-solid">
                <div style="text-align:center;" class="box-header with-border">
                    <h3 class="box-title">Kendala</h3>
                </div>
                <div style="height:250px;" class="box-body">
                    <div style="padding-bottom:45px">
                        <?= $form->field($modelKendala, 'kendala')->textArea(['maxlength' => true, 'placeholder' => 'Kendala', 'rows' => 4])->label(false) ?>
                    </div>
                    <div>
                        <?= $form->field($modelKendala, 'remark')->textArea(['maxlength' => true, 'placeholder' => 'Catatan', 'rows' => 4])->label("Catatan") ?>
                     </div>
                </div>
                        
            </div>

        </div>
        <div class="col-sm-6">

            <div class="row">
                <div class="box box-solid">
                    <div class="box-body">
                        <table class="table borderless">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th>Peta Lokasi WKP</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>								
                            <tbody>
                                <tr>
                                    <td rowspan="2" class="col-sm-1 foto"><?=
                                        $form->field($modelFoto, 'peta')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'uploadUrl' => Url::to(['uploadfoto']),
                                                'id' => 'peta',
                                                'maxFileCount' => 1,
                                                'resizeImage' => true,
                                                'resizePreference' => 'width',
                                                'maxFileSize' => 1500,
                                                'showClose' => false,
                                                'uploadExtraData' => new \yii\web\JsExpression("function (previewId, index) {
																					return {
																					id_wkp: $('#wkpfield').val(),
																					no_unit: $('#unitfield').val(),
																					id_pltp : $('#pltpfield').val(),
																					id_unit : $('#idunitfield').val(),
																					peta : 1																					
																					};
																					}"),
                                                'showCaption' => false,
                                                'showUpload' => false,
                                                'showRemove' => false,
                                                'showBrowse' => false,
                                                'browseOnZoneClick' => true,
                                                'browseLabel' => '',
                                                'removeLabel' => '',
                                                'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i>',
                                                'removeIcon' => '',
                                                'removeTitle' => 'Cancel or reset changes',
                                                'elErrorContainer' => '#kv-avatar-errors-1',
                                                'msgErrorClass' => 'alert alert-block alert-danger',
                                                'defaultPreviewContent' => ($modelFoto->peta) ? Html::img(Url::base().'/uploads/'. $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Peta/' . $modelFoto->peta, ['width' => 70, 'style' => 'margin-top:125px; margin-bottom:125px']) : "<i class='fa fa-file-image-o fa-5x' style='margin-top:120px; margin-bottom:120px'> </i>",
                                                'allowedFileExtensions' => ["jpg", "png", "gif"],
                                                'previewSettings' => [
                                                    'image' => ['width' => '50%', 'height' => '50%']
                                                ]
                                            ],
                                            'options' => ['accept' => 'image/*', 'multiple' => false, 'id' => 'petaUpload', 'enctype' => 'multipart/form-data'],
                                        ])->label(false);
                                        ?> </td>
                                    <td class="col-sm-1 foto"><?=
                                        $form->field($modelFoto, 'name')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'uploadUrl' => Url::to(['uploadfoto']),
                                                'maxFileCount' => 1,
                                                'maxFileSize' => 1500,
                                                'uploadExtraData' => new \yii\web\JsExpression("function (previewId, index) {
																					return {
																					id_wkp: $('#wkpfield').val(),
																					no_unit: $('#unitfield').val(),
																					id_pltp : $('#pltpfield').val(),
																					id_unit : $('#idunitfield').val(),
																					peta : 0
																					};
																					}"),
                                                'showClose' => false,
                                                'showCaption' => false,
                                                'showUpload' => false,
                                                'showRemove' => false,
                                                'showBrowse' => false,
                                                'browseOnZoneClick' => true,
                                                'browseLabel' => '',
                                                'removeLabel' => '',
                                                'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i>',
                                                'removeIcon' => '',
                                                'removeTitle' => 'Cancel or reset changes',
                                                'elErrorContainer' => '#kv-avatar-errors-2',
                                                'msgErrorClass' => 'alert alert-block alert-danger',
                                                'defaultPreviewContent' => ($modelFoto->name) ? Html::img(Url::base().'/uploads/'. $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name, ['width' => 70, 'style' => 'margin-top:25px;margin-bottom:25px;']) : "<i class='fa fa-file-image-o fa-5x' style='margin-top:25px;margin-bottom:25px'> </i>",
                                                'allowedFileExtensions' => ["jpg", "png", "gif"],
                                                'previewSettings' => [
                                                    'image' => ['width' => '50%', 'height' => '50%']
                                                ]
                                            ],
                                            'options' => ['accept' => 'image/*', 'multiple' => false, 'width' => 50],
                                        ])->label(false);
                                        ?> </td>
                                </tr>
                                <tr>

                                    <td class="col-sm-1 foto"> 
                                        <?=
                                        $form->field($modelFoto, 'name2')->widget(FileInput::classname(), [
                                            'id' => 'foto2',
                                            'pluginOptions' => [
                                                'uploadUrl' => Url::to(['uploadfoto']),
                                                'maxFileCount' => 1,
                                                'maxFileSize' => 1500,
                                                'uploadExtraData' => new \yii\web\JsExpression("function (previewId, index) {
																					return {
																					id_wkp: $('#wkpfield').val(),
																					no_unit: $('#unitfield').val(),
																					id_pltp : $('#pltpfield').val(),
																					id_unit : $('#idunitfield').val(),
																					peta : 0
																					};
																					}"),
                                                'showClose' => false,
                                                'showCaption' => false,
                                                'showUpload' => false,
                                                'showRemove' => false,
                                                'showBrowse' => false,
                                                'browseOnZoneClick' => true,
                                                'browseLabel' => '',
                                                'removeLabel' => '',
                                                'browseIcon' => '<i class="glyphicon glyphicon-folder-open"></i>',
                                                'removeIcon' => '',
                                                'removeTitle' => 'Cancel or reset changes',
                                                'elErrorContainer' => '#kv-avatar-errors-2',
                                                'msgErrorClass' => 'alert alert-block alert-danger',
                                                'defaultPreviewContent' => ($modelFoto->name2) ? Html::img(Url::base().'/uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name2, ['width' => 70, 'style' => 'margin-top:25px;margin-bottom:25px;']) : "<i class='fa fa-file-image-o fa-5x' style='margin-top:25px;margin-bottom:25px'> </i>",
                                                'allowedFileExtensions' => ["jpg", "png", "gif"],
                                                'previewSettings' => [
                                                    'image' => ['width' => '50%', 'height' => '50%']
                                                ]
                                            ],
                                            'options' => ['accept' => 'image/*', 'multiple' => false, 'width' => 50],
                                        ])->label(false);
                                        ?> </td>

                                </tr>
                                <tr>
                                    <td class="data">
                                    Status
                                    </td>
                                    <td>
                                    <?php echo $modelFoto->status ? "<i class='fa fa-circle text-success'></i>" : "<i class='fa fa-circle text-danger'></i>"; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="data">
                                    Catatan
                                    </td>
                                    <td>
                                    <?=  $form->field($modelFoto, 'remark')->textArea([ 'rows' => '1','placeholder' => 'Catatan'])->label(false); ?>
                                    </td>
                                    
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>			
            </div>

        </div>

    </div>


    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-1 pull-right">
            <?= Html::submitButton($modelUnit->isNewRecord ? 'Create' : 'Update', ['class' => $modelUnit->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
    <?= $form->errorSummary($modelTanah); ?>
	<?= $form->field($modelUnit, 'id_unit')->hiddenInput(['value'=>$id_unit,'id'=>'idunitfield'])->label("") ?>
    <?= $form->field($modelPengembang, 'id_pengembang')->hiddenInput(['value'=>$id_pengembang,'id'=>'idpengembang'])->label("") ?>
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
</div>

<script type="text/javascript">
    $(document).ready(function () {


        $('form#unit-form-id').on('beforeSubmit', function (e)
        {
            $(".loading").show();
            var form = $(this);
            var formData = new FormData();


            $.each($('form#unit-form-id :file'), function (i, file) {
                formData.append(file.name, file.files[0])
            });
            $.each($('form#unit-form-id :input:not(:file)'), function (i, elm) {
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
                    window.location.replace("index.php?r=unit/index");
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
