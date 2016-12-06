<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Input Data', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use lo\modules\noty\Wrapper;
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
</style>
<script src="//code.jquery.com/jquery-2.2.4.js"></script>

<div class="unit-form">

    <?php
    $form = ActiveForm::begin(['layout' => 'horizontal',
                'id' => 'unit-form-id',
                'action' => Url::toRoute('unit/create'),
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
        <div class="col-sm-7">

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
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Lapangan PLTP</strong></td>
                                <td class="col-sm-1"><?=
                                            $form->field($modelUnit, 'id_pltp')
                                            ->dropDownList(
                                                    [], ['prompt' => 'Pilih PLTP..',
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
                                <td rowspan="2" class="col-sm-1 header-isi"><?= $form->field($modelUnit, 'potensi')->textInput(['placeholder' => 'Potensi'])->label(false) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>No Unit</strong></td>
                                <td class="col-sm-1"> <?=
                                            $form->field($modelUnit, 'no_unit')
                                            ->dropDownList(
                                                    [], ['prompt' => 'Pilih Unit..',
                                                'id' => 'unitdropdown',
                                                'disabled' => 'disabled',
                                                'onchange' => '
														
														if($(this).val() != ""){
															
															$.get(
																	"' . Url::toRoute('count-this-month-data') . '", 
																	{no_unit: $(this).val(),
																	 id_pltp : $("#pltpdropdown").val()
																	}, 
																	function(response){
																		if(response == 0){
																		  $("#unit-form-id :input:not(#wkpdropdown):not(#pltpdropdown)").prop("disabled", false);
																		}
																		
																	}
																);
															
														}else{
															$("#unit-form-id :input:not(#wkpdropdown):not(#pltpdropdown):not(#unitdropdown)").prop("disabled", true);
														}
														
													
												 
												 '
                                            ])
                                            ->label(false);
                                    ?>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Perkiraan Investasi Rp.</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnit, 'investasi')->textInput(['placeholder' => 'No Unit'])->label(false) ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Propinsi</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnit, 'prov')->textInput(['placeholder' => 'Propinsi'])->label(false) ?></td>
                                <td rowspan="2" class="col-sm-1 header">Renc. Pembangunan (MW)</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Kab/Kot</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelUnit, 'kabkot')->textInput(['placeholder' => 'Kabupaten/Kota'])->label(false) ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>SK WKP</strong></td>
                                <td class="col-sm-1"><?= $form->field($modelWkp, 'skwkp')->textInput(['placeholder' => 'SK WKP'])->label(false) ?></td>
                                <td class="col-sm-1"><?= $form->field($modelUnit, 'rencana')->textInput(['placeholder' => 'Rencana'])->label(false) ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Tahap Pengembangan</strong></td>
                                <td class="col-sm-1"><?=
                                    $form->field($modelUnit, 'tahap')->dropDownList(
                                            ["Lelang" => "Lelang",
                                        "Eksplorasi" => "Eksplorasi",
                                        "Eksploitasi" => "Eksploitasi",
                                        "Pemanfaatan" => "Pemanfaatan"], ['prompt' => 'Pilih Tahapan..'
                                            ]
                                    )->label(false)
                                    ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Pengembang</h3>
                    </div>
                    <div class="box-body">
                        <table class="table borderless">
                            <tbody>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Nama Pemegang Izin</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'izin')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pemegang Izin'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Nama Pengembang</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'nama')->textInput(['maxlength' => true, 'placeholder' => 'Nama Pengembang'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Alamat</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'Alamat'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Direktur Utama</strong></td>
                                    <td class="col-sm-1"><?= $form->field($modelPengembang, 'dirut')->textInput(['maxlength' => true, 'placeholder' => 'Direktur Utama'])->label(false) ?></td>
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
                    <table class="table table-small">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th>Data</th>
                                <th colspan="5"> Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td rowspan="3" class="data col-sm-2"><strong>Tanah</strong></td>
                                <td class="col-sm-1">Luas Lahan</td>
                                <td colspan="4" class="col-sm-1"> <?= $form->field($modelTanah, 'luas_lahan')->textInput(['placeholder' => 'Luas Lahan'])->label(false) ?></td>		

                            </tr>
                            <tr>

                                <td class="col-sm-1">Status</td>
                                <td colspan="3" class="col-sm-1"><?= $form->field($modelTanah, 'status_tanah')->textInput(['placeholder' => 'Status'])->label(false) ?></td>	
                                <td class="col-sm-1"><?= $form->field($modelTanah, 'status_tahun')->textInput(['placeholder' => 'Tahun'])->label(false) ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Legalitas No Akte</td>
                                <td colspan="3" class="col-sm-1"><?= $form->field($modelTanah, 'legalitas')->textInput(['maxlength' => true, 'placeholder' => 'Legalitas'])->label(false); ?></td>	

                                <td class="col-sm-1"><?=
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
                                        'options' => ['accept' => 'application/pdf'],
                                    ])->label(false);
                                    ?> </td>

                            </tr>

                            <tr>
                                <td rowspan="4" class="data col-sm-1"><strong>Status Lahan</strong></td>
                                <td class="col-sm-1">Hutan Konservasi</td>
                                <td colspan="4" class="col-sm-1"> <?= $form->field($modelLahan, 'hutan_kons')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>		

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
                                <td class="col-sm-2">Area Penggunaan Lahan</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelLahan, 'area')->textInput(['placeholder' => 'Dalam hektar'])->label(false) ?></td>	

                            </tr>

                            <tr>
                                <td rowspan="2" class="data col-sm-1"><strong>Produksi</strong></td>
                                <td class="col-sm-1">Gas</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelProduksi, 'gas')->textInput(['maxlength' => true, 'placeholder' => 'Produksi Gas'])->label(false) ?></td>		

                            </tr>
                            <tr>

                                <td class="col-sm-1">Listrik</td>
                                <td colspan="4" class="col-sm-1"><?= $form->field($modelProduksi, 'listrik')->textInput(['maxlength' => true, 'placeholder' => 'Dalam MegaWatt(MW)'])->label(false) ?></td>	

                            </tr>


                            <tr>
                                <td rowspan="7" class="data col-sm-1"><strong>Izin</strong></td>
                                <td class="col-sm-1">IUP/IPB</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-3">Izin Jasa Lingkungan</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IPPKH</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMB</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Amdal</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMKA</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Simaksi</td>
                                <td class="col-sm-1"><?=
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
                                            'format' => 'yyyy-mm-dd',
                                            'autoclose' => true,
                                        ]
                                    ]);
                                    ?></td>
                            </tr>
                            <tr>
                                <td class="data col-sm-1"><strong>Sosial</strong></td>
                                <td colspan="6" style="vertical-align:top;height:150px;" class="col-sm-1"> <?= $form->field($modelSosial, 'sosial_text')->textArea([ 'rows' => '6',
                                        'placeholder' => 'Data sosial'])->label(false)
                                    ?></td>
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
                        <h3 class="box-title">Resume Uraian Pekerjaan</h3>
                    </div>
                    <div class="box-body">
                        <table class="table borderless">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th>Progress Terlaksana</th>
                                    <th> Upload</th>
                                    <th> Capaian</th>
                                    <th> Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-2 right"><strong>Penyelidikan Geosains</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekGeosains, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekGeosains, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pembangunan Sumur Eskplorasi</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekEksplorasi, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekEksplorasi, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Studi Kelayakan</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekKelayakan, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekKelayakan, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>PPA</strong></td>
                                    <td class="col-sm-1"><?=
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
                                    <td class="col-sm-1"><?= $form->field($modelPekPpa, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekPpa, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Uji Monitoring Sumur</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekUjimonsumur, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekUjimonsumur, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>

                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pengembangan Sumur Eksploitasi</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekPengsumur, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekPengsumur, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Konstruksi Sipil</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekKonssipil, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekKonssipil, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Access Road</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekAccroad, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekAccroad, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Engineering</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekEngineering, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekEngineering, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Procurement</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekProcurement, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekProcurement, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Construction</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekConstruction, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekConstruction, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Overall Progress EPC</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekOverallepc, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekOverallepc, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Transmisi</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekTransmisi, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekTransmisi, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>COD</strong></td>
                                    <td class="col-sm-1"><?=
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
                                            'options' => ['accept' => 'application/pdf'],
                                        ])->label(false);
                                        ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekCod, 'capaian')->textInput(['maxlength' => true, 'placeholder' => 'Capaian'])->label(false) ?></td>
                                    <td class="col-sm-1"><?= $form->field($modelPekCod, 'target')->textInput(['maxlength' => true, 'placeholder' => 'Target'])->label(false) ?></td>
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
                    <table class="table borderless">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th colspan="4">Waktu Pengembangan</th>

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

            <div class="box box-solid">
                <div style="text-align:center;" class="box-header with-border">
                    <h3 class="box-title">Kendala</h3>
                </div>
                <div style="height:150px;" class="box-body">
                                        <?= $form->field($modelKendala, 'kendala')->textArea(['maxlength' => true, 'placeholder' => 'Kendala', 'rows' => 4])->label(false) ?>
                </div>
            </div>

        </div>
        <div class="col-sm-5">

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
                                        $form->field($modelWkp, 'peta')->widget(FileInput::classname(), [
                                            'pluginOptions' => [
                                                'uploadUrl' => Url::to(['uploadfoto']),
                                                'maxFileCount' => 1,
                                                'resizeImage' => true,
                                                'resizePreference' => 'width',
                                                'maxFileSize' => 1500,
                                                'showClose' => false,
                                                'uploadExtraData' => new \yii\web\JsExpression("function (previewId, index) {
																					return {
																					id_wkp: $('#wkpdropdown').val(),
																					id_unit: 1,
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
                                                'allowedFileExtensions' => ["jpg", "png", "gif"],
                                                'previewSettings' => [
                                                    'image' => ['width' => '50%', 'height' => '50%']
                                                ]
                                            ],
                                            'options' => ['accept' => 'image/*', 'multiple' => false, 'id' => 'fotoUpload'],
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
																					id_wkp: $('#wkpdropdown').val(),
																					id_unit: 1,
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
                                                'defaultPreviewContent' => '<img src="image/map.png" alt="Your Avatar" style="width:70px">',
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
																					id_wkp: $('#wkpdropdown').val(),
																					id_unit: 1,
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
        'defaultPreviewContent' => '<img src="image/map.png" alt="Foto" style="width:70px">',
        'allowedFileExtensions' => ["jpg", "png", "gif"],
        'previewSettings' => [
            'image' => ['width' => '50%', 'height' => '50%']
        ]
    ],
    'options' => ['accept' => 'image/*', 'multiple' => false, 'width' => 50],
])->label(false);
?> </td>

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
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#unit-form-id :input:not(#wkpdropdown)").prop("disabled", true);

        $('form#unit-form-id').on('beforeSubmit', function (e)
        {

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
                    console.log(response);
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
