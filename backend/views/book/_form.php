<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\BookCategory;
use yii\helpers\ArrayHelper;
use backend\models\Book;


/* @var $this yii\web\View */
/* @var $model backend\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    <?php if($model->id){ ?>
        <?= Html::tag('p', Book::getCurrentFile($model->id)[0]) ?>
    <?php } ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?php if($model->id){ ?>
        <?= Html::img('/uploads/' . Book::getCurrentImage($model->id)[0], ['alt' => 'Image']) ?>
    <?php } ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(Book::getStatus(),'id','title')) ?>

    <?= $form->field($model, 'book_category_id')->dropDownList(ArrayHelper::map(BookCategory::getCategory(),'id','title')); ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
