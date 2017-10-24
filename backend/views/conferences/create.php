<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Conferences */

$this->title = 'Create Conferences';
$this->params['breadcrumbs'][] = ['label' => 'Conferences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conferences-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
