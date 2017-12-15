<?php 

  use yii\helpers\Url;
  use yii\widgets\LinkPager;
?>
<section class="publications">
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
          <div class="publications__content">
            <div class="publications__title">
              <h1><?php echo $content['title']; ?></h1>
              <div class="publications__sort">
                <a class="js-sortLinkDropdown">04.2017</a>
                <ul class="publications__dropdown dropdown">
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">04.2017</a>
                  </li>                  
                </ul>
              </div>
            </div>
            <div class="aboutExpanded__img prevuiw_image" style="background-image: url(/uploads/<?= $content['image']; ?>);"></div>
            <p class="publications__text"><?php echo $content['text']; ?></p>

            <div class="publications__items">
            <?php foreach($posts as $post ): ?> 
              
              <div class="publications__item post">
                <a href="<?= Url::toRoute(['post/one', 'id' => $post->id]); ?>" class="post__link">
                  <div class="post__preview">
                    <div class="post__img">
                      <img src="<?= '/uploads/' . $post->image; ?>" alt="img">
                    </div>
                    <span class="post__date"><?= $post->dateView($post->created); ?></span>
                  </div>
                  <h3 class="post__title"><?= $post->title; ?></h3>
                </a>                
                  <p class="post__text"><?= $post->shortContent($post->content); ?></p>                             
              </div>
          	<?php endforeach; ?>
            </div>
            <?php echo LinkPager::widget([
                'pagination' => $pages,
                
                'prevPageLabel' => false,  
                'nextPageLabel' => false, 
                'options' => [
                  'class' => 'pagers',
                ],
                'pageCssClass' => [
                  'class' => 'pagers__item',
                ],
                'linkOptions' => [
                  'class' => 'pagers__link',
                ],
              ]);
            ?>
          </div>
        </div>
      </div>
    </section>