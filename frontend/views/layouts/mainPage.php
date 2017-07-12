<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="siteWrapper">
<header class="header">
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
          <nav class="nav">
            <a class="nav__logo" href="/">
                  <img src="img/logo.svg" alt="ИТП">
            </a>
                <?php   
                $menuItems = [
                    ['label' => 'Об институте', 'url' => ['/site/about'], 'options' => ['class' => 'menu__item']],
                    ['label' => 'Услуги',
                        'options' => ['class' => 'menu__item_dropdown'],
                        'template' => '<a class="menu__link menu__link_dropdown js-menuLinkDropdown">{label}</a>',            
                        'items' => [
                            ['label' => 'Проектирование', 
                                'url' => ['/site/about'], 
                                'options' => ['class' => 'dropdown__item'], 
                                'template' => '<a class="dropdown__link" href="{url}">{label}</a>'],
                            ['label' => 'Испытания', 
                                'url' => ['/site/about'],
                                'options' => ['class' => 'dropdown__item'], 
                                'template' => '<a class="dropdown__link" href="{url}">{label}</a>'],
                        ]
                    ],
                    ['label' => 'Публикации', 'url' => ['/post/index']],
                    ['label' => 'Литература', 'url' => ['/site/book']],
                    ['label' => 'Конференции', 'url' => ['/post/index']],
                    ['label' => 'Контакты', 'url' => ['/site/contact']]
                ]; 
                echo Menu::widget([
                    'options' => ['class' => 'menu nav__menu'],
                    'items' => $menuItems,           
                    'itemOptions'=>['class'=>'menu__item'],
                    'submenuTemplate' => "<ul class='menu__dropdown menu__dropdown_top dropdown' role='menu'>{items}</ul>",
                    'linkTemplate' => '<a class="menu__link" href="{url}">{label}</a>'
            ]);
                ?>
            <div class="hamburger js-hamburger">
              <span class="hamburger__line"></span>
              <span class="hamburger__line"></span>
              <span class="hamburger__line"></span>
            </div>
          </nav>
          <div class="header__content">
            <div class="header__info">
              <h1 class="header__title">Институт Технологий<br>Преднапряжения</h1>
              <p class="header__text">Предварительное напряжение железобетонных конструкций строений посредством высокопрочной арматурой (канат, армоканат). Преднапряженная конструкция обладает рядом преимуществ: она несет проектную нагрузку при меньшем расходе бетона и арматуры.
              </p>
            </div>
            <div class="header__img" style="background-image: url(img/header-img.png);"></div>
          </div>
        </div>
    </div>
</header>
    <div class="container">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
<footer class="footer footer_subscribe">
  <div class="l-container">
    <a href="index.html"><img src="img/logo-hexagon.svg" alt="logo" class="footer__logo"></a>
    <?php   
        $menuItems = [
            ['label' => 'Об институте', 'url' => ['/site/about'], 'options' => ['class' => 'menu__item']],
            ['label' => 'Услуги',
                'options' => ['class' => 'menu__item_dropdown'],
                'template' => '<a class="menu__link js-menuLinkDropdown">{label}</a>',            
                'items' => [
                    ['label' => 'Проектирование', 
                        'url' => ['/site/about'], 
                        'options' => ['class' => 'dropdown__item'], 
                        'template' => '<a class="dropdown__link" href="{url}">{label}</a>'],
                    ['label' => 'Испытания', 
                        'url' => ['/site/about'],
                        'options' => ['class' => 'dropdown__item'], 
                        'template' => '<a class="dropdown__link" href="{url}">{label}</a>'],
                ]
            ],
            ['label' => 'Публикации', 'url' => ['/site/post']],
            ['label' => 'Литература', 'url' => ['/site/book']],
            ['label' => 'Конференции', 'url' => ['/site/post']],
            ['label' => 'Контакты', 'url' => ['/site/contact']]
        ]; 
        echo Menu::widget([
                'options' => ['class' => 'menu footer__menu menu_light'],
                'items' => $menuItems,           
                'itemOptions'=>['class'=>'menu__item'],
                'submenuTemplate' => "<ul class='menu__dropdown dropdown menu__dropdown_bottom' role='menu'>{items}</ul>",
                'linkTemplate' => '<a class="menu__link" href="{url}">{label}</a>'
        ]);
    ?>
    <p class="footer__copyright">© ИТП. Все права защищены. | 2017</p>
  </div>
</footer>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

