'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  mPageScroll2id = require('page-scroll-to-id'),
  imask = require('imask'),
  popup = require('jquery-popup-overlay');

jQuery(document).ready(function($) {
  // Toggle nav menu
  $('.nav-toggle').on('click', function (e) {
    e.preventDefault();
    $('.nav').toggleClass('open');
    $('.nav-overlay').toggleClass('is-active');
  });

  $('.nav-close, .nav-overlay').click(function(e) {
    e.preventDefault();
    $('.nav').toggleClass('open');
    $('.nav-overlay').toggleClass('is-active');
  });

  // Modal
  $('.modal').popup({
    transition: 'all 0.3s',
    onclose: function() {
      $(this).find('.wpcf7-not-valid-tip').remove();
      $(this).find('.wpcf7-response-output').hide();
    }
  });

  let tabs = function() {
    let tabNav = document.querySelectorAll('.services-tab__list li'),
      tabContent = document.querySelectorAll('.services-tab__content'),
      tabName;

    let selectTabNav = function() {
      tabNav.forEach(item => {
        item.classList.remove('is-active');
      });
      this.classList.add('is-active');
      tabName = this.getAttribute('data-tab-name');
      selectTabContent(tabName);
    };

    let selectTabContent = function(tabName) {
      tabContent.forEach(item => {
        item.id === tabName ? item.classList.add('is-active') : item.classList.remove('is-active');
      });
      if (window.innerWidth < 992) {
        $('html, body').animate({
          scrollTop: $('#' + tabName).offset().top
        }, 1000);
      }
    };

    tabNav.forEach(item => {
      item.addEventListener('click', selectTabNav);
    });

  };

  $('body').on('click', '.load-news', function(e) {
    e.preventDefault();
    $(this).text('Загружаю...');

    let data = {
      'action': 'load_more_post',
      'query': true_posts,
      'page' : current_page
    };
    $.ajax({
      url: window.wp_data.ajax_url, // обработчик
      data: data, // данные
      type: 'POST', // тип запроса
      beforeSend: function() {
        $('#response').addClass('active');
      },
      success:function(data){
        if( data ) {
          $('.load-news').text('Смотреть еще'); // вставляем новые посты
          $('#response').append(data);
          $('#response').removeClass('active');
          current_page++; // увеличиваем номер страницы на единицу
          if (current_page == max_pages) $('.load-news').parent().remove(); // если последняя страница, удаляем кнопку
          $('.modal').popup({
            transition: 'all 0.3s',
            onclose: function() {
              $(this).find('.wpcf7-not-valid-tip').remove();
              $(this).find('.wpcf7-response-output').hide();
            }
          });
        } else {
          $('.load-news').parent().remove(); // если мы дошли до последней страницы постов, скроем кнопку
        }
      }
    });
  });

  let contactForm = function() {
    $('.contact-form').each(function() {
      let submit = $(this).find('[type="submit"]');
      let button = $(this).find('[data-contact-btn] button');

      if (submit.length) {
        button.find('.text').html(submit.val());
        submit.replaceWith(button);
        $(this).find('.ajax-loader').remove();
      }
    });

    // Loader
    $('.contact-form form').on('submit', function () {
      let btn = $(this).find('.btn');

      if (btn.hasClass('btn-link')) {
        btn.addClass("btn-loading");
        btn.find('.text').css('display', 'none');
      } else {
        btn.addClass("btn-loading");
      }
    });

    $('.wpcf7').on('wpcf7spam wpcf7invalid wpcf7mailsent wpcf7mailfailed', function (e) {
      let form = $('.contact-form');
      $(form).find('.btn').removeClass("btn-loading");
    });
  };

  $('.order-vacancy_open').click(function() {
    let title = $(this).parent().parent().find('.vacancy-card__title').text();
    $('#order-vacancy form').find('input[name="vacancy-name"]').val(title);
  });

  $('.scroll-nav a, .nav-list a').mPageScroll2id({
    highlightSelector: '.scroll-nav a',
    forceSingleHighlight: true,
    onStart:function(){
      $('.nav').removeClass('open');
      $('.nav-overlay').removeClass('is-active');
    },
  });

  let inputMask = function() {
    let inputMask = $('input[type="tel"]');
    let maskOptions = {
      mask: '+{7} (000) 000-00-00'
    };

    if (inputMask.length) {
      inputMask.each(function(i, el) {
        IMask(el, maskOptions);
      });
    }

  };

  contactForm();
  tabs();
  inputMask();

  // SVG
  svg4everybody({});
});