<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
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
<section class="navSolo">
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
              <img src="/img/logo.svg" alt="ИТП">
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
                    ['label' => 'Литература', 'url' => ['/book/index']],
                    ['label' => 'Конференции', 'url' => ['/conference/index']],
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
        </div>
      </div>
    </section>
<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
      <div class="l-container">
        <a href="index.html"><img src="/img/logo-hexagon.svg" alt="logo" class="footer__logo"></a>
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
                ['label' => 'Публикации', 'url' => ['/post/index']],
                ['label' => 'Литература', 'url' => ['/book/index']],
                ['label' => 'Конференции', 'url' => ['/conference/index']],
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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>