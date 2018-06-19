'use strict';

import myModule from './module-to-import';

$(document).ready(function() {

  let mySwiper = new Swiper('.top-slider .swiper-container', {
    // If we need pagination
    pagination: {
      el: '.top-slider .swiper-pagination',
      clickable: true
    }
  })


  

  let storySwiper = new Swiper('.story-slider .swiper-container', {
    slidesPerView: 2,
    spaceBetween: 35,
    pagination: {
      el: '.story-slider .swiper-pagination',
      clickable: true
    },
    slidesPerGroup: 2,
    loopFillGroupWithBlank: true
  });


  

  let galerySwiper2 = new Swiper('#galery-slider2 .swiper-container', {
    slidesPerView: 4,
    spaceBetween: 10,
    navigation: {
      nextEl: '#galery-slider2 .swiper-button-next',
      prevEl: '#galery-slider2 .swiper-button-prev'
    },
    loop: true
  });

  let sideSwiper = new Swiper('.side-slider .swiper-container', {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
      el: '.side-slider .swiper-pagination',
      clickable: true
    },
    loop: true
  });

  if ($(document).width() < 1170 && $(document).width() > 993) {
    let newsSwiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 25,
      pagination: {
        el: '.news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 3,
      loopFillGroupWithBlank: true
    });
    let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 10,
      navigation: {
        nextEl: '#galery-slider1 .swiper-button-next',
        prevEl: '#galery-slider1 .swiper-button-prev'
      },
      loop: true
    });
    let newsInnerSwiper = new Swiper('.inner-news-slider .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 35,
      pagination: {
        el: '.inner-news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 2,
      loopFillGroupWithBlank: true
    });
  } else if ($(document).width() < 992 && $(document).width() > 767) {
    let newsSwiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 25,
      pagination: {
        el: '.news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 3,
      loopFillGroupWithBlank: true
    });
    let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 10,
      navigation: {
        nextEl: '#galery-slider1 .swiper-button-next',
        prevEl: '#galery-slider1 .swiper-button-prev'
      },
      loop: true
    });
    let newsInnerSwiper = new Swiper('.inner-news-slider .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 35,
      pagination: {
        el: '.inner-news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 3,
      loopFillGroupWithBlank: true
    });
   } else if ($(document).width() < 768 && $(document).width() > 640) {
      let newsSwiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 25,
      pagination: {
        el: '.news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 3,
      loopFillGroupWithBlank: true
    });
    let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 10,
      navigation: {
        nextEl: '#galery-slider1 .swiper-button-next',
        prevEl: '#galery-slider1 .swiper-button-prev'
      },
      loop: true
    });
    let newsInnerSwiper = new Swiper('.inner-news-slider .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 35,
      pagination: {
        el: '.inner-news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 2,
      loopFillGroupWithBlank: true
    });

  } else if ($(document).width() < 641 && $(document).width() > 480) {
    console.log('here');
    let newsSwiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 25,
      pagination: {
        el: '.news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 2,
      loopFillGroupWithBlank: true
    });
    let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 10,
      navigation: {
        nextEl: '#galery-slider1 .swiper-button-next',
        prevEl: '#galery-slider1 .swiper-button-prev'
      },
      loop: true
    });
    let newsInnerSwiper = new Swiper('.inner-news-slider .swiper-container', {
      slidesPerView: 1,
      spaceBetween: 35,
      pagination: {
        el: '.inner-news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 1,
      loopFillGroupWithBlank: true
    });
    let storySwiper = new Swiper('.story-slider .swiper-container', {
      slidesPerView: 1,
      spaceBetween: 35,
      pagination: {
        el: '.story-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 1,
      loopFillGroupWithBlank: true
    });
  } else if ($(document).width() < 481) {
    let newsSwiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 1,
      spaceBetween: 25,
      pagination: {
        el: '.news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 1,
      loopFillGroupWithBlank: true
    });
    let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '#galery-slider1 .swiper-button-next',
        prevEl: '#galery-slider1 .swiper-button-prev'
      },
      loop: true
    });
    let newsInnerSwiper = new Swiper('.inner-news-slider .swiper-container', {
      slidesPerView: 2,
      spaceBetween: 35,
      pagination: {
        el: '.inner-news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 2,
      loopFillGroupWithBlank: true
    });
  } else {
    let newsSwiper = new Swiper('.news-slider .swiper-container', {
      slidesPerView: 4,
      spaceBetween: 35,
      pagination: {
        el: '.news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 4,
      loopFillGroupWithBlank: true
    });

    let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 4,
      spaceBetween: 10,
      navigation: {
        nextEl: '#galery-slider1 .swiper-button-next',
        prevEl: '#galery-slider1 .swiper-button-prev'
      },
      loop: true
    });
    let newsInnerSwiper = new Swiper('.inner-news-slider .swiper-container', {
      slidesPerView: 3,
      spaceBetween: 35,
      pagination: {
        el: '.inner-news-slider .swiper-pagination',
        clickable: true
      },
      slidesPerGroup: 3,
      loopFillGroupWithBlank: true
    });
  }


  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
    console.log(e.target); // newly activated tab
      let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
          slidesPerView: 4,
          spaceBetween: 10,
          navigation: {
              nextEl: '#galery-slider1 .swiper-button-next',
              prevEl: '#galery-slider1 .swiper-button-prev'
          },
          loop: true
      });
    galerySwiper1.update();
    galerySwiper2.update();

  })

  $("[data-fancybox]").fancybox({
    buttons: [
      // "zoom",
      //"share",
      //"slideShow",
      //"fullScreen",
      //"download",
      // "thumbs",
      "close"
    ],
    loop: true,
    baseTpl: '<div class="fancybox-container" role="dialog" tabindex="-1">' +
      '<div class="fancybox-bg"></div>' +
      '<div class="fancybox-inner">' +
      '<div class="fancybox-infobar">' +
      "<span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span>" +
      "</div>" +
      '<div class="fancybox-toolbar">{{buttons}}</div>' +
      '<div class="fancybox-navigation">{{arrows}}</div>' +
      '<div class="fancybox-stage">' + '<div class="fancybox-caption"></div>' + '</div>' +
      "</div>" +
      "</div>"
  });


  // imported module
  myModule('myModule');

  $('body').on('beforeSubmit', '#sidebar-contact-widget', function() {
    var form = $(this);
    $.ajax({
      url: form.attr('action'),
      type: 'POST',
      dataType: 'JSON',
      data: form.serialize(),
      beforeSend: function() {

      },
      success: function(data) {
        if (data.success == true) {
          $('.feedback-form, .contact-form').html('<h3>Спасибо за Ваше сообщение!</h3>');
        }
      },
      error: function(data) {
        $('.feedback-form, .contact-form').html('<h3>Произошла ошибка сервера, попробуйте позже!</h3>');
      }
    });

    return false;
  });

  $('.toggle-dropdown').on('click', function(e) {
    e.preventDefault();
    $('.menu-dropdown--list').toggleClass('open');
  })
});
