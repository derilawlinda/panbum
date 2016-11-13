<?php 
use \yii\helpers\Html;
use yii\widgets\DetailView;
?>

<div class="row">
    <div class="col-sm-9">
        <h2><?= Html::a(Html::encode($model->parent), ['view', 'parent' => $model->parent, 'child' => $model->child]) ?></h2>
    </div>
    <div class="col-sm-3" style="margin-top: 15px">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'parent' => $model->parent, 'child' => $model->child], [
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
        [
            'attribute' => 'parent0.name',
            'label' => 'Parent',
        ],
        [
            'attribute' => 'child0.name',
            'label' => 'Child',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
    ?>
</div>


