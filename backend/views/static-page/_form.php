<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\StaticPage;

/* @var $this yii\web\View */
/* @var $model backend\models\StaticPage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="static-page-form">

    <?php $form = ActiveForm::begin(['validationUrl' => ['user/validate-email'], ]); ?>

    <?= $form->field($model, 'template')->dropDownList(ArrayHelper::map(StaticPage::getPageTemplate(),'id','title')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
