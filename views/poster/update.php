<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Poster $model */

$this->title = 'Update Poster: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Posters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id_poster' => $model->id_poster]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poster-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
