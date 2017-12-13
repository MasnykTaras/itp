<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="post-form">

    <? $array = Json::decode($model->content); ?>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map($model->getStatus(),'id','title')) ?>

    <div class="form-group">

    <?= Html::tag('label', 'Main image') ?>

    <?= Html::fileInput('image', $array['image']) ?>
    
    </div>
   
    <?php if(!empty($array['image'])){ ?>
    <div class="form-group">
        <?= Html::img('/uploads/' . $array['image'], ['alt' => 'Image']) ?>
    </div>
    <?php } ?>
   
    <div class="form-group">
    <?= Html::tag('label', 'Main text') ?>

    <?= Html::textarea('main-text', $array['main-text'], ['class' => 'form-control']) ?> 
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
