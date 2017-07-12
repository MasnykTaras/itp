<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'Update Category: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
