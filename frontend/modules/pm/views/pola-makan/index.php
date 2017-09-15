<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\pm\models\search\PolaMakanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pola Makan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pola-makan-index">

    <section id="features">
        <div class="container">
            <br><br><br>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Tambah Makanan Hari ini', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export Data', ['export'], ['class' => 'btn btn-info']) ?>
    </p>
    <?php
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        //  'id',
        'tanggal',
        'bulan',
        'tahun',
        'namaMakanan.bahan_pangan',
        'namaMakanan.kalori',
        'namaMakanan.protein',
        'namaMakanan.lemak',
        'namaMakanan.karbohidrat',
        'namaMakanan.kalsium',
        'namaMakanan.posfor',
        'namaMakanan.besi',
        'namaMakanan.vitamin_a',
        'namaMakanan.vitamin_b',
        'namaMakanan.vitamin_c',
        'namaMakanan.air',
        'namaMakanan.bahan',
        ['class' => 'yii\grid\ActionColumn'],
    ];

    echo GridView::widget([
        'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'tanggal',
                'label' => 'Tanggal',
                'filter' => [
                    1 => "1", 2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6", 7 => "7", 8 => "8", 9 => "9", 10 => "10",
                    11 => "11", 12 => "12", 13 => "13", 14 => "14", 15 => "15", 16 => "16", 17 => "17", 18 => "18", 19 => "19", 20 => "20",
                    21 => "21", 22 => "22", 23 => "23", 24 => "24", 25 => "25", 26 => "26", 27 => "27", 28 => "28", 29 => "29", 30 => "30", 31 => "31"
                ],
                'format' => 'raw',
                'value' => function ($model) {
            return $model->tanggal;
        }
            ],
            [
                'attribute' => 'bulan',
                'label' => 'Bulan',
                
                'filter' => [
                    1 => "1", 2 => "2", 3 => "3", 4 => "4", 5 => "5", 6 => "6", 7 => "7", 8 => "8", 9 => "9", 10 => "10",
                    11 => "11", 12 => "12"
                ],
                'format' => 'raw',
                'value' => function ($model) {
            return $model->bulan;
        }
            ],
            'tahun',
            'namaMakanan.bahan_pangan',
            'namaMakanan.kalori',
            'namaMakanan.protein',
            'namaMakanan.lemak',
            'namaMakanan.karbohidrat',
            'namaMakanan.kalsium',
            'namaMakanan.posfor',
            'namaMakanan.besi',
            'namaMakanan.vitamin_a',
            'namaMakanan.vitamin_b',
            'namaMakanan.vitamin_c',
            'namaMakanan.air',
            'namaMakanan.bahan',
                    
            // 'time_created',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'pjax' => true, // pjax is set to always true for this demo
        // set your toolbar
        'toolbar' => [

            '{export}',
            '{toggleData}',
        ],
        // set export properties
        'export' => [
            'fontAwesome' => true
        ],
        // parameters from the demo form
//        'bordered' => $bordered,
//        'striped' => $striped,
//        'condensed' => $condensed,
        'responsive' => true,
//        'hover' => $hover,
        // 'showPageSummary' => $pageSummary,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => 'Daftar makan Anda ',
        ],
        'persistResize' => false,
            //   'exportConfig' => $exportConfig,
    ]);
    ?>
</div>
  </section>
</div>