<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\Category;
use backend\models\Post;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="post-form">



    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6])->widget(\yii\redactor\widgets\Redactor::className()) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::getCategory(),'id','title')); ?> 

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(Post::getStatus(),'id','title')) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
