<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\u\models\Profile */

$this->title = 'Create Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">
    <section id="whyus" class="grey">
        <div class="container">
            <h1><?= Html::encode($this->title) ?></h1>

            <?=
            $this->render('_formprofil', [
                'model' => $model,
            ])
            ?>
        </div>
    </section>
</div>
