<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Post;
use app\models\Book;

$this->title = 'My Yii Application';?>

 <?php Pjax::begin();   ?>

  <section class="about">
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
          <div class="about__content">
            <div class="about__img" style="background-image: url(img/video.png);"></div>
            <div class="about__info">
              <div class="about__wrapper">
                <h2 class="about__title">Об институте</h2>
                <p class="about__text">Предварительное напряжение железобетонных конструкций строений посредством высокопрочной арматурой (канат, армоканат). Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку при меньшем расходе бетона и арматуры. Услуги:
                </p>
                <div class="about__service">
                  <a href="engineering.html" class="about__link">Проектирование</a>
                </div>
                <div class="about__service">
                  <a href="experiment.html" class="about__link">Испытание</a>
                </div>
                <a href="about.html" class="about__more">Подробнее</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="news">
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
                <div class="news__content">
                  <h2 class="news__title">Последние новости</h2>
                    <div class="news__items">    
                      <?php foreach($posts as $post): ?>                   
                        <div class="news__item post">
                            <a href="<?= Url::toRoute(['post/one', 'id' => $post->id]); ?>" class="post__link">
                                <div class="post__preview">
                                    <div class="post__img">
                                      <img src="<?='/uploads/' . $post->image; ?>" alt="img">
                                    </div>
                                    <span class="post__date"><?= $post->dateView($post->created); ?></span>
                                </div>
                                <h3 class="post__title"><?= $post->title; ?></h3>
                            </a>
                            <p class="post__text"><?= $post->shortContent($post->content); ?></p>
                        </div>
                      <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="literature">
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
          <div class="literature__content">
            <ul class="literature__items">

             
              <?php $count = 0; ?>
              <?php foreach($books as $book): ?>
                <?php if($count == 0):?>
                  <li class="literature__item literature__item_big">
                    <a href="<?= Url::toRoute(['book/index']); ?>" class="literature__title">Литература</a>
                    <a href="<?= Url::toRoute(['book/one', 'id' => $book['id']]); ?>" class="literature__book book book_light">
                      <div class="book__img book__img_big">
                        <img src="<?='/uploads/' . $book['image']; ?>" alt="book">
                      </div>
                      <h4 class="book__title"><?= $book['title'];?></h4>
                      <div class="book__info">
                        <span class="book__type"><?= Book::getFileInfo($book['file'])['type']; ?></span>
                        <span class="book__size"><?= Book::getFileInfo($book['file'])['size']; ?></span>
                      </div>
                    </a>
                  </li>
                <?php else:?>
                  <li class="literature__item">
                    <a href="<?= Url::toRoute(['book/one', 'id' => $book['id']]); ?>" class="book">
                      <div class="book__img">
                        <img src="<?='/uploads/' . $book['image']; ?>" alt="book">
                      </div>
                      <h4 class="book__title"><?= $book['title'];?></h4>
                      <div class="book__info">
                        <span class="book__type"><?= Book::getFileInfo($book['file'])['type']; ?></span>
                        <span class="book__size"><?= Book::getFileInfo($book['file'])['size']; ?></span>
                      </div>
                    </a>
                  </li>
                <?php endif;?>
                <?php $count++; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
    </div>
</section>

<section class="subscribe">
      <div class="l-container">
        <div class="subscribe__content">
        <?php $form = ActiveForm::begin(['options' => ['class'=> 'subscribe__form' ]]); ?>
            <h2 class="subscribe__title">Новостная рассылка</h2>
            <p class="subscribe__text">Подпишитесь на наши публикации и не пропустите последние новости</p>
            <div class="subscribe__fill">
              <?= $form->field($model, 'email', [
                    'template' => '{input}',
                    'options' => [
                        'tag' => null,
                ]])->textInput([
                'maxlength'=>50,
                'class'=>'subscribe__mail',
                 ])->label(false) ?>
              <?= Html::submitButton('Подписаться', ['class' => 'subscribe__btn', 'name' => 'subscribe-button']) ?>
            </div>
         <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>

<?php Pjax::end(); ?>