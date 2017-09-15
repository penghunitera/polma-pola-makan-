<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\u\models\Profile */

$this->title = 'Edit Profil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">
<section id="whyus" class="grey">
        <div class="container"><br><br><br>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formprofile', [
        'model' => $model,
    ]) ?>
        </div>
</section>
</div>
