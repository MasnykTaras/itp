<?php 
	use app\models\Post; 
	use  yii\helpers\Url;
?>

<section class="postSingle">
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
          <div class="postSingle__content">
            <div class="postSingle__img">
              <img src="../../img/conference/post-single-img.png" alt="img">
              <span class="postSingle__date"><?= $post->dateView($post->created); ?></span>
            </div>
            <h2 class="postSingle__title"><?= $post->title;?></h2>
            <div class="postSingle__text">
              <?= $post->content;?>
            </div>
          </div>
        </div>
    </div>
</section>
 <section class="information">
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
          <div class="information__content">
            <div class="information__img" style="background-image: url(../../img/conference/info1.png);"></div>
            <div class="information__info">
              <h2 class="information__title">Перспективы с нами</h2>
              <p class="information__text">Предварительное напряжение железобетонных конструкций строений посредством высокопрочной арматурой (канат, армоканат). Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку. Напряжение железобетонных конструкций строений посредством высокопрочной арматурой (канат, армоканат). Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку при меньшем расходе бетона и арматуры. Возможно выполнение пролетов больше, чем при классическом (не напряженном) варианте, например, 18-20 метров и более. Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку преимуществ.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="postSwitcher">
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

          <div class="postSwitcher__content">
            <div class="postSwitcher__item"> 
              <?php if($post->getPreviousId($post->id)): ?>                  
              <span>Предыдущая</span>
                <a class="postSwitcher__link" href="<?= Url::toRoute(['post/one', 'id' => $post->getPreviousId($post->id)]); ?>"> 
                  <h2><?= $post->viewOne($post->getPreviousId($post->id))->title; ?></h2>
                </a>
              <?php endif; ?>
            </div>
            <div class="postSwitcher__item">
              <?php if($post->getNextId($post->id)): ?>
              <span>Следующая</span>
              <a class="postSwitcher__link" href="<?= Url::toRoute(['post/one', 'id' => $post->getNextId($post->id)]); ?>"> 
                <h2><?= $post->viewOne($post->getNextId($post->id))->title; ?></h2>
              </a>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>