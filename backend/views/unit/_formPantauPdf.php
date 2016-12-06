<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="unit-form">
    <div class="row">
        <div class="col-xs-6">

            <div class="box box-solid" style="padding:3px">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="col-sm-2"><strong>Nama WKP</strong></td>
                                <td class="col-sm-4 nopadding"><?php echo $modelWkp->nama ?>
                                </td>
                                <td class="header" style="background: gainsboro;">Potensi(MW)</td>
                                <td class="centered" style="background:gainsboro;">Harga</td>
                                
                            </tr>
                            <tr>
                                <td class="col-sm-1"><strong>PLTP</strong></td>
                                <td class="col-sm-1"><?php echo $modelPltp->nama_pltp ?></td>
                                <td rowspan="2" class="col-sm-1 header-isi centered"><?php echo $modelUnitDetail->potensi ?></td>
                                <td rowspan="2" class="centered"><?php echo $modelUnitDetail->harga; ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Unit</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->no_unit ?>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Rencana investasi (USD)</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->investasi ?></td>
                                <td rowspan="2" class="col-sm-1 header" style="background: gainsboro;">Renc. Pembangunan (MW)</td>
                                <td rowspan="2" class="col-sm-2 header" style="background: gainsboro;">Status dan Catatan</td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 right"><strong>Provinsi</strong></td>
                                <td class="col-sm-1"><?php echo $modelUnitDetail->prov ?></td>
                                
                                
                            </tr>
                            <tr>
                                <td><strong>Kab/Kota</strong></td>
                                <td><?php echo $modelUnitDetail->kabkot ?></td>
                                <td class="centered" ><?php echo $modelUnitDetail->rencana ?></td>
                                <td rowspan="4" style="text-align:center;vertical-align: middle;" >
                                    <?php echo $modelUnitDetail->attr_status ? "<span class='text-success' >●</span>" : "<div class='img-circle text-danger'>●</div>"; ?>
                                    <br> 
                                    
                                        <?php echo "Catatan : " . $modelUnitDetail->remark ?>
                                   
                                    
                                </td>
                                

                            </tr>
                            <tr>
                                <td><strong>SK WKP</strong></td>
                                <td><?php echo $modelWkp->skwkp ?></td>
                                <td rowspan="2" style="background: gainsboro;text-align: center"><strong>Kapasitas Terpasang (MW)</strong></td>
                                

                            </tr>
                            <tr>
                                <td><strong>Luas WKP</strong></td>
                                <td><?php echo $modelWkp->luas ?></td>

                            </tr>
                            <tr>
                                <td><strong>Tahap Pengembangan</strong></td>
                                <td><?php echo $modelUnitDetail->tahap ?></td>
                                <td style="text-align: center;"><?php echo $modelUnitDetail->kap_terpasang ?></td>
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
                                    <td class="col-sm-2" style="padding-bottom: 10px;"><?php echo $modelPengembang->alamat ?></td>
                                </tr>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pemegang Saham</strong></td>
                                    <td class="col-sm-1"><?php echo $modelUnitDetail->saham ?></td>
                                </tr>
                                <tr>
                                    <td style="background: gainsboro;"><strong>Status</strong></td>
                                    <td style="background: gainsboro;"><strong>Catatan</strong></td>
                                    
                                </tr>
                                <tr>
                                    <td class="centered" ><?php echo $modelPengembang->status ? "<span class='text-success' >●</span>" : "<div class='img-circle text-danger'>●</div>"; ?></td>
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
        <div class="col-xs-6">

            <div class="box box-solid" style="padding:3px">
                <div class="box-body">
                    <table class="table table-bordered table-small">
                        <thead class="thead">
                            <tr class="trhead" >
                                <th style="background:gainsboro;"><strong>Data</strong></th>
                                <th colspan="5" style="background:gainsboro;"><strong>Penjelasan</strong></th>
                                <th style="background:gainsboro;">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td rowspan="4" class="data col-sm-2"><strong>Tanah</strong></td>
                                <td class="col-sm-1">Luas Lahan</td>
                                <td colspan="4" class="col-sm-1"> <?php echo $modelTanah->luas_lahan ?></td>		
                                <td rowspan="4" class="centered"><?php echo $modelTanah->status ? "<span class='text-success' >●</span>" : "<div class='img-circle text-danger'>●</div>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Status</td>
                                <td colspan="3" class="col-sm-1"><?php echo $modelTanah->status_tanah ?></td>	
                                <td class="col-sm-1"><?php echo $modelTanah->status_tahun ?></td>	

                            </tr>
                            <tr>
                                <td class="col-sm-1">Legalitas No Akte</td>
                                <td colspan="3" class="col-sm-1"><?php echo $modelTanah->legalitas ?></td>	

                                

                            </tr>
                            <tr>

                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelTanah->remark ?></td>	


                            </tr>


                            <tr>
                                <td rowspan="5" class="data col-sm-1"><strong>Status Lahan</strong></td>
                                <td class="col-sm-1">Hutan Konservasi</td>
                                <td colspan="4" class="col-sm-1"> <?php echo $modelLahan->hutan_kons ?></td>		
                                <td rowspan="5" class="centered"><?php echo $modelLahan->status_lahan ? "<span class='text-success' >●</span>" : "<div class='img-circle text-danger'>●</div>"; ?></td>
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
                                <td colspan="2" class="col-sm-1"><?php echo $modelProduksi->gas ?></td>		
                                <td colspan="2" class="col-sm-1"><span>Kumulatif <?php echo date('Y'); ?>: </span><?php echo $modelProduksi->cumuap ?> Megaton</td>	
                                <td rowspan="3" class="right centered"><?php echo $modelProduksi->status_produksi ? "<span class='text-success' >●</span>" : "<div class='img-circle text-danger'>●</div>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1">Listrik</td>
                                <td colspan="2" class="col-sm-1"><?php echo $modelProduksi->listrik . "MW" ?></td>
                                <td colspan="2" class="col-sm-1"><span>Kumulatif <?php echo date('Y'); ?>: </span><?php echo $modelProduksi->cumlistrik ?> MW</td>	
                                

                            </tr>
                            <tr>
                                <td class="col-sm-1">Catatan</td>
                                <td colspan="2" class="col-sm-1"><?php echo $modelProduksi->remark ?></td>
                                
                            </tr>


                            <tr>
                                <td rowspan="8" class="data col-sm-1"><strong>Izin</strong></td>
                                <td class="col-sm-1">IUP/IPB</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->iup_awal . ' s/d ' . $modelIzin->iup_akhir ?></td>
                                <td rowspan="8" class="right centered"><?php echo $modelIzin->status_izin ? "<span class='text-success' >●</span>" : "<div class='img-circle text-danger'>●</div>"; ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-3">Izin Jasa Lingkungan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->ijl_awal . ' s/d ' . $modelIzin->ijl_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IPPKH</td>
								<td colspan="4" class="col-sm-1"><?php echo $modelIzin->ippkh_awal . ' s/d ' . $modelIzin->ippkh_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMB</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->imb_awal . ' s/d ' . $modelIzin->imb_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Amdal</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->amdal_awal . ' s/d ' . $modelIzin->amdal_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">IMKA</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->imka_awal . ' s/d ' . $modelIzin->imka_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Simaksi</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->simaksi_awal . ' s/d ' . $modelIzin->simaksi_akhir ?></td>
                            </tr>
                            <tr>
                                <td class="col-sm-1">Catatan</td>
                                <td colspan="4" class="col-sm-1"><?php echo $modelIzin->remark ?></td>	
                            </tr>
                            <tr>
                                <td class="data col-sm-1"><strong>Sosial</strong></td>
                                <td colspan="5" style="vertical-align:top;height:20px;" class="col-sm-1"> <?php echo $modelSosial->sosial_text ?></td>
                                <td class="centered"><?php echo $modelSosial->sosial_text ? "<span class='text-success' >●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="box box-solid" style="padding:3px; height:100px;">
                <div class="box-body">
                    <table class="table table-bordered table-small" >
                        <thead class="thead">
                            <tr class="trhead" >
                                <th style="background:gainsboro;">Peta Lokasi WKP</th>
                                <th style="background:gainsboro">Foto</th>
                            </tr>
                        </thead>								
                        <tbody>
                            <tr>
                                <td rowspan="2" class="col-sm-1 foto" style="text-align: center; vertical-align: middle;"><?php echo Html::img(Url::base().'/uploads/'. $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Peta/' . $modelFoto->peta, ['height' => 120]) ?></td>
                                <td class="col-sm-1 foto" style="text-align: center; vertical-align: middle;"><?php echo!empty($modelFoto->name) ? Html::img(Url::base().'/uploads/' . $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name, ['height' => 60]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>
                            </tr>
                            <tr>

                                <td class="col-sm-1 foto" style="text-align: center; vertical-align: middle;"> 
                                    <?php echo!empty($modelFoto->name2) ? Html::img(Url::base().'/uploads/'. $modelWkp->nama . '-' . $modelPltp->nama_pltp . '-' . $modelUnit->no_unit . '/Foto/' . $modelFoto->name2, ['height' => 60]) : "<i class='fa fa-file-image-o fa-5x' style='padding-top:50px'> </i>"; ?></td>

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
                        <span class="box-title" style="font-size: 8px;"><strong>Resume Uraian Kegiatan</strong></span>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-small">
                            <thead class="thead">
                                <tr class="trhead" >
                                    <th style="background:gainsboro;" width="30%">Kegiatan</th>
                                    <th class="col-sm-4" style="background:gainsboro;"> Target</th>
                                    <th class="col-sm-4" style="background:gainsboro;"> Capaian</th>
                                    <th class="col-sm-1" style="background:gainsboro;" width="6%"> Status</th>
                                    <th class="col-sm-1" style="background:gainsboro;"> Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td ><strong>Penyelidikan Geosains</strong></td>
                                    <td><?php echo $modelPekGeosains->target ?></td>
                                    <td><?php echo $modelPekGeosains->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekGeosains->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekGeosains->remark ?></td>
                                    
                                </tr>
                                <tr>
                                    <td><strong>Pembangunan Sumur Eskplorasi</strong></td>
                                    <td><?php echo $modelPekEksplorasi->target ?></td>
                                    <td><?php echo $modelPekEksplorasi->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekEksplorasi->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekEksplorasi->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Studi Kelayakan</strong></td>
                                    <td><?php echo $modelPekKelayakan->target ?></td>
                                    <td><?php echo $modelPekKelayakan->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekKelayakan->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekKelayakan->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>PPA</strong></td>
                                    <td><?php echo $modelPekPpa->target ?></td>
                                    <td><?php echo $modelPekPpa->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekPpa->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekPpa->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Uji Sumur</strong></td>
                                    <td><?php echo $modelPekUjimonsumur->target ?></td>
                                    <td><?php echo $modelPekUjimonsumur->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekUjimonsumur->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekUjimonsumur->remark ?></td>

                                </tr>
                                <tr>
                                    <td><strong>Pemboran Sumur Eksploitasi</strong></td>
                                    <td><?php echo $modelPekPengsumur->target ?></td>
                                    <td><?php echo $modelPekPengsumur->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekPengsumur->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekPengsumur->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Konstruksi Sipil</strong></td>
                                    <td><?php echo $modelPekKonssipil->target ?></td>
                                    <td><?php echo $modelPekKonssipil->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekKonssipil->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekKonssipil->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Konstruksi Jalan</strong></td>
                                    <td><?php echo $modelPekAccroad->target ?></td>
                                    <td><?php echo $modelPekAccroad->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekAccroad->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekAccroad->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Engineering</strong></td>
                                    <td><?php echo $modelPekEngineering->target ?></td>
                                    <td><?php echo $modelPekEngineering->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekEngineering->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekEngineering->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Procurement</strong></td>
                                    <td><?php echo $modelPekProcurement->target ?></td>
                                    <td><?php echo $modelPekProcurement->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekProcurement->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekProcurement->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Construction</strong></td>
                                    <td><?php echo $modelPekConstruction->target ?></td>
                                    <td><?php echo $modelPekConstruction->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekConstruction->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekConstruction->remark ?></td>
                                    
                                </tr>
                                <tr>
                                    <td><strong>Overall Progress EPC</strong></td>
                                    
                                    <td><?php echo $modelPekOverallepc->target ?></td>
                                    <td><?php echo $modelPekOverallepc->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekOverallepc->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekOverallepc->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Transmisi</strong></td>
                                    
                                    <td><?php echo $modelPekTransmisi->target ?></td>
                                    <td><?php echo $modelPekTransmisi->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekTransmisi->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekTransmisi->remark ?></td>
                                </tr>
                                <tr>
                                    <td><strong>COD</strong></td>
                                    <td><?php echo $modelPekCod->target ?></td>
                                    <td><?php echo $modelPekCod->capaian ?></td>
                                    <td class="centered"><?php echo $modelPekCod->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
                                    <td><?php echo $modelPekCod->remark ?></td>
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
                                    <th style="background:gainsboro;" colspan="4">Timeline Pengembangan</th>
                                    <th rowspan="3" class="centered" style="background:gainsboro;">Status</th>
                                </tr>
                                <tr class="trhead">
                                    <th style="background:gainsboro;" rowspan="2">Kegiatan </th>
                                    <th style="background:gainsboro;" rowspan="2">Total Tahun</th>
                                    <th style="background:gainsboro;" colspan="2">Bulan/Tahun</th>
                                </tr>
                                <tr class="trhead">
                                    <th style="background:gainsboro;">Mulai</th>
                                    <th style="background:gainsboro;">Akhir</th>
                                </tr>
                            </thead>						
                            <tbody>
                                <tr>
                                    <td class="col-sm-1 right"><strong>Pelelangan</strong></td>
                                    <td class="col-sm-1"><?php echo $modelWaktu->pelelangan_tahun ?></td>
                                    <td class="col-sm-4"><?php echo $modelWaktu->pelelangan_mulai ?></td>
                                    <td class="col-sm-4"><?php echo $modelWaktu->pelelangan_akhir ?></td>
                                    <td rowspan="6" class="centered" ><?php echo $modelWaktu->status ? "<span class='text-success'>●</span>" : "<span class='img-circle text-danger'>●</span>"; ?></td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-solid " style="border: 1px solid #ddd;padding:2px;">
                    <div style="text-align:center;" class="box-header with-border">
                        <span class="box-title" style="font-size: 8px;"><strong>Kendala</strong></span>
                    </div>
                    <div style="height:75px;font-size:8px" class="box-body">
                        <?php echo $modelKendala->kendala ?>
                    </div>
                </div>

                <!--row-->
            </div>

            <!--sm5-->
        </div>
        <!-- 2nd row -->

    </div>

</div>

