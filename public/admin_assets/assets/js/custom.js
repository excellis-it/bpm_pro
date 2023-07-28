(function ($) {

  $.fn.menumaker = function (options) {

    var cssmenu = $(this), settings = $.extend({
      title: "Menu",
      format: "dropdown",
      sticky: false
    }, options);

    return this.each(function () {
      cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
      $(this).find("#menu-button").on('click', function () {
        $(this).toggleClass('menu-opened');
        var mainmenu = $(this).next('ul');
        if (mainmenu.hasClass('open')) {
          mainmenu.hide().removeClass('open');
        }
        else {
          mainmenu.show().addClass('open');
          if (settings.format === "dropdown") {
            mainmenu.find('ul').show();
          }
        }
      });

      cssmenu.find('li ul').parent().addClass('has-sub');

      multiTg = function () {
        cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
        cssmenu.find('.submenu-button').on('click', function () {
          $(this).toggleClass('submenu-opened');
          if ($(this).siblings('ul').hasClass('open')) {
            $(this).siblings('ul').removeClass('open').hide();
          }
          else {
            $(this).siblings('ul').addClass('open').show();
          }
        });
      };

      if (settings.format === 'multitoggle') multiTg();
      else cssmenu.addClass('dropdown');

      if (settings.sticky === true) cssmenu.css('position', 'fixed');

      resizeFix = function () {
        if ($(window).width() > 1024) {
          cssmenu.find('ul').show();
        }

        if ($(window).width() <= 1024) {
          cssmenu.find('ul').hide().removeClass('open');
        }
      };
      resizeFix();
      return $(window).on('resize', resizeFix);

    });
  };
})(jQuery);

(function ($) {
  $(document).ready(function () {

    $("#cssmenu").menumaker({
      title: "",
      format: "multitoggle"
    });

  });
})(jQuery);


/*----- slier --------*/

$('.slider').slick({
  autoplay: false,
  speed: 2000,
  lazyLoad: 'progressive',
  arrows: true,
  dots: false,
  prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
  nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
  responsive: [

    {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      }
    }
  ]
});

$('.slick-nav').on('click touch', function (e) {

  e.preventDefault();

  var arrow = $(this);

  if (!arrow.hasClass('animate')) {
    arrow.addClass('animate');
    setTimeout(() => {
      arrow.removeClass('animate');
    }, 2000);
  }

});

// deal-month-slide

$('.deal-month-slide').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 300,
  infinite: true,
  autoplaySpeed: 2000,
  autoplay: false,
  arrows: true,
  dots: false,
  prevArrow: '<div class="slick-nav prev-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
  nextArrow: '<div class="slick-nav next-arrow"><i></i><svg><use xlink:href="#circle"></svg></div>',
  responsive: [
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

// Top Products


$('.top-prods-slide').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  speed: 300,
  infinite: true,
  autoplaySpeed: 2000,
  autoplay: true,
  prevArrow: '<div class="slick-nav prev-arrow"><i class="fa-solid fa-arrow-left"></i></div>',
	nextArrow: '<div class="slick-nav next-arrow"><i class="fa-solid fa-arrow-right"></i></div>',
  responsive: [
    {
      breakpoint: 1500,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1300,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1199,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 800,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

// Review


$('.img_slide').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  centerMode: true,
  arrows: false,
  dots: false,
  speed: 300,
  centerPadding: '50px',
  infinite: true,
  autoplaySpeed: 5000,
  focusOnSelect: true,
  cssEase: 'linear',
  touchMove: true,
  autoplay: false,
  prevArrow: '<div class="slick-nav prev-arrow"><i class="fa-regular fa-arrow-right"></i></div>',
	nextArrow: '<div class="slick-nav next-arrow"><i class="fa-light fa-arrow-right"></i></div>',

  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    }
  ]
});


$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  infinite: true,
  dots: false,
  fade: true,
  autoplay: false,
  centerMode: true,
  asNavFor: '.slider-nav',
  responsive: [
    {
      breakpoint: 769,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false
      }
    }
  ]
});
$('.slider-nav').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  centerMode: true,
  centerPadding: '50px',
  infinite: true,
  focusOnSelect: true,
  dots: false,
  arrows: false,
   prevArrow: '<div class="slick-nav prev-arrow"><i class="fa-regular fa-arrow-right"></i></div>',
	nextArrow: '<div class="slick-nav next-arrow"><i class="fa-light fa-arrow-right"></i></div>',
  autoplay: false,
  cssEase: 'linear',
  touchMove: true
});







// Range
let min = 10;
let max = 100;

const calcLeftPosition = value => 100 / (100 - 10) *  (value - 10);

$('#rangeMin').on('input', function(e) {
  const newValue = parseInt(e.target.value);
  if (newValue > max) return;
  min = newValue;
  $('#thumbMin').css('left', calcLeftPosition(newValue) + '%');
  $('#min').html(newValue);
  $('#line').css({
    'left': calcLeftPosition(newValue) + '%',
    'right': (100 - calcLeftPosition(max)) + '%'
  });
});

$('#rangeMax').on('input', function(e) {
  const newValue = parseInt(e.target.value);
  if (newValue < min) return;
  max = newValue;
  $('#thumbMax').css('left', calcLeftPosition(newValue) + '%');
  $('#max').html(newValue);
  $('#line').css({
    'left': calcLeftPosition(min) + '%',
    'right': (100 - calcLeftPosition(newValue)) + '%'
  });
});


AOS.init();
