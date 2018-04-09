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
        clickable: true,
      },     
      slidesPerGroup: 4,
      loopFillGroupWithBlank: true
  });

  let galerySwiper1 = new Swiper('#galery-slider1 .swiper-container', {
      slidesPerView: 4,
      spaceBetween: 10,
	  navigation: {
	    nextEl: '#galery-slider1 .swiper-button-next',
	    prevEl: '#galery-slider1 .swiper-button-prev',
	  }, 
      loop: true
   });

  let galerySwiper2 = new Swiper('#galery-slider2 .swiper-container', {
      slidesPerView: 4,
      spaceBetween: 10,
	  navigation: {
	    nextEl: '#galery-slider2 .swiper-button-next',
	    prevEl: '#galery-slider2 .swiper-button-prev',
	  },        
      loop: true
   });

// $(".galery-slider .swiper-container").each(function(index, element){
//     var $this = $(this);
//     var galerySwiper = new Swiper(this, {
//     	slidesPerView: 4,
// 	    spaceBetween: 10,
// 		navigation: {
// 		  nextEl:  $this.find('.galery-slider .swiper-button-next')[0],
// 		  prevEl:  $this.find('.galery-slider .swiper-button-prev')[0],
// 		},  
// 	    slidesPerGroup: 4,
// 	    loopFillGroupWithBlank: true
//     });
// });

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

