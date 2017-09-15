<?php

use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

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
    <?php
    echo Highcharts::widget([
        'scripts' => [
            'modules/exporting',
            'themes/grid-light',
        ],
        'options' => [
            'title' => [
                'text' => 'Statistik Makanan oleh User',
            ],
            'xAxis' => [
                'categories' => ['Kalori', 'Protein', 'Lemak', 'Karbohidrat', 'Kalsium','Posfor','Besi','Vitamin A','Vitamin B','Vitamin C','Air','Bahan'],
            ],
//            'labels' => [
//                'items' => [
//                    [
//                        'html' => 'Total fruit consumption',
//                        'style' => [
//                            'left' => '50px',
//                            'top' => '18px',
//                            'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
//                        ],
//                    ],
//                ],
//            ],
            'series' => [
                [
                    'type' => 'column',
                    'name' => \Yii::$app->user->identity->nama_lengkap,
                    'data' => [300, 220, 150, 300, 600,450,400,345,375,600,350,340],
                ],
                [
                    'type' => 'column',
                    'name' => 'Standard',
                    'data' => [400, 250, 150, 300, 400,550,400,230,400,345,300,275],
                ],
                [
                    'type' => 'column',
                    'name' => 'Rata rata masyarakat',
                    'data' => [390, 235, 140, 275, 350,450,450,550,340,280,450,250],
                ],
//                [
//                    'type' => 'spline',
//                    'name' => 'Average',
//                    'data' => [3, 2.67, 3, 6.33, 3.33],
//                    'marker' => [
//                        'lineWidth' => 2,
//                        'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
//                        'fillColor' => 'white',
//                    ],
//                ],
//                [
//                    'type' => 'pie',
//                    'name' => 'Total consumption',
//                    'data' => [
//                        [
//                            'name' => 'Jane',
//                            'y' => 13,
//                            'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
//                        ],
//                        [
//                            'name' => 'John',
//                            'y' => 23,
//                            'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
//                        ],
//                        [
//                            'name' => 'Joe',
//                            'y' => 19,
//                            'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
//                        ],
//                    ],
//                    'center' => [100, 80],
//                    'size' => 100,
//                    'showInLegend' => false,
//                    'dataLabels' => [
//                        'enabled' => false,
//                    ],
//                ],
            ],
        ]
    ]);
    ?>
    <?php if (Yii::$app->session->hasFlash('cukup')): ?>
  <div class="alert alert-success alert-success">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Selamat</h4>
  <?= Yii::$app->session->getFlash('cukup') ?>
  </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('lebih')): ?>
  <div class="alert alert-success alert-danger">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Waspada</h4>
  <?= Yii::$app->session->getFlash('lebih') ?>
  </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('kurang')): ?>
  <div class="alert alert-success alert-warning">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Hati hati!</h4>
  <?= Yii::$app->session->getFlash('kurang') ?>
  </div>
<?php endif; ?>
</div>
  </section>
</div>