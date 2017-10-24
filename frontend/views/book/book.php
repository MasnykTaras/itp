<?php 
  use app\models\Book; 
  use  yii\helpers\Url;
?>
<section class="bookSingle">
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
          <div class="bookSingle__content">
            <div class="bookSingle__img">
              <img src="<?='/uploads/' . $book['image']; ?>" alt="book">
            </div>
            <div class="bookSingle__info">
              <h1 class="bookSingle__title"><?= $book['title']; ?></h1>
              <div class="bookSingle__details">
                <p>
                  <span>Author</span>
                  <span><?= $book['author']; ?></span>
                </p>
                <p>
                  <span>высокопрочной</span>
                  <span>посредством </span>
                </p>
              </div>

              <p class="bookSingle__text"><?= $book['content']; ?></p>                     
              <a class="bookSingle__download" href="<?= '/uploads/book/' . $book['file'];?>" data-size="<?= Book::getFileInfo($book['file'])['type'] .' '. Book::getFileInfo($book['file'])['size']; ?>" download="">Скачать</a>
            </div>
          </div>
          <div class="bookSimilar">
            <h2 class="bookSimilar__title">Похожие книги</h2>
            <ul class="bookSimilar__items">
            <?php foreach($related as $book): ?>
              <li class="bookSimilar__item">
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
          </div>
        </div>
      </div>
    </section>