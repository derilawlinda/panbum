<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\PekUjimonsumur */

$this->title = $model->id_ujimonsumur;
$this->params['breadcrumbs'][] = ['label' => 'Pek Ujimonsumur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pek-ujimonsumur-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Pek Ujimonsumur'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id_ujimonsumur], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_ujimonsumur], [
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
        'id_ujimonsumur',
        'id_unit',
        'target',
        'capaian',
        'remark',
        'status',
        'submitted_date',
        'confirmed_date',
        'confirmed',
        'file',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
