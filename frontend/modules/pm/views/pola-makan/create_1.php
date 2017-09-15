<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\PolaMakan */

$this->title = 'Cetak Data Pola Makan';
$this->params['breadcrumbs'][] = ['label' => 'Pola Makans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pola-makan-create">
<section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_1', [
        'model' => $model,
    ]) ?>
        </div>
</section>
</div>
