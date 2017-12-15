<?php
/* @var $this yii\web\View */
	use app\models\Book;
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
         <div class="literatureList__content">
            <h1 class="literatureList__title"><?php echo $content['title']; ?></h1>
            <div class="aboutExpanded__img prevuiw_image" style="background-image: url(/uploads/<?= $content['image']; ?>);"></div>
            <p class="literatureList__text"><?php echo $content['text']; ?></p>
                <ul class="literatureList__items">

                <?php foreach($books as $book): ?>
                	<li class="literatureList__item">
		                <a href="<?= Url::toRoute(['book/one', 'id' => $book['id']]); ?>" class="book">
		                  <div class="book__img">
		                    <img src="<?='/uploads/' . $book['image']; ?>" alt="book">
		                  </div>
		                  <h4 class="book__title"><?= $book['title']; ?></h4>
		                  <div class="book__info">
		                    <span class="book__type"><?= Book::getFileInfo($book['file'])['type']; ?></span>
		                    <span class="book__size"><?= Book::getFileInfo($book['file'])['size']; ?></span>
		                  </div>
		                </a>
		              </li>
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
