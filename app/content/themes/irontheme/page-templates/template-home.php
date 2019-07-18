<?php
/**
 * Template Name: Главная
 */
get_header(); ?>

  <nav class="scroll-nav">
    <ul>
      <li>
        <a href="#hero">01</a>
      </li>
      <li>
        <a href="#about">02</a>
      </li>
      <li>
        <a href="#services">03</a>
      </li>
      <li>
        <a href="#vacancy">04</a>
      </li>
      <li>
        <a href="#partners">05</a>
      </li>
      <li>
        <a href="#news">06</a>
      </li>
      <li>
        <a href="#contact">07</a>
      </li>
    </ul>
  </nav>

<?php
if ( have_rows('home_layout') ):
  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

      <section class="hero" id="hero">
        <div class="container">
          <div class="hero__content">
            <?php if (get_sub_field('title')): ?>
              <h1><?php the_sub_field('title'); ?></h1>
            <?php endif; ?>

            <?php the_sub_field('text'); ?>
            <a href="#" class="btn btn--fill personal_open">
              заказать персонал
              <?php ith_the_icon('arrow-right', 'btn__icon'); ?>
            </a>
          </div>
        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/hero-img.svg" alt="" class="hero__float-img">

      </section>

    <?php elseif ( get_row_layout() == 'about' ): ?>

      <section class="about" id="about">
        <div class="container">
          <h2 class="section-title"><span><?php the_sub_field('title'); ?></span></h2>

          <div class="row">
            <div class="col-lg-6">
              <div class="about__left">
                <?php the_sub_field('text_left'); ?>
                <a href="#" class="link-more about-modal_open">
                  Подробнее
                  <?php ith_the_icon('arrow-right'); ?>
                </a>
                <div id="about-modal" class="modal modal--news">
                  <button type="button" class="modal__close about-modal_close"></button>

                  <h3 class="modal__title">О компании</h3>

                  <?php the_sub_field('text_modal'); ?>

                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="about__right">
                <?php the_sub_field('text_right'); ?>
              </div>
            </div>
          </div>

          <div class="about-adv">
            <div class="about-adv__item">
              <p>Ежедневный выход <br>сотрудников <br>более 1000 человек</p>
              <b class="about-adv__number">1000+</b>
            </div>
            <div class="about-adv__item">
              <p>Офисы и обособленные <br>подразделения  действуют <br>в 12 городах России</p>
              <b class="about-adv__number">12+</b>
            </div>
            <div class="about-adv__item">
              <p>Порядка 40 кадровых агенств <br>помогают нам подбирать <br>персонал</p>
              <b class="about-adv__number">40+</b>
            </div>
            <div class="about-adv__item">
              <p>Более 7 лет опыта <br>и лидерских достижений</p>
              <b class="about-adv__number">7+</b>
            </div>
          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/pic-1.svg" class="float-img float-img-1" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/pic-2.svg" class="float-img float-img-2" alt="">

      </section>

    <?php elseif ( get_row_layout() == 'services' ): ?>

      <section class="services" id="services">
        <div class="container">
          <h2 class="section-title"><span><?php the_sub_field('title'); ?></span></h2>

          <div class="row services-tab">

            <?php if (have_rows('list')): ?>
              <div class="col-lg-7">
                <?php $i = 0; while (have_rows('list')): the_row(); ?>
                  <div class="services-tab__content<?php echo $i == 0 ? ' is-active' : ''; ?>" id="serv-<?php echo $i++; ?>">
                    <?php echo wp_get_attachment_image(get_sub_field('img'), 'large', null, array('class' => 'services-tab__img')); ?>
                    <h3 class="services-tab__title"><?php the_sub_field('title'); ?></h3>
                    <?php the_sub_field('descr'); ?>
                    <a href="#" class="btn personal_open">
                      заказать персонал
                      <?php ith_the_icon('arrow-right', 'btn__icon'); ?>
                    </a>
                  </div>
                <?php endwhile; ?>
              </div>
            <?php endif; ?>

            <div class="col-lg-5">
              <?php if (have_rows('list')): ?>
                <ul class="services-tab__list">
                  <?php $i = 0; while (have_rows('list')): the_row(); ?>
                    <li<?php echo $i == 0 ? ' class="is-active"' : ''; ?> data-tab-name="serv-<?php echo $i++; ?>">
                      <div class="services-tab__list-inner">
                        <?php echo do_shortcode(get_sub_field('icon')); ?>
                        <span class="services-tab__list-title"><?php the_sub_field('title'); ?></span>
                      </div>
                    </li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>

              <div class="services__text">
                <p>Простыми словами, мы подбираем персонал по требованиям заказчика, оформляем в свой штат и рассчитываем размер заработной платы. Клиент устанавливает задачи рабочим и нормы выработки, а мы контролируем и гарантируем выполнение.</p>
              </div>

            </div>

          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/pic-3.svg" class="float-img float-img-3" alt="">

      </section>

    <?php elseif ( get_row_layout() == 'vacancy' ): ?>

      <section class="vacancy" id="vacancy">
        <div class="container">
          <h2 class="section-title"><span><?php the_sub_field('title'); ?></span></h2>

          <div class="vacancy__grid">

            <?php if (get_sub_field('title_1')): ?>
              <div class="vacancy-card">
                <p class="vacancy-card__label">вакансия</p>
                <h3 class="vacancy-card__title"><?php the_sub_field('title_1'); ?></h3>

                <?php if (get_sub_field('salary_1')): ?>
                  <div class="vacancy-card__price-wrap">
                    <span class="vacancy-card__price-plus"></span>
                    <p class="vacancy-card__price-label">зарплата</p>
                    <p class="vacancy-card__price">от <span><?php the_sub_field('salary_1'); ?></span> руб/час</p>
                    <a href="#" class="vacancy-card__price-order order-vacancy_open">Оставить заявку</a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php if (get_sub_field('title_2')): ?>
              <div class="vacancy-card vacancy-card--purple">
              <p class="vacancy-card__label">вакансия</p>
              <h3 class="vacancy-card__title"><?php the_sub_field('title_2'); ?></h3>

              <?php if (get_sub_field('salary_2')): ?>
                <div class="vacancy-card__price-wrap">
                <span class="vacancy-card__price-plus"></span>
                <p class="vacancy-card__price-label">зарплата</p>
                <p class="vacancy-card__price">от <span><?php the_sub_field('salary_2'); ?></span> руб/час</p>
                <a href="#" class="vacancy-card__price-order order-vacancy_open">Оставить заявку</a>
              </div>
              <?php endif; ?>
            </div>
            <?php endif; ?>

            <div class="vacancy__text">
              <?php the_sub_field('text'); ?>
              <a href="#" class="btn search-vacancy_open">
                найти вакансию
                <?php ith_the_icon('arrow-right', 'btn__icon'); ?>
              </a>
            </div>

            <?php if (get_sub_field('title_3')): ?>
              <div class="vacancy-card vacancy-card--pink">
                <p class="vacancy-card__label">вакансия</p>
                <h3 class="vacancy-card__title"><?php the_sub_field('title_3'); ?></h3>

                <?php if (get_sub_field('salary_3')): ?>
                  <div class="vacancy-card__price-wrap">
                    <span class="vacancy-card__price-plus"></span>
                    <p class="vacancy-card__price-label">зарплата</p>
                    <p class="vacancy-card__price">от <span><?php the_sub_field('salary_3'); ?></span> руб/час</p>
                    <a href="#" class="vacancy-card__price-order order-vacancy_open">Оставить заявку</a>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/pic-4.svg" class="float-img float-img-4" alt="">

      </section>

    <?php elseif( get_row_layout() == 'partners' ): ?>

      <section class="section partners" id="partners">
        <div class="container">
          <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

          <?php if (have_rows('list')): ?>
            <div class="partners-list row">
              <?php while (have_rows('list')): the_row();?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                  <div class="partners-list__item">
                    <?php echo wp_get_attachment_image(get_sub_field('logo'), 'medium'); ?>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

        </div>

      </section>

    <?php elseif( get_row_layout() == 'news' ): ?>

      <section class="section news" id="news">
        <div class="container">
          <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

          <?php $blog_posts = get_blog_posts(3);
          if ($blog_posts->have_posts()): ?>
            <div class="row" id="response">
              <?php while ($blog_posts->have_posts()): $blog_posts->the_post(); ?>
                <?php get_template_part('parts/news', 'card'); ?>
              <?php endwhile; wp_reset_postdata(); ?>

              <?php if ( $blog_posts->max_num_pages > 1 ) : ?>
                <script>
                  var true_posts = '<?php echo serialize($blog_posts->query_vars); ?>';
                  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                  var max_pages = '<?php echo $blog_posts->max_num_pages; ?>';
                </script>
                <div class="col-12 text-center">
                  <a href="#" class="btn load-news">
                    читать больше
                    <?php ith_the_icon('arrow-right', 'btn__icon'); ?>
                  </a>
                </div>
              <?php endif; ?>

            </div>
          <?php endif; ?>

        </div>

        <img src="<?php echo THEME_URL; ?>/images/general/pic-5.svg" class="float-img float-img-5" alt="">

      </section>

    <?php elseif( get_row_layout() == 'contact' ): ?>

      <section class="section contact" id="contact">
        <div class="container">

          <div class="row">
            <div class="col-lg-6">
              <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

              <div class="contact__content">
                <div class="contact__item">
                  <p class="contact__item-label">звоните:</p>
                  <?php if (get_sub_field('phone_1')): ?>
                    <a href="tel:<?php echo preg_replace( '![^0-9\+]+!', '', get_sub_field('phone_1') ); ?>"><?php the_sub_field('phone_1'); ?></a>
                    <span class="contact__item-descr"><?php the_sub_field('phone_descr_1'); ?></span><br>
                  <?php endif; ?>
                  <?php if (get_sub_field('phone_2')): ?>
                    <a href="tel:<?php echo preg_replace( '![^0-9\+]+!', '', get_sub_field('phone_2') ); ?>"><?php the_sub_field('phone_2'); ?></a>
                    <span class="contact__item-descr"><?php the_sub_field('phone_descr_2'); ?></span>
                  <?php endif; ?>
                </div>

                <div class="contact__item contact__item--email">
                  <p class="contact__item-label">пишите:</p>
                  <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                </div>

                <?php if (get_sub_field('address')): ?>
                  <div class="contact__item">
                    <p class="contact__item-label">Наш адрес:</p>
                    <p><?php the_sub_field('address'); ?></p>
                  </div>
                <?php endif; ?>

              </div>

            </div>

            <div class="col-lg-6">
              <div class="contact__map" id="contact-map"></div>
            </div>

          </div>

        </div>
        <script async src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&onload=init"></script>
        <script>
          <?php $location = get_sub_field('map'); ?>

          var myMap, myPlacemark,
            coords = [<?php echo esc_js($location['lat']); ?>, <?php echo esc_js($location['lng']); ?>];

          function init() {
            myMap = new ymaps.Map('contact-map', {
              center: coords,
              zoom: 17
            });

            myPlacemark = new ymaps.Placemark(coords, {
              preset: 'islands#circleDotIcon',
              iconColor: '#fe3334'
            });

            myMap.geoObjects.add(myPlacemark);
          }
        </script>

        <img src="<?php echo THEME_URL; ?>/images/general/pic-6.svg" class="float-img float-img-6" alt="">
        <img src="<?php echo THEME_URL; ?>/images/general/pic-7.svg" class="float-img float-img-7" alt="">

      </section>

    <?php endif;

  endwhile;

else :

  // no layouts found

endif;

?>

<?php get_footer(); ?>