<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Category;
use backend\models\Post;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>       
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
 
   <div class="col-lg-12">
 
       <div class="panel panel-default">
 
           <div class="panel-heading">Post id:<?= $model->id; ?></div>
 
           <div class="panel-body">
                
               <p><b>Title: </b> <?=$model->title; ?> <br><b>Created:</b> <?=$model->created; ?> </p>
      
               <p><b>Category: </b><?= Category::getOneCategory($model->category_id)[0]; ?> </p>

               <div><div style="background:url(/uploads/<?= $model->image; ?>)no-repeat;background-size:cover;width:300px; height:300px;float: left;"></div></div>
                <div style="float: left; width: 65%;padding-left: 30px;">
                    <p><b>Content:</b> <?= Post::shortContent($model->content); ?> </p>
                </div>
 
           </div>
 
       </div>
 
   </div>
 
</div>

</div>
