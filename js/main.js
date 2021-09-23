$('.offer_slider').slick({
  infinite: true,
  arrows:false,
  dots: true,
  autoHeight: true
});

$('.sales_slider_wrap').slick({
  infinite: true,
  arrows:false,
  dots: true,
  slidesToShow: 2,
  slidesToScroll: 2,
  responsive: [
      {
        breakpoint: 1180,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
    ]
});
$('.sliderprood').slick({
  infinite: true,
  arrows:true,
  dots: false,
  slidesToShow: 3,
  slidesToScroll: 2,
    autoHeight: true,
	dots: true,
  responsive: [
      {
        breakpoint: 1180,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
		  dots: true,
        }
      },
    ]
});

function stickyHeader() {
	var trigger = document.querySelector('.trigger');
	var nav = document.querySelector('nav');
	if (trigger.getBoundingClientRect().top <= 0) {
		nav.classList.add('nav-fixed')
	}
	else {
		nav.classList.remove('nav-fixed')

	}
}

document.addEventListener('scroll', stickyHeader)

function navToggler(e){
	if (e.target.classList.contains('menu_btn')) {
		document.querySelector('.nav').classList.toggle('active')
		e.target.classList.toggle('active')
	}
}
document.addEventListener('click', navToggler)


if (document.querySelector('.amount-input') && document.querySelector('.card_main-counter')) {
  var amount = 0;
  var price = document.querySelector('.amount-input').value;
  var number = document.querySelector('.card_main-counter').value;

  function priceControls(e) {
    if (event.type == 'click') {
      if (e.target.classList.contains('card_main-counter_btn')) {
        var input = e.target.parentNode.querySelector('input')
        var value = input.value
        if (e.target.classList.contains('card_main-counter_plus')) {
          value++
          if (value >= 99) {
            value = 99
          }
          input.value = value
          number = value
        }
        if (e.target.classList.contains('card_main-counter_minus')) {
          value--
          if (value <= 1) {
            value = 1
          }
          input.value = value
          number = value
        }
      }
    }
    if (event.type == 'change') {
      if (e.target.name == 'size') {
        price = parseInt(e.target.value)
      }
    }
    if (event.type == 'input') {
      if (e.target.name == 'counter') {
        if (e.target.value == '' || e.target.value == '0') {
          e.target.value = 1
        }
        number = parseInt(e.target.value)
      }
    }

    var amount = price * number
    document.querySelector('.amount-input').value = amount;
    document.querySelector('.card_main-amount').innerText = amount;
  }

  document.addEventListener('click', priceControls)
  document.addEventListener('change', priceControls)
  document.addEventListener('input', priceControls)
}
$(function() {
		var pathname_url = window.location.pathname;
		var href_url = window.location.href;
		$(".nav.d-flex li").each(function () {
			var link = $(this).find("a").attr("href");
			if(pathname_url == link || href_url == link) {
				$(this).addClass("active");
			}
		});
	});
		$(function() {
		var pathname_url = window.location.pathname;
		var href_url = window.location.href;
		$(".header_nav.d-flex li").each(function () {
			var link = $(this).find("a").attr("href");
			if(pathname_url == link || href_url == link) {
				$(this).addClass("active");
			}
		});
	});
	$(document).ready(function(){
$('ul.catalog-section-list-tile-list.row.mb-4 li a').each(function () {
        var location = window.location.href;
        var link = this.href; 
        if(location == link) {
            $(this).addClass('act');
        }
    });
});
	$(document).ready(function(){
$('ul.catalog-section-list-tile-list.row.mb-4 li a').each(function () {
        var location = window.location.href;
        var link = this.href; 
        if(location == link) {
            $(this).addClass('actrrr');
        }
    });
});
        var lightbox = GLightbox();
        var lightboxDescription = GLightbox({
            selector: 'glightbox',
        });