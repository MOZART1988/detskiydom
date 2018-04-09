'use strict';

import myModule from './module-to-import';

$(document).ready(function() {

  let mySwiper = new Swiper ('.top-slider .swiper-container', {
    // If we need pagination
    pagination: {
      el: '.top-slider .swiper-pagination',
      clickable: true
    }
  })

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

setTimeout(function(){
  	 
}, 2000)

$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  console.log(e.target); // newly activated tab
  galerySwiper1.update();
  galerySwiper2.update();
 
})


  // imported module
  myModule('myModule');
});
