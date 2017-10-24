<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\Conferences;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Conferences */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conferences-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['row' => 6])->widget(\yii\redactor\widgets\Redactor::className())  ?>

    <?= $form->field($model, 'start_in')->widget(DatePicker::classname(),[
        'name' => 'start_in',
        'value' => date('Y-M-d'),
        'options' => ['placeholder' => 'Enter Conferences date ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-m-d',
            'todayHighlight' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList(ArrayHelper::map(Conferences::getStatus(),'id','title')) ?>

   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
