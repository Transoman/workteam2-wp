<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <button type="button" class="nav-toggle">
        <span class="nav-toggle__line"></span>
      </button>

      <div class="logo header__logo">
        <?php the_custom_logo(); ?>
        <p class="logo__descr">Кадровый аутсорсинг & колсантинг</p>
      </div>
      
      <div class="phone header__phone">
        <div class="phone__item">
          <a href="tel:<?php echo preg_replace( '![^0-9\+]+!', '', get_field('phone_1', 'option') ); ?>" class="phone__tel"><?php the_field('phone_1', 'option'); ?></a>
          <p class="phone__descr"><?php the_field('phone_descr_1', 'option'); ?></p>
        </div>
        <div class="phone__item">
          <a href="tel:<?php echo preg_replace( '![^0-9\+]+!', '', get_field('phone_2', 'option') ); ?>" class="phone__tel"><?php the_field('phone_2', 'option'); ?></a>
          <p class="phone__descr"><?php the_field('phone_descr_2', 'option'); ?></p>
        </div>
      </div>

      <a href="#" class="btn header__btn consultation_open">Заказать консультацию</a>

      <div class="nav">
        <button type="button" class="nav-close"></button>
        <ul class="nav-list">
          <li>
            <a href="#about">О компании</a>
          </li>
          <li>
            <a href="#services">Услуги</a>
          </li>
          <li>
            <a href="#vacancy">Вакансии</a>
          </li>
          <li>
            <a href="#partners">Партнеры</a>
          </li>
          <li>
            <a href="#news">Новости</a>
          </li>
          <li>
            <a href="#contact">Контакты</a>
          </li>
        </ul>
      </div>
      <div class="nav-overlay"></div>

    </div>
  </header><!-- /.header-->

  <div class="content">