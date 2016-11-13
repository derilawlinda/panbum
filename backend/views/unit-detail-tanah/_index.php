<?php 
use \yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="row">
    <div class="col-sm-9">
        <h2><?= Html::a(Html::encode($model->id_tanah), ['view', 'id' => $model->id_tanah]) ?></h2>
    </div>
    <div class="col-sm-3" style="margin-top: 15px">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_tanah], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_tanah], [
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
        'id_tanah',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'luas_lahan',
        'status_luas',
        'status_tanah',
        //'status_tahun',
        //'status_status',
        //'legalitas',
        //'status_legalitas',
        //'input_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
</div>


