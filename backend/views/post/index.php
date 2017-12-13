<?php

use yii\helpers\Html;
use yii\grid\GridView;
use sjaakp\sortable\SortableGridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Create Category', ['//category/create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Refresh', ['index'], ['class' => 'btn btn-success btn-save']) ?>
    </p>

    <?= SortableGridView::widget([
            'dataProvider' => $dataProvider,
            'orderUrl' => ['order'],
            'columns' => [           
                'order',
                'image',
                'id',
                'title',
                'user_id',
                'created',
                'category_id',
                'status',
                ['class' => 'yii\grid\ActionColumn'],
            ],        
        ]); 
    ?>
</div>
