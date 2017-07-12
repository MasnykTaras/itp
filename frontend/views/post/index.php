<?php 
  use app\models\Post;
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
              <h1>Публикации</h1>
              <div class="publications__sort">
                <a class="js-sortLinkDropdown">04.2017</a>
                <ul class="publications__dropdown dropdown">
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">04.2017</a>
                  </li>
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">03.2017</a>
                  </li>
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">02.2017</a>
                  </li>
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">01.2017</a>
                  </li>
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">12.2016</a>
                  </li>
                  <li class="dropdown__item js-sortItemDropdown">
                    <a class="dropdown__link dropdown__link_big" href="#">11.2016</a>
                  </li>
                </ul>
              </div>
            </div>
            <p class="publications__text">Предварительное напряжение железобетонных конструкций строений посредством высокопрочной арматурой (канат, армоканат). Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку при меньшем расходе бетона и арматуры.</p>
            <div class="publications__items">
            <?php foreach($posts as $post ): ?> 
              
              <div class="publications__item post">
                <a href="<?= Url::toRoute(['post/one', 'id' => $post->id]); ?>" class="post__link">
                  <div class="post__preview">
                    <div class="post__img">
                      <img src="<?='/uploads/' . $post->image; ?>" alt="img">
                    </div>
                    <span class="post__date"><?= Post::dateView($post->created); ?></span>
                  </div>
                  <h3 class="post__title"><?= $post->title; ?></h3>
                </a>                
                  <p class="post__text"><?= Post::shortContent($post->content); ?></p>                             
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