<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\Keterangan */

$this->title = 'Create Keterangan';
$this->params['breadcrumbs'][] = ['label' => 'Keterangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keterangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
