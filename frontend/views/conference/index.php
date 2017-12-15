<?php
/* @var $this yii\web\View */
	use app\models\Conference;
	use yii\helpers\Url;
	use yii\widgets\LinkPager;
?>
<section class="conferences">
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
                <a class="js-sortLinkDropdown" ><?php if($data){ echo $data; }else{ echo 'All'; } ?></a>
                <ul class="publications__dropdown dropdown">
                  <?php if($data): ?>
                    <li class="dropdown__item js-sortItemDropdown">
                      <a class="dropdown__link dropdown__link_big" href="<?= Url::to(['conference/index']); ?>" data-date="" >All</a>
                    </li>
                  <?php endif; ?>
                  <?php foreach(Conference::createDateArray() as $value): ?>
                    <li class="dropdown__item js-sortItemDropdown">
                      <a class="dropdown__link dropdown__link_big" href="<?= Url::to(['conference/index', 'data' => $value ]); ?>" data-date="<?= $value; ?>" ><?= $value; ?></a>
                    </li>
                  <?php endforeach; ?>                
                </ul>
              </div>
            </div>
            <div class="aboutExpanded__img prevuiw_image" style="background-image: url(/uploads/<?= $content['image']; ?>);"></div>
            <p class="conferences__text"><?php echo $content['text']; ?></p>
              <ul class="conferences__items">
                <?php foreach($conferences as $conference): ?>
                	<div class="conferences__item post">
                    <a href="<?= Url::toRoute(['conference/one', 'id' => $conference['id']]); ?>" class="post__link">
                      <div class="post__preview">
                        <div class="post__img">
                          <img src="<?= '/uploads/' . $conference['image']; ?>" alt="img">
                        </div>
                        <span class="post__date"></span>
                      </div>
                      <h3 class="post__title"><?= $conference['title']; ?></h3>
                    </a>         
                        
                     <p class="post__text"><?= Conference::shortContent($conference['content']); ?></p>
                  </div>
		            <?php endforeach; ?>
             	</ul>
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
