<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

$this->title = 'My Yii Application';?>

 <?php Pjax::begin();   ?>

  <div class="header__content">
    <div class="header__info">
      <h1 class="header__title">Институт Технологий<br>Преднапряжения</h1>
      <p class="header__text">Предварительное напряжение железобетонных конструкций строений посредством высокопрочной арматурой (канат, армоканат). Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку при меньшем расходе бетона и арматуры.
      </p>
    </div>
    <div class="header__img" style="background-image: url(/img/header-img.png);"></div>
  </div>

    
<?php Pjax::end(); ?>