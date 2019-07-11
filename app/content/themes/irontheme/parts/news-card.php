<?php $id = uniqid(); ?>
<div class="col-md-6 col-lg-4">
  <div class="news-card">
    <div class="news-card__img-wrap">
      <a href="#" class="news-<?php echo $id; ?>_open">
        <?php the_post_thumbnail('news-card'); ?>
      </a>
    </div>
    <time class="news-card__publish" datetime="<?php echo get_the_time('Y-m-d'); ?>"><?php echo get_the_time('d F Y'); ?></time>
    <h3 class="news-card__title"><a href="#" class="news-<?php echo $id; ?>_open"><?php the_title(); ?></a></h3>
    <a href="#" class="link-more news-<?php echo $id; ?>_open">
      Подробнее
      <?php ith_the_icon('arrow-right'); ?>
    </a>
  </div>

  <div id="news-<?php echo $id; ?>" class="modal modal--news">
    <button type="button" class="modal__close news-<?php echo $id; ?>_close"></button>

    <div class="news-card__img-wrap">
      <?php the_post_thumbnail('full'); ?>
    </div>
    <h3 class="news-card__title"><?php the_title(); ?></h3>
    <div class="news-card__content"><?php the_content(); ?></div>

  </div>

</div>