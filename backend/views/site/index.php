<?php
/* @var $this yii\web\View */

$this->title = 'Form Pantau WKP';

use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
?>

<style>
    .jumbotron {
        padding-top: 0px;
        padding-bottom: 48px;
    }
</style>
<div class="site-index">

    <div class="jumbotron" style="padding-bottom:0px">
        <h1><?php echo Html::img('@web/image/logo.png', ['width' => 100, 'height' => 100]) ?></h1>
        <p class="lead"><strong>Kementerian Energi dan Sumber Daya Mineral</strong></p>
        <p class="lead"><strong>Direktorat Jenderal Energi Baru Terbarukan dan Konservasi Energi</strong></p>
        <h2>Aplikasi Format Pantau WKP</h2>

    </div>

    <div class="body-content">
        <div class="col-sm-4">
            <div class="box box-primary">

                <div class="box-body">
                    <div class="chart">
                        <?=
                        ChartJs::widget([
                            'type' => 'line',
                            'options' => [
                                'height' => 300,
                                'width' => 400,
                            ],
                            'clientOptions' => [
                                'dataFill' => true,
                                'showScale' => false,
                                'responsive' => true,
                                'scales' => [
                                    'yAxes' => [
                                        [
                                            'scaleLabel'=>[
                                                'display'=>true,
                                                'labelString'=> 'MW'
                                            ],
                                            'gridLines' => [
                                                'display' => false
                                            ]
                                        ]
                                    ]
                                ]
                            ],
                            'data' => [
                                'labels' => $chartLabel,
                                'datasets' => [
                                    [
                                        'label' => 'Telah COD',
                                        'backgroundColor' => "rgba(60,141,188,0.9)",
                                        'strokeColor' => "rgba(60,141,188,0.8)",
                                        'pointColor' => "#3b8bba",
                                        'pointStrokeColor' => "rgba(60,141,188,1)",
                                        'pointHighlightFill' => "#fff",
                                        'pointHighlightStroke' => "rgba(60,141,188,1)",
                                        'data' => $chartData
                                    ]
                                ]
                            ]
                        ]);
                        ?>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>


        </div>
        <div class="col-sm-8">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $jumlahWkp ?></h3>

                        <p>Jumlah WKP</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-industry"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo number_format($jumlahInvestasi, 0, ',', '.') ?></h3>

                        <p>Rencana Investasi</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $produksiUap ?> Ton</h3>

                        <p>Produksi Uap tahun <?php echo date("Y"); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-cloud"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $produksiListrik; ?> MW</h3>

                        <p>Produksi Listrik tahun <?php echo date("Y"); ?></p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bolt"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-fuchsia">
                    <div class="inner">
                        <h3><?php echo $jumlahKapasitas; ?> MW</h3>

                        <p>Rencana Kapasitas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-wrench"></i>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $jumlahKapTerpasang; ?> MW</h3>

                        <p>Kapasitas Terpasang</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-plug"></i>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
