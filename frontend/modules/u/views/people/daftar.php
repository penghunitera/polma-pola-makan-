<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\u\models\User */

$this->title = 'Daftar User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <section id="whyus" class="grey">
        <div class="container"><br><br><br>
            <h1><?= Html::encode($this->title) ?></h1>

            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>
        </div>
    </section>
</div>
