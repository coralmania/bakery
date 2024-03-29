 AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });

jQuery(document).ready(function($) {

	"use strict";


  // loader
  var loader = function() {
    setTimeout(function() {
      if($('#loader').length > 0) {
        $('#loader').removeClass('show');
      }
    }, 1);
  };
  loader();



	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
		});


		setTimeout(function() {

			var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);

        $this.prepend('<span class="arrow-collapse collapsed">');

        $this.find('.arrow-collapse').attr({
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();

    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		})

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	};
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	siteSliderRange();



	var siteCarousel = function () {

		if ( $('.hero-slide').length > 0 ) {
			$('.hero-slide').owlCarousel({
				items: 1,
				loop: true,
				margin: 0,
				autoplay: true,
				nav: true,
				dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
				smartSpeed: 1000
			});
		}

		if ( $('.owl-slide-3').length > 0 ) {
			$('.owl-slide-3').owlCarousel({
				center: false,
				items: 1,
				loop: true,
				stagePadding: 0,
				margin: 30,
				autoplay: true,
				smartSpeed: 500,
				nav: true,
				dots: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
				responsive:{
					600:{
						items: 2
					},
					1000:{
						items: 2
					},
					1200:{
						items: 3
					}
				}
			});
		}

		if ( $('.owl-slide').length > 0 ) {
			$('.owl-slide').owlCarousel({
		    center: false,
		    items: 2,
		    loop: true,
				stagePadding: 0,
		    margin: 30,
		    autoplay: true,
		    nav: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{

	        	nav: true,
	          items: 2
	        },
	        1000:{

	        	stagePadding: 0,
	        	nav: true,
	          items: 2
	        },
	        1200:{

	        	stagePadding: 0,
	        	nav: true,
	          items: 2
	        }
		    }
			});
		}


		if ( $('.nonloop-block-14').length > 0 ) {
			$('.nonloop-block-14').owlCarousel({
		    center: false,
		    items: 1,
		    loop: true,
				stagePadding: 0,
		    margin: 0,
		    autoplay: true,
		    nav: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	        	margin: 20,
	        	nav: true,
	          items: 2
	        },
	        1000:{
	        	margin: 30,
	        	stagePadding: 0,
	        	nav: true,
	          items: 2
	        },
	        1200:{
	        	margin: 30,
	        	stagePadding: 0,
	        	nav: true,
	          items: 3
	        }
		    }
			});
		}

		$('.slide-one-item').owlCarousel({
			center: false,
			items: 1,
			loop: true,
			stagePadding: 0,
			margin: 0,
			autoplay: true,
			pauseOnHover: false,
			nav: true,
			navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
		});
	};
	siteCarousel();

	var siteStellar = function() {
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();

	var siteCountDown = function() {

		$('#date-countdown').countdown('2020/10/10', function(event) {
		  var $this = $(this).html(event.strftime(''
		    + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
		    + '<span class="countdown-block"><span class="label">%d</span> days </span>'
		    + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
		    + '<span class="countdown-block"><span class="label">%M</span> min </span>'
		    + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
		});

	};
	siteCountDown();

	var siteDatePicker = function() {

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();

	var siteSticky = function() {
		$(".js-sticky-header").sticky({topSpacing:0});
	};
	siteSticky();

	// navigation
  var OnePageNavigation = function() {
    var navToggler = $('.site-menu-toggle');
   	$("body").on("click", ".main-menu li a[href^='#'], .smoothscroll[href^='#'], .site-mobile-menu .site-nav-wrap li a", function(e) {
      e.preventDefault();

      var hash = this.hash;

      $('html, body').animate({
        'scrollTop': $(hash).offset().top
      }, 600, 'easeInOutCirc', function(){
        window.location.hash = hash;
      });

    });
  };
//   OnePageNavigation();

  var siteScroll = function() {



  	$(window).scroll(function() {

  		var st = $(this).scrollTop();

  		if (st > 100) {
  			$('.js-sticky-header').addClass('shrink');
  		} else {
  			$('.js-sticky-header').removeClass('shrink');
  		}

  	})

  };
	siteScroll();


	$(function () {
    var alert = $('.alert');
		if (alert.length) {
      setTimeout(function (){
        alert.fadeOut(300);
      },2000)
    }
	});


});
var currentPage = 'all';

function changeContent(obj, first = false){
  console.log(obj);
  page = obj;
  if (currentPage != page || first) {
    var x = document.querySelector('li[data-id="'+currentPage+'"]');
    console.log(x);
    x.classList.remove('selected');
    var y = document.querySelector('li[data-id="'+page+'"]');
    y.classList.add('selected');
    currentPage = page;
    $.ajax({
      url:'server/getProdects.php',
      data:{category:page},
      type:'post',
      dataType:'json',
      success:function (res){
        replaceContent(res);
      }
    })
  }
}

function addToCart(obj){
  $.ajax({
    url: 'addToCart.php',
    type: 'POST',
    data: { product: obj.getAttribute("data-name") },
    success: function(res) {
      // console.log(res);
      window.location.reload();
    }
  })
}

function replaceContent(data){
  var wrapper = $('.container-fluid');
  wrapper.hide(300);
  wrapper.html('');
  var content = '';
  for (var i = 0; i < data.length; i++) {
    content += '<div class="col-lg-4 mb-4 col-md-4" style="display:inline-block"><div class="wine_v_1 text-center pb-4"><img class="img_product"  src="images/'+data[i].image+'" alt="Image" class="img-fluid">  <div>  <h3 class="heading mb-1">'+data[i].item_name+'</h3><span class="price">₪ '+data[i].price+'</span></div><div class="wine-actions"><h3 class="heading-2"><a>'+data[i].item_description+'</a></h3><span class="price d-block">'+data[i].price+'&#8362;</span>  <div class="rating">  <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star-o"></span></div>'+
    '<a  data-name="'+data[i].item_name+'" class="prevent product-add-to-cart btn add" onclick="addToCart(this)">הוסף לסל</a></span>'+
    '</div></div></div>';
  }
  wrapper.html(content);
  wrapper.fadeIn(300);
}


function subCategoryChange(obj){
  var subCategoryBox = $('#subCategory');
  subCategoryBox.hide();
  var strUser = obj.options[obj.selectedIndex].value;
  var subCategoryOptions = $('#subCategoryOptions');
  subCategoryOptions.html('');
  if (strUser) {
    switch (strUser) {
      case 'pro':
		$('#subCategoryOptions').append('<option  class="subCategoryOptionsPro" value="שמרים">שמרים</option>');
		$('#subCategoryOptions').append('<option class="subCategoryOptionsPro" value="חלות לשבת">חלות לשבת</option>');
		$('#subCategoryOptions').append('<option class="subCategoryOptionsPro" value="בצק עלים למומחים">בצק עלים למומחים</option>');
        break;
      case 'private':
        $('#subCategoryOptions').append('<option  class="subCategoryOptionsPro" value="סדנת רווקות">סדנת רווקות</option>');
		$('#subCategoryOptions').append('<option  class="subCategoryOptionsPro" value="בישול ואפיה">בישול ואפיה</option>');
		$('#subCategoryOptions').append('<option class="subCategoryOptionsPro" value="יום הולדת">יום הולדת</option>')
        break;
      case 'parents':
        $('#subCategoryOptions').append('<option  class="subCategoryOptionsPro" value="סדנת שוקולד">סדנת שוקולד</option>');
        $('#subCategoryOptions').append('<option  class="subCategoryOptionsPro" value="סדנת קאפקייקס">סדנת קאפקייקס</option>');
        $('#subCategoryOptions').append('<option  class="subCategoryOptionsPro" value="בישול לקטנטנים">בישול לקטנטנים</option>');
        break;
      default:
    }
    subCategoryBox.show(300);
  }else{
    subCategoryBox.hide(300);

  }
}
