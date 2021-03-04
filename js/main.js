
$ = jQuery;

$(document).ready(function() {

		var w=$(window).outerWidth();
		var h=$(window).outerHeight();
		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE ");
		var isMobile = {Android: function() {return navigator.userAgent.match(/Android/i);},BlackBerry: function() {return navigator.userAgent.match(/BlackBerry/i);},iOS: function() {return navigator.userAgent.match(/iPhone|iPad|iPod/i);},Opera: function() {return navigator.userAgent.match(/Opera Mini/i);},Windows: function() {return navigator.userAgent.match(/IEMobile/i);},any: function() {return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());}};
	
	function isIE() {
		ua = navigator.userAgent;
		var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
		return is_ie; 
	}
	if(isIE()){
		$('body').addClass('ie');
	}
	if(isMobile.any()){
		$('body').addClass('touch');
	}


var isMobile = { Android: function () { return navigator.userAgent.match(/Android/i); }, BlackBerry: function () { return navigator.userAgent.match(/BlackBerry/i); }, iOS: function () { return navigator.userAgent.match(/iPhone|iPad|iPod/i); }, Opera: function () { return navigator.userAgent.match(/Opera Mini/i); }, Windows: function () { return navigator.userAgent.match(/IEMobile/i); }, any: function () { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); } };
if (isMobile.any()) { }

	if (location.hash) {
		var hsh = location.hash.replace('#', '');
		if ($('.popup-' + hsh).length > 0) {
			popupOpen(hsh);
		} else if ($('div.' + hsh).length > 0) {
			$('body,html').animate({ scrollTop: $('div.' + hsh).offset().top, }, 500, function () { });
		}
	}
	$('.wrapper').addClass('loaded');

	var act = "click";
	if (isMobile.iOS()) {
		var act = "touchstart";  
	}


//BURGER
let iconMenu = document.querySelector(".icon-menu");  
let body = document.querySelector("body");
let menuBody = document.querySelector(".mob-menu");
if (iconMenu) {
	iconMenu.addEventListener("click", function () { 
		iconMenu.classList.toggle("active");
		body.classList.toggle("lock");
		menuBody.classList.toggle("active");
	});
}

// Открытие ПК меню при наведении до 1024px
if (document.body.clientWidth>1024){
	function hideMenu() {
		$('.mob-menu').slideUp(600);
		$('.menu__link-cat').removeClass('active');
	}
	function showMenu() {
		$('.mob-menu').slideDown(600);
		$('.menu__link-cat').addClass('active');
	}
	$(document).ready(function() {
		$(".menu__catalogy").on("mouseover", showMenu);
		$(".header").on("mouseleave", hideMenu);
	});
}

// Slider на главной
$('.info-sl__slider').slick({
	arrows: true,
	dots: false,
	infinite: true,
	speed: 1000,
	slidesToShow: 1,
	autoplay: true,
	autoplaySpeed: 1800,
	adaptiveHeight: true
});


// Slider Товара
$('.select-prod-slider').slick({
	arrows: false,
	dots: false,
	infinite: true,
	speed: 1000,
	slidesToShow: 4,
	slidesToScroll: 1,
	centerMode: true,
	focusOnSelect: true,
	autoplaySpeed: 1800,
	asNavFor: ".select-slider-big",
	adaptiveHeight: true,
	vertical: true,
	    responsive: [
       {
           breakpoint: 550,
           setting: {
              vertical: false
       }  
     }   
  ] 
});
$('.select-slider-big').slick({
	arrows: false,
	dots: false,
	fade: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	draggable: false,
	asNavFor: ".select-prod-slider"
});


	//OPTION
	$.each($('.option.active'), function(index, val) {
		$(this).find('input').prop('checked', true);
	});
	$('.option').click(function(event) {
		if(!$(this).hasClass('disable')){
				var target = $(event.target);
			if (!target.is("a")){
				if($(this).hasClass('active') && $(this).hasClass('order') ){
					$(this).toggleClass('orderactive');
				}
					$(this).parents('.options').find('.option').removeClass('active');
					$(this).toggleClass('active');
					$(this).children('input').prop('checked', true);
			}
		}
	});

// Маска телефона
var inputmask_phone = {"mask": "+9(999)999-99-99"};
jQuery("input[type=tel]").inputmask(inputmask_phone);  



//Валидация телефона + Отправщик
jQuery('.header__form button').click(function(e){ 
	e.preventDefault();

	let persPhone = jQuery('.header__form input[name=tel]').val(); 
	if ((persPhone == "")||(persPhone.indexOf("_")>0)) { 
		$(this).siblings('input[name=tel]').css("background-color","#ff91a4")
		return;
	}

	var  jqXHR = jQuery.post(
		"../sender/send.php",
		{
			phone: jQuery('.header__form input[name=tel]').val(),    
			name: jQuery('.header__form input[name=name]').val(),
			mail: jQuery('.header__form textarea[name=text]').val(),
		}

		);

	jqXHR.done(function (responce) {
		console.log(responce);
		document.location.href = "../thank-you.html"; 
		jQuery('.header__form input[name=tel]').val("");  
		jQuery('.header__form input[name=name]').val("");
		jQuery('.header__form textarea[name=text]').val("");
	});

	jqXHR.fail(function (responce) {
		console.log(responce);
		alert("Произошла ошибка попробуйте позднее!");
	});

});


$(".fancybox").fancybox();


});












