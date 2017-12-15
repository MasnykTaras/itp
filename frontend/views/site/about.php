<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="aboutExpanded">
      <div class="l-container">
        <ul class="lines">
          <li class="lines__item"></li>
          <li class="lines__item"></li>
          <li class="lines__item"></li>
          <li class="lines__item"></li>
          <li class="lines__item"></li>
          <li class="lines__item"></li>
          <li class="lines__item"></li>
        </ul>
         
        <div class="l-content">
          <div class="aboutExpanded__content">
            <div class="aboutExpanded__info">
              <h1 class="aboutExpanded__title"><?= $content['title']; ?></h1>
              <p class="aboutExpanded__text"><?= $content['text']; ?></p>
              <h2 class="aboutExpanded__subtitle">НАПРАВЛЕНИЯ ДЕЯТЕЛЬНОСТИ:</h2>            
              <div class="aboutExpanded__service">
                <a class="aboutExpanded__link" href="">Проектирование</a>
              </div>
              <p class="aboutExpanded__text"></p>
            </div>
            <div class="aboutExpanded__img" style="background-image: url(/uploads/<?= $content['image']; ?>);"></div>
          </div>
        </div>
      </div>
    </section>
