<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\pm\models\KandunganGizi */

$this->title = 'Create Kandungan Gizi';
$this->params['breadcrumbs'][] = ['label' => 'Kandungan Gizis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kandungan-gizi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
