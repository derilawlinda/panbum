<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>
<link rel="stylesheet" type="text/css" href="css/kv-mpdf-bootstrap.min.css">
<style>




</style>

<div class="unit-form">
    <div class="row">
        <div class="col-xs-6">

            <div class="box box-solid" style="padding:3px">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-sm-1 right"><strong>Nama Wkp</strong></td>
                                <td class="col-sm-3 nopadding"><?php echo $modelWkp->nama ?>
                                </td>
                                <td class="col-sm-1 header">Potensi(MW)</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Lapangan PLTP</strong></td>
                                <td class="col-sm-1"><?php echo $modelPltp->nama_pltp ?></td>
                                <td rowspan="2" class="col-sm-1 header-isi"><?php echo $modelUnit->potensi ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>No Unit</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnit->no_unit ?>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Perkiraan Investasi Rp.</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnit->investasi ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Propinsi</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnit->prov ?></td>
                                <td rowspan="2" class="col-sm-1 header">Renc. Pembangunan (MW)</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Kab/Kot</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnit->kabkot ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>SK WKP</strong></td>
                                <td class="col-sm-1"><?php echo $modelWkp->skwkp ?></td>
                                <td class="col-sm-1"><?php echo $modelUnit->rencana ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Tahap Pengembangan</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnit->tahap ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="box box-solid" style="padding:3px">
                    <div class="box-header with-border" style="text-align:center">
                        <span class="box-title" style="font-size: 8px;"><strong>Informasi Pengembang</strong></span>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">

            <div class="box box-solid" style="padding:3px">
                <div class="box-body">
                    <table class="table table-bordered table-small">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th>Data</th>
                                <th colspan="5"> Penjelasan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td rowspan="4" class="data col-sm-2"><strong>Tanah</strong></td>
                                <td class="col-sm-1">Luas Lahan</td>
                                <td colspan="4" class="col-sm-1"> <?php echo $modelTanah->luas_lahan ?></td>		

                            </tr>
                            <tr>

                                <td class="col-sm-1">Status</td>
                                <td colspan="3" class="col-sm-1"><?php echo $modelTanah->status_tanah ?></td>	
                                <td class="col-sm-1"><?php echo $modelTanah->status_tahun ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Legalitas No Akte</td>
                                <td colspan="3" class="col-sm-1"><?php echo $modelTanah->legalitas ?></td>	

                                <td class="col-sm-1">
                                    <?php $modelTanah["file"] ? Html::a("Download", ['download', 'file_name' => 'Akta Tanah/' . $modelTanah["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
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
                                <td class="col-sm-2">Area Penggunaan Lahan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelLahan->area ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-2">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelLahan->remark ?></td>	

                            </tr>

                            <tr>
                                <td rowspan="3" class="data col-sm-1"><strong>Produksi</strong></td>
                                <td class="col-sm-1">Uap</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelProduksi->gas ?></td>		

                            </tr>
                            <tr>

                                <td class="col-sm-1">Listrik</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelProduksi->listrik . "MW" ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelProduksi->remark ?></td>	
                            </tr>


                            <tr>
                                <td rowspan="8" class="data col-sm-1"><strong>Izin</strong></td>
                                <td class="col-sm-1">IUP/IPB</td>
                                <td class="col-sm-1">
                                    <?php $modelIzin["iup_file"] ? Html::a("Download", ['Download', 'file_name' => 'Izin/' . $modelIzin["iup_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->iup_awal . ' s/d ' . $modelIzin->iup_akhir ?></td>

                            </tr>
                            <tr>
                                <td class="col-sm-3">Izin Jasa Lingkungan</td>
                                <td class="col-sm-1">
                                    <?php $modelIzin["ijl_file"] ? Html::a("Download", ['download', 'file_name' => 'Izin/' . $modelIzin["ijl_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->ijl_awal . ' s/d ' . $modelIzin->ijl_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IPPKH</td>

                                <td class="col-sm-1">
                                    <?php $modelIzin["ippkh_file"] ? Html::a("Download", ['download', 'file_name' => 'Izin/' . $modelIzin["ippkh_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->ippkh_awal . ' s/d ' . $modelIzin->ippkh_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMB</td>
                                <td class="col-sm-1">
                                    <?php $modelIzin["imb_file"] ? Html::a("Download", ['download', 'file_name' => 'Izin/' . $modelIzin["imb_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->imb_awal . ' s/d ' . $modelIzin->imb_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Amdal</td>
                                <td class="col-sm-1">
                                    <?php $modelIzin["amdal_file"] ? Html::a("Download", ['download', 'file_name' => 'Izin/' . $modelIzin["amdal_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>

                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->amdal_awal . ' s/d ' . $modelIzin->amdal_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMKA</td>
                                <td class="col-sm-1">
                                    <?php $modelIzin["imka_file"] ? Html::a("Download", ['download', 'file_name' => 'Izin/' . $modelIzin["imka_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->imka_awal . ' s/d ' . $modelIzin->imka_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Simaksi</td>
                                <td class="col-sm-1">
                                    <?php $modelIzin["simaksi_file"] ? Html::a("Download", ['download', 'file_name' => 'Izin/' . $modelIzin["simaksi_file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?>
                                </td>		
                                <td colspan="3" class="col-sm-1"><?php echo $modelIzin->simaksi_awal . ' s/d ' . $modelIzin->simaksi_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->remark ?></td>	
                            </tr>
                            <tr>
                                <td class="data col-sm-1"><strong>Sosial</strong></td>
                                <td colspan="5" style="vertical-align:top;height:20px;" class="col-sm-1"> <?php echo $modelSosial->sosial_text ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box box-solid" style="padding:3px">
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
                                <td rowspan="2" class="col-sm-1 foto" style="text-align: center; vertical-align: middle;"><?php echo Html::img('../../uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Peta/' . $modelFoto->peta, ['height' => 175]) ?></td>
                                <td class="col-sm-1 foto"><?php echo!empty($modelFoto->name) ? Html::img('../../uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name, ['height' => 50]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1 foto"> 
                                    <?php echo!empty($modelFoto->name2) ? Html::img('../../uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name2, ['height' => 50]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>	
        </div>

        <div class="col-sm-5">
            <div class="row">
                <div class="box box-solid" style="padding:3px">
                    <div class="box-header with-border" style="text-align:center">
                        <span class="box-title" style="font-size: 8px;"><strong>Resume Uraian Pekerjaan</strong></span>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-small">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th>Progress Terlaksana</th>
                                    <th> Upload</th>
                                    <th> Target</th>
                                    <th> Capaian</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-sm-2 right"><strong>Penyelidikan Geosains</strong></td>
                                    <td class="col-sm-1"><?php $modelPekGeosains["file"] ? Html::a("Download", ['download', 'file_name' => 'Penyelidikan Geosains/' . $modelPekGeosains["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekGeosains->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekGeosains->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pembangunan Sumur Eskplorasi</strong></td>
                                    <td class="col-sm-1"><?php $modelPekEksplorasi["file"] ? Html::a("Download", ['download', 'file_name' => 'Pembangunan Sumur Eskplorasi/' . $modelPekEksplorasi["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekEksplorasi->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekEksplorasi->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Studi Kelayakan</strong></td>
                                    <td class="col-sm-1"><?php $modelPekKelayakan["file"] ? Html::a("Download", ['download', 'file_name' => 'Studi Kelayakan/' . $modelPekKelayakan["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekKelayakan->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekKelayakan->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>PPA</strong></td>
                                    <td class="col-sm-1"><?php $modelPekPpa["file"] ? Html::a("Download", ['download', 'file_name' => 'PPA   /' . $modelPekPpa["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekPpa->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekPpa->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Uji Monitoring Sumur</strong></td>
                                    <td class="col-sm-1"><?php $modelPekUjimonsumur["file"] ? Html::a("Download", ['download', 'file_name' => 'Uji Monitoring Sumur/' . $modelPekUjimonsumur["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekUjimonsumur->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekUjimonsumur->capaian ?></td>

                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pengembangan Sumur Eksploitasi</strong></td>
                                    <td class="col-sm-1"><?php $modelPekPengsumur["file"] ? Html::a("Download", ['download', 'file_name' => 'Pengembangan Sumur Eksploitasi/' . $modelPekPengsumur["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekPengsumur->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekPengsumur->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Konstruksi Sipil</strong></td>
                                    <td class="col-sm-1"><?php $modelPekKonssipil["file"] ? Html::a("Download", ['download', 'file_name' => 'Konstruksi Sipil/' . $modelPekKonssipil["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekKonssipil->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekKonssipil->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Access Road</strong></td>
                                    <td class="col-sm-1"><?php $modelPekAccroad["file"] ? Html::a("Download", ['download', 'file_name' => 'Access Road/' . $modelPekAccroad["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekAccroad->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekAccroad->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Engineering</strong></td>
                                    <td class="col-sm-1"><?php $modelPekEngineering["file"] ? Html::a("Download", ['download', 'file_name' => 'Engineering/' . $modelPekEngineering["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekEngineering->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekEngineering->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Procurement</strong></td>
                                    <td class="col-sm-1"><?php $modelPekProcurement["file"] ? Html::a("Download", ['download', 'file_name' => 'Procurement/' . $modelPekProcurement["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekProcurement->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekProcurement->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Construction</strong></td>
                                    <td class="col-sm-1"><?php $modelPekConstruction["file"] ? Html::a("Download", ['download', 'file_name' => 'Construction/' . $modelPekConstruction["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekConstruction->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekConstruction->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Overall Progress EPC</strong></td>
                                    <td class="col-sm-1"><?php $modelPekOverallepc["file"] ? Html::a("Download", ['download', 'file_name' => 'Overall Progress EPC/' . $modelPekOverallepc["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekOverallepc->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekOverallepc->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Transmisi</strong></td>
                                    <td class="col-sm-1"><?php $modelPekTransmisi["file"] ? Html::a("Download", ['download', 'file_name' => 'Transmisi/' . $modelPekTransmisi["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekTransmisi->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekTransmisi->capaian ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>COD</strong></td>
                                    <td class="col-sm-1"><?php $modelPekCod["file"] ? Html::a("Download", ['download', 'file_name' => 'COD/' . $modelPekCod["file"], 'id_unit' => $modelUnit->id_unit], ['target' => '#']) : ""; ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekCod->target ?></td>
                                    <td class="col-sm-1"><?php echo $modelPekCod->capaian ?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- box -->
                </div>
                <div class="box box-solid" style="padding:3px">

                    <div class="box-body">
                        <table class="table table-bordered table-small">
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
                                    <td class="col-sm-1"><?php echo $modelWaktu->pelelangan_tahun ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->pelelangan_mulai ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->pelelangan_akhir ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Penerbitan IPB/IUP</strong></td>
                                    <td class="col-sm-1"><?php echo $modelWaktu->penerbitan_tahun ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->penerbitan_mulai ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->penerbitan_akhir ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Eksplorasi</strong></td>
                                    <td class="col-sm-1"><?php echo $modelWaktu->eksplorasi_tahun ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->eksplorasi_mulai ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->eksplorasi_akhir ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Eksploitasi</strong></td>
                                    <td class="col-sm-1"><?php echo $modelWaktu->eksploitasi_tahun ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->eksploitasi_mulai ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->eksploitasi_akhir ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>COD</strong></td>
                                    <td class="col-sm-1"><?php echo $modelWaktu->cod_tahun ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->cod_mulai ?></td>
                                    <td class="col-sm-4"><?php $modelWaktu->cod_akhir ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-solid " style="border: 1px solid #ddd;padding:2px;">
                    <div style="text-align:center;" class="box-header with-border">
                        <span class="box-title" style="font-size: 8px;"><strong>Kendala</strong></span>
                    </div>
                    <div style="height:175px;" class="box-body">
                        <?php $modelKendala->kendala ?>
                    </div>
                </div>

                <!--row-->
            </div>

            <!--sm5-->
        </div>
        <!-- 2nd row -->

    </div>

    <div class="row">
        <div class="col-xs-6">





        </div>
        <div class="col-sm-5">

            <div class="row">

            </div>

        </div>

    </div>





</div>

