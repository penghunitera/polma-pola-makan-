<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\Route */

$this->title = 'Create Route';
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-create">
    <section id="whyus" class="grey">
        <div class="container">
            <br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>

            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </section>
</div>
