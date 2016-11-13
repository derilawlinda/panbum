<?php 
use \yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\tabs\TabsX;

$UnitDetailTanah = $model->getUnitDetailTanahs()->latest($model->id_unit);
$UnitDetailLahan = $model->getUnitDetailLahans()->latest($model->id_unit);
$UnitDetailDed =	$model->getUnitDetailDeds()->latest($model->id_unit);
$UnitDetailIzin =	$model->getUnitDetailIzins()->latest($model->id_unit);
$UnitDetailSosial =	$model->getUnitDetailSosials()->latest($model->id_unit);

$PekerjaanGeosains =	$model->getPekGeosains()->latest($model->id_unit);
$PemboranEksplorasi =	$model->getPekEksplorasis()->latest($model->id_unit);
$StudiKelayakan =	$model->getPekKelayakans()->latest($model->id_unit);
$UjiSumur =	$model->getPekUjimonsumurs()->latest($model->id_unit);
$PengembanganSumur= $model->getPekPengsumurs()->latest($model->id_unit);
$KonstruksiSipil = $model->getPekKonssipils()->latest($model->id_unit);
$AccessRoad = $model->getPekAccroads()->latest($model->id_unit);
$EPC = $model->getPekEpcs()->latest($model->id_unit);
$Transmisi = $model->getPekTransmisis()->latest($model->id_unit);
$COD = $model->getPekCods()->latest($model->id_unit);

$wkp_name = "Jaboi";

?>
<style>
.table {
    border-bottom:0px !important;
}
.table th, .table td {
    border: 1px !important;
}
.fixed-table-container {
    border:0px !important;
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

</style>
<div class="well">
	<div class="row">
    <div class="col-sm-7">
        <h2><?= Html::a(Html::encode($wkp_name), ['view', 'id' => $model->id_unit]) ?></h2>
    </div>
    <div class="col-sm-3" style="margin-top: 15px">
        <?= Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'Print PDF',
            ['pdf', 'id' => $model->id_unit],
            [
                'class' => 'btn btn-danger',
                'target' => '_blank',
                'data-toggle' => 'tooltip',
                'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
        )?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_unit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_unit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </div>
	
	</div>
	
	<div class="row">
    <?php 
    /* $gridColumn = [
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
        //'kabkot',
        //'no_unit',
        //'potensi',
        //'rencana',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); */
	echo TabsX::widget([
    'position' => TabsX::POS_ABOVE,
    'align' => TabsX::ALIGN_LEFT,
    'items' => [
        [
            'label' => 'Data Umum',
			'headerOptions' => ['style'=>'font-weight:bold'],
            'content' => '
				
          <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Tanah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Luas Lahan(Ha)</dt>
                <dd>'.  $UnitDetailTanah["luas_lahan"].'</dd>
                <dt>Status Tanah(Ha)</dt>
                <dd>'.  $UnitDetailTanah["status_tanah"].'</dd>
				<dt>Legalitas No. Akte</dt>
                <dd>'.  $UnitDetailTanah["legalitas"].'</dd>
              </dl>
			 
			  <div class="pull-right" style="margin-left: 60px">
			'.
			(Html::a('Disetujui', null, ['class' => 'btn btn-primary', 'onclick' => 'js:onConfirmClick()']))
			.'
			</div>
            </div>
            <!-- /.box-body -->
			
          </div>
          <!-- /.box -->
        
		
		 <div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>

              <h3 class="box-title">Lahan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Hutan Konservasi(Ha)</dt>
                <dd>'.$UnitDetailLahan["hutan_kons"] .'</dd>
                <dt>Hutan Lindung(Ha)</dt>
                <dd>'.  $UnitDetailLahan["hutan_lin"].'</dd>
				<dt>Hutan Produksi(Ha)</dt>
                <dd>'.  $UnitDetailLahan["hutan_prod"].'</dd>
				<dt>Area Pengunaan Lahan</dt>
                <dd>'.  $UnitDetailLahan["area"].'</dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       
		<div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>
              <h3 class="box-title">DED & RAB</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Nama Perencana</dt>
                <dd>'. $UnitDetailDed["nama_perencana"]  .'</dd>
                <dt>Alamat</dt>
                <dd>'.$UnitDetailDed["alamat"]  .'</dd>
				<dt>No Kontrak</dt>
                <dd>'. $UnitDetailDed["no_kontrak"] .'</dd>
				<dt>Tanggal Awal DED</dt>
                <dd>'. $UnitDetailDed["tgl_awal_ded"] .'</dd>
				<dt>Tanggal Akhir DED</dt>
                <dd>'. $UnitDetailDed["tgl_akhir_ded"] .'</dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
		<div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>
              <h3 class="box-title">Izin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table borderless">
					<tbody>
					  <tr>
						<td class="col-md-2 right"><strong>IUP/IPB</strong></td>
						<td class="col-md-9">
							<dl class="dl-horizontal left">
								<dt>File</dt>
								<dd>'.($UnitDetailIzin["iup_file"] ? Html::a($UnitDetailIzin["iup_file"], ['download','file_name' => 'Izin/'.$UnitDetailIzin["iup_file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
								<dt> Tanggal Awal </dt>
								<dd>'.$UnitDetailIzin["iup_awal"].'</dd>
								<dt> Tanggal Akhir </dt>
								<dd>'.$UnitDetailIzin["iup_akhir"].'</dd>
							</dl>
						</td>
					  </tr>
					</tbody>
				</table>
				
				<table class="table borderless">
					<tbody>
					  <tr>
						<td class="col-md-2 right"><strong>IPPKH</strong></td>
						<td class="col-md-9">
							<dl class="dl-horizontal left">
								<dt>File</dt>
								<dd>'.($UnitDetailIzin["ippkh_file"] ? Html::a($UnitDetailIzin["ippkh_file"], ['download','file_name' => 'Izin/'.$UnitDetailIzin["ippkh_file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
								<dt> Tanggal Awal </dt>
								<dd>'.$UnitDetailIzin["ippkh_awal"].'</dd>
								<dt> Tanggal Akhir </dt>
								<dd>'.$UnitDetailIzin["ippkh_akhir"].'</dd>
							</dl>
						</td>
					  </tr>
					</tbody>
				</table>
				
				<table class="table borderless">
					<tbody>
					  <tr>
						<td class="col-md-2 right"><strong>IMB</strong></td>
						<td class="col-md-9">
							<dl class="dl-horizontal left">
								<dt>File</dt>
								<dd>'.($UnitDetailIzin["imb_file"] ? Html::a($UnitDetailIzin["imb_file"], ['download','file_name' => 'Izin/'.$UnitDetailIzin["ippkh_file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
								<dt> Tanggal Awal </dt>
								<dd>'.$UnitDetailIzin["imb_awal"].'</dd>
								<dt> Tanggal Akhir </dt>
								<dd>'.$UnitDetailIzin["imb_akhir"].'</dd>
							</dl>
						</td>
					  </tr>
					</tbody>
				</table>
				
				<table class="table borderless">
					<tbody>
					  <tr>
						<td class="col-md-2 right"><strong>AMDAL</strong></td>
						<td class="col-md-9">
							<dl class="dl-horizontal left">
								<dt>File</dt>
								<dd>'.($UnitDetailIzin["amdal_file"] ? Html::a($UnitDetailIzin["amdal_file"], ['download','file_name' => 'Izin/'.$UnitDetailIzin["amdal_file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
								<dt> Tanggal Awal </dt>
								<dd>'.$UnitDetailIzin["amdal_awal"].'</dd>
								<dt> Tanggal Akhir </dt>
								<dd>'.$UnitDetailIzin["amdal_akhir"].'</dd>
							</dl>
						</td>
					  </tr>
					</tbody>
				</table>
				
				<table class="table borderless">
					<tbody>
					  <tr>
						<td class="col-md-2 right"><strong>IMKA</strong></td>
						<td class="col-md-9">
							<dl class="dl-horizontal left">
								<dt>File</dt>
								<dd>'.($UnitDetailIzin["imka_file"] ? Html::a($UnitDetailIzin["imka_file"], ['download','file_name' => 'Izin/'.$UnitDetailIzin["ippkh_file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
								<dt> Tanggal Awal </dt>
								<dd>'.$UnitDetailIzin["imka_awal"].'</dd>
								<dt> Tanggal Akhir </dt>
								<dd>'.$UnitDetailIzin["imka_akhir"].'</dd>
							</dl>
						</td>
					  </tr>
					</tbody>
				</table>
				
				<table class="table borderless">
					<tbody>
					  <tr>
						<td class="col-md-2 right"><strong>Simaksi</strong></td>
						<td class="col-md-9">
							<dl class="dl-horizontal left">
								<dt>File</dt>
								<dd>'.($UnitDetailIzin["simaksi_file"] ? Html::a($UnitDetailIzin["simaksi_file"], ['download','file_name' => 'Izin/'.$UnitDetailIzin["simaksi_file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
								<dt> Tanggal Awal </dt>
								<dd>'.$UnitDetailIzin["simaksi_awal"].'</dd>
								<dt> Tanggal Akhir </dt>
								<dd>'.$UnitDetailIzin["simaksi_akhir"].'</dd>
							</dl>
						</td>
					  </tr>
					</tbody>
				</table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
			
			<div class="box box-solid">
            <div class="box-header with-border">
              <i class="fa fa-text-width"></i>
              <h3 class="box-title">Sosial</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                <dt>Informasi Sosial</dt>
                <dd>'. $UnitDetailSosial["sosial_text"]  .'</dd>
                
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
		
				
			',
            'active' => true
        ],
        [
            'label' => 'Pekerjaan',
            'content' => '
				<div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Penyelidikan Geosains</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($PekerjaanGeosains["file"] ? Html::a($PekerjaanGeosains["file"], ['download','file_name' => 'Geosains/'.$PekerjaanGeosains["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $PekerjaanGeosains["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $PekerjaanGeosains["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Pemboran Sumur Eksplorasi</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($PemboranEksplorasi["file"] ? Html::a($PemboranEksplorasi["file"], ['download','file_name' => 'Pemboran Sumur Eksplorasi/'.$PemboranEksplorasi["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $PemboranEksplorasi["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $PemboranEksplorasi["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Studi Kelayakan</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($StudiKelayakan["file"] ? Html::a($StudiKelayakan["file"], ['download','file_name' => 'Studi Kelayakan/'.$StudiKelayakan["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $StudiKelayakan["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $StudiKelayakan["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Uji Monitoring Sumur</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($UjiSumur["file"] ? Html::a($UjiSumur["file"], ['download','file_name' => 'Uji Monitoring Sumur/'.$UjiSumur["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $UjiSumur["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $UjiSumur["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Pengembangan Sumur Eksploitasi</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($PengembanganSumur["file"] ? Html::a($PengembanganSumur["file"], ['download','file_name' => 'Pengembangan Sumur Eksploitasi/'.$PengembanganSumur["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $PengembanganSumur["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $PengembanganSumur["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Konstruksi Sipil</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($KonstruksiSipil["file"] ? Html::a($KonstruksiSipil["file"], ['download','file_name' => 'Konstruksi Sipil/'.$KonstruksiSipil["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $KonstruksiSipil["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $KonstruksiSipil["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Access Road</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($AccessRoad["file"] ? Html::a($AccessRoad["file"], ['download','file_name' => 'Access Road/'.$AccessRoad["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $AccessRoad["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $AccessRoad["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Engineering, Procurement, Construction </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($EPC["file"] ? Html::a($EPC["file"], ['download','file_name' => 'Engineering Procurement Construction/'.$EPC["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $EPC["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $EPC["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">Transmisi </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($Transmisi["file"] ? Html::a($Transmisi["file"], ['download','file_name' => 'Transmisi/'.$Transmisi["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $Transmisi["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $Transmisi["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			  
			  <div class="box box-solid">
				<div class="box-header with-border">
				  <i class="fa fa-text-width"></i>

				  <h3 class="box-title">COD</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				  <dl class="dl-horizontal">
					<dt>File</dt>
					<dd>'.($COD["file"] ? Html::a($COD["file"], ['download','file_name' => 'COD/'.$COD["file"],'wkp_name'=>$wkp_name],['target' => '#']) : "<span class='label label-danger'>No Data</span>").'</dd>
					<dt>Target</dt>
					<dd>'.  $COD["target"].'</dd>
					<dt>Capaian</dt>
					<dd>'.  $COD["capaian"].'</dd>
				  </dl>
				</div>
				<!-- /.box-body -->
			  </div>
			
			',
            'headerOptions' => ['style'=>'font-weight:bold'],
            'options' => ['id' => 'myveryownID'],
        ]
        
    ],
])
    ?>
	</div>
</div>

<script type='text/javascript'>
function onConfirmClick(){

	alert("hi");
}


</script>


