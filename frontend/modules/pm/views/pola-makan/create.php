<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\PolaMakan */

$this->title = 'Tambah Makanan hari ini';
$this->params['breadcrumbs'][] = ['label' => 'Pola Makans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pola-makan-create">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
<div class="col-lg-12">
    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
</div>
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
  </section>
</div>
