<?php 
use \yii\helpers\Html;
use yii\widgets\DetailView;
use yii\jui\Accordion;
?>

<div class="row">
    <div class="col-sm-9">
        <h2><?= Html::a(Html::encode($model->id_unit), ['view', 'id' => $model->id_unit]) ?></h2>
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
        //'kabkot',
        //'no_unit',
        //'potensi',
        //'rencana',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
</div>


