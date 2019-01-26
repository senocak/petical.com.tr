(function ($) {
 "use strict";
 
/*---------------------------
	jQuery MeanMenu
----------------------------- */
	jQuery('nav#dropdown').meanmenu();	
/*----------------------------
	wow js active
------------------------------ */
	new WOW().init();
/*----------------------------
	owl active
------------------------------ */  
  $(".product-owl-active").owlCarousel({
      autoPlay: true, 
	  slideSpeed:2000,
	  pagination:true,
	  navigation:true,	  
      items : 4,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,2],
	  itemsMobile : [767,1],
  });
  
/*----------------------------
	owl active product-owl-active-2
------------------------------ */  
  $(".product-owl-active-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 3,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1199,2],
	  itemsDesktopSmall : [980,2],
	  itemsTablet: [768,2],
	  itemsMobile : [767,1],
  });
  
/*----------------------------
	owl active
------------------------------ */  
  $(".bestsellerproductslider-list").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 4,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,2],
	  itemsTablet: [767,1],
  });
  
 /*----------------------------
	owl active
------------------------------ */  
  $(".home-sidebar").owlCarousel({
      autoPlay: false, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 3,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1199,2],
	  itemsDesktopSmall : [980,2],
	  itemsTablet: [768,1],
	  itemsTablet: [767,1],
  });
 
/*----------------------------
	owl active blog
------------------------------ */  
  $(".blog-list").owlCarousel({
      autoPlay: true, 
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,	  
      items : 2,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,2],
	  itemsDesktopSmall : [980,2],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1],
  });
/*----------------------------
	owl active testimonials
------------------------------ */  
  $(".testimonials-list").owlCarousel({
      autoPlay: false, 
	  slideSpeed:1500,
	  pagination:true,
	  navigation:false,	  
      items : 1,
	  transitionStyle : "backSlide", /* [This code for animation ] */	  
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,1],
	  itemsDesktopSmall : [980,1],
	  itemsTablet: [768,1],
	  itemsMobile : [479,1],
  });
/*----------------------------
	owl active Brands
------------------------------ */  
  $(".brands-list").owlCarousel({
      autoPlay: false, 
	  slideSpeed:1500,
	  pagination:false,
	  navigation:true,
	  loop: true,
      items : 5,
	  /*transitionStyle : "backSlide",*/ /* [This code for animation ] */	  
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,2],
	  itemsMobile : [479,1],
  });
/*----------------------------
	owl active bestseller-sldier-2
------------------------------ */  
  $(".bestseller-sldier-2").owlCarousel({
      autoPlay: false, 
	  slideSpeed:1500,
	  pagination:false,
	  navigation:true,
	  loop: true,
      items : 2,
	  /*transitionStyle : "backSlide",*/ /* [This code for animation ] */	  
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,2],
	  itemsDesktopSmall : [980,2],
	  itemsTablet: [768,2],
	  itemsMobile : [767,1],
  });
/*----------------------------
	owl active blog-list-2
------------------------------ */  
  $(".blog-list-2").owlCarousel({
      autoPlay: true, 
	  slideSpeed:1500,
	  pagination:false,
	  navigation:true,
	  loop: true,
      items : 3,
	  /*transitionStyle : "backSlide",*/ /* [This code for animation ] */	  
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,2],
	  itemsDesktopSmall : [980,2],
	  itemsTablet: [768,2],
	  itemsMobile : [767,1],
  });
/*----------------------------
	owl active blog-list-2
------------------------------ */  
  $(".blog-list-4").owlCarousel({
      autoPlay: true, 
	  slideSpeed:1500,
	  pagination:false,
	  navigation:true,
	  loop: true,
      items : 1,
	  /*transitionStyle : "backSlide",*/ /* [This code for animation ] */	  
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	  itemsDesktop : [1199,1],
	  itemsDesktopSmall : [980,1],
	  itemsTablet: [768,1],
	  itemsMobile : [767,1],
  });
/*----------------------------
	price-slider active
------------------------------ */  
	  $( "#slider-range" ).slider({
	   range: true,
	   min: 40,
	   max: 600,
	   values: [ 60, 570 ],
	   slide: function( event, ui ) {
		$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
	   }
	  });
	  $( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
	   " - £" + $( "#slider-range" ).slider( "values", 1 ) );  
	   
/*--------------------------
	scrollUp
---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
	   
/*--------------------------
	Category Menu
---------------------------- */	
	 $('.rx-parent').on('click', function(){
		$('.rx-child').slideToggle();
		$(this).toggleClass('rx-change');
		
	});

	$(".embed-responsive iframe").addClass("embed-responsive-item");
	$(".carousel-inner .item:first-child").addClass("active");
	
/*--------------------------
	category left menu
---------------------------- */	
	 $('.category-heading').on('click', function(){
	 $('.category-menu-list').slideToggle(300);
	});	  
/* --------------------------------------------------------
	FAQ-accordion
* -------------------------------------------------------*/ 
  $('.panel-heading a').on('click', function() {
    $('.panel-default').removeClass('actives');
    $(this).parents('.panel-default').addClass('actives');
  });
/*----------------------------
	header-product-category
------------------------------*/
  $(".cate-toggler").on('click', function(){
      $(".product-category ul").toggle();
  });

 /*----------------------------
	category-saide-bar-togle
------------------------------- */
  $(".morecate").on('click', function(){
      $(".lesscate").css("display","block");
      $(this).hide();
  });
  $(".lesscate").on('click', function(){
      $(".morecate").css("display","block");
      $(this).hide();
  });

  $(".catemenu-toggler").on('click', function(){
      $(".category-saidebar").toggle();
  });
/*----------------------------
	category-saide-bar-togle
------------------------------ */
$('[data-toggle="tooltip"]').tooltip()
/*---------------------
	Mobile menu
--------------------- */
$('nav#mobile-menu').meanmenu();
/*---------------------
	mixItUp
--------------------- */
$('.project-list-filter-active').mixItUp();

/*---------------------
	venobox
--------------------- */
    $('.venobox').venobox(); 
/* ----------------------------
	payment-accordion
* ----------------------------*/ 
	$(".payment-accordion").collapse({
		accordion:true,
	  open: function() {
		this.slideDown(550);
	  },
	  close: function() {
		this.slideUp(550);
	  }		
	});  
/*---------------------------------
	showlogin toggle function
-----------------------------------*/
	 $( '#showlogin' ).on('click', function() {
        $( '#checkout-login' ).slideToggle(900);
     }); 
/*----------------------------------
	showcoupon toggle function
------------------------------------*/
	 $( '#showcoupon' ).on('click', function() {
        $( '#checkout_coupon' ).slideToggle(900);
     });
/*------------------------------------------
	Create an account toggle function
--------------------------------------------*/
	 $( '#cbox' ).on('click', function() {
        $( '#cbox_info' ).slideToggle(900);
     });
	 
/*------------------------------------------
	Create an account toggle function
---------------------------------------------*/
	 $( '#ship-box' ).on('click', function() {
        $( '#ship-box-info' ).slideToggle(1000);
     });		 
/*------------------------------
	post-slider
-------------------------------- */
  $(".post-slider").owlCarousel({
      autoPlay: 3000,
	  slideSpeed:2000,
      items : 1,
	  pagination:true,
	  navigation:true,
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,1],
      itemsDesktopSmall : [979,1],
	  itemsTablet: [600,1],
	  itemsMobile : [767,1]
  });  

})(jQuery); 