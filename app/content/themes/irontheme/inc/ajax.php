<?php
  function load_more_post(){
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';

    // обычно лучше использовать WP_Query, но не здесь
    query_posts( $args );
    // если посты есть
    if( have_posts() ) :

      // запускаем цикл
      while( have_posts() ): the_post();
        get_template_part( 'parts/news', 'card' );
      endwhile;

    endif;
    die();
  }
  add_action('wp_ajax_load_more_post', 'load_more_post');
  add_action('wp_ajax_nopriv_load_more_post', 'load_more_post');