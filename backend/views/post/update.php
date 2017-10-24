<?php

use yii\helpers\Html;
use backend\models\Post;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = 'Update Post: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::img('/uploads/'.Post::getCurrentImage($model->id)[0], ['alt' => 'Image']) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
