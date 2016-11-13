<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Foto */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Foto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foto-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Foto'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_foto], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_foto], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id_foto',
        [
            'attribute' => 'unit.id_unit',
            'label' => 'Id Unit',
        ],
        'name',
        'uploaded_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
