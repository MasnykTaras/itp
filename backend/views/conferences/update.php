<?php

use yii\helpers\Html;
use backend\models\Conferences;

/* @var $this yii\web\View */
/* @var $model backend\models\Conferences */

$this->title = 'Update Conferences: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Conferences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conferences-update">

    <h1><?= Html::encode($this->title) ?></h1>
	<?= Html::img('/uploads/' . Conferences::getCurrentImage($model->id)[0], ['alt' => 'Image']) ?>	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
