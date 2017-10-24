<?php 
	use app\models\Conference; 
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
              <img src="<?= '/uploads/' . $conference->image; ?>" alt="img">
            </div>
            <h2 class="postSingle__title"><?= $conference->title;?></h2>
            <div class="postSingle__text">
              <?= $conference->content;?>
            </div>
          </div>
        </div>
    </div>
</section>

    