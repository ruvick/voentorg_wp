// возвращает куки с указанным name,
// или undefined, если ничего не найдено
function getCookie(name) {
	let matches = document.cookie.match(new RegExp(
		"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
	));
	return matches ? decodeURIComponent(matches[1]) : undefined;
}


function number_format() {
	let elements = document.querySelectorAll('.price_formator');
	for (let elem of elements) {
		elem.dataset.realPrice = elem.innerHTML;
		elem.innerHTML = Number(elem.innerHTML).toLocaleString('ru-RU');
	}
}

document.addEventListener("DOMContentLoaded", () => {
	number_format();
	cart_recalc();
});

//--- Корзина ----------------------------------------------------------------------------------------------

let cart = [];
let cartCount = 0;

function cart_recalc() {
	cart = JSON.parse(localStorage.getItem("cart"));
	if (cart == null) cart = [];
	cartCount = 0;
	cartSumm = 0;
	for (let i = 0; i < cart.length; i++) {
		cartCount += Number(cart[i].count);

		cartSumm += Number(cart[i].count) * parseFloat(cart[i].price);
	}

	localStorage.setItem("cartcount", cartCount);
	localStorage.setItem("cartsumm", cartSumm);

	let elements = document.querySelectorAll('.bascet_counter');
	for (let elem of elements) {
		elem.innerHTML = cartCount;
	}

}

function add_tocart(elem, countElem) {


	let cartElem = {
		sku: elem.dataset.sku,
		size: elem.dataset.size,
		lnk: elem.dataset.lnk,
		price: elem.dataset.price,
		priceold: elem.dataset.oldprice,
		subtotal: elem.dataset.price,
		name: elem.dataset.name,
		count: (countElem == 0) ? elem.dataset.count : countElem,
		picture: elem.dataset.picture
	};

	if (cart.length == 0) {
		cart.push(cartElem);
	} else {
		let addet = true;
		for (let i = 0; i < cart.length; i++) {
			if (cart[i].sku == cartElem.sku) {
				cart[i].count++;
				cart[i].subtotal = Number(cart[i].count) * parseFloat(cart[i].price);
				addet = false;
				break;
			}
		}

		if (addet)
			cart.push(cartElem);
	}

	localStorage.setItem("cart", JSON.stringify(cart));
	cart_recalc();

	console.log(cartElem);
}

//-------------------------------------

$ = jQuery;

$(document).ready(function () {

	var w = $(window).outerWidth();
	var h = $(window).outerHeight();
	var ua = window.navigator.userAgent;
	var msie = ua.indexOf("MSIE ");
	var isMobile = { Android: function () { return navigator.userAgent.match(/Android/i); }, BlackBerry: function () { return navigator.userAgent.match(/BlackBerry/i); }, iOS: function () { return navigator.userAgent.match(/iPhone|iPad|iPod/i); }, Opera: function () { return navigator.userAgent.match(/Opera Mini/i); }, Windows: function () { return navigator.userAgent.match(/IEMobile/i); }, any: function () { return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); } };

	function isIE() {
		ua = navigator.userAgent;
		var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
		return is_ie;
	}
	if (isIE()) {
		$('body').addClass('ie');
	}
	if (isMobile.any()) {
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
	if (document.body.clientWidth > 1024) {
		function hideMenu() {
			$('.mob-menu').slideUp(600);
			$('.menu__link-cat a').removeClass('active');
		}
		function showMenu() {
			$('.mob-menu').slideDown(600);
			$('.menu__link-cat a').addClass('active');
		}
		$(document).ready(function () {
			$(".menu__catalogy").on("mouseover", showMenu);
			$(".header").on("mouseleave", hideMenu);
		});
	}

	// Строка поиска на мобилках
	let mobsearch = document.querySelector(".mob-search");
	let headsearch = document.querySelector(".header__search");
	if (mobsearch) {
		mobsearch.addEventListener("click", function () {
			headsearch.classList.toggle("active");
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
		slidesToShow: 10,
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
	$.each($('.option.active'), function (index, val) {
		$(this).find('input').prop('checked', true);
	});
	$('.option').click(function (event) {
		if (!$(this).hasClass('disable')) {
			var target = $(event.target);
			if (!target.is("a")) {
				if ($(this).hasClass('active') && $(this).hasClass('order')) {
					$(this).toggleClass('orderactive');
				}
				$(this).parents('.options').find('.option').removeClass('active');
				$(this).toggleClass('active');
				$(this).children('input').prop('checked', true);
			}
		}
	});

	// Маска телефона
	var inputmask_phone = { "mask": "+9(999)999-99-99" };
	jQuery("input[type=tel]").inputmask(inputmask_phone);



	//Валидация телефона + Отправщик
	jQuery('.header__form button').click(function (e) {
		e.preventDefault();

		let persPhone = jQuery('.header__form input[name=tel]').val();
		if ((persPhone == "") || (persPhone.indexOf("_") > 0)) {
			$(this).siblings('input[name=tel]').css("background-color", "#ff91a4")
			return;
		}

		var jqXHR = jQuery.post(
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


	$(".callback__popup").on('click', function (e) {
		e.preventDefault();
		jQuery("#agriwind").arcticmodal();
	});


	$('.agriwind').click(function (e) {

		e.preventDefault();
		var namew = $("#form-namew").val();
		var emailw = $("#form-emailw").val();
		var telw = $("#form-telw").val();

		// if (jQuery("#form-namew").val() == "") {
		//     jQuery("#form-namew").css("border","1px solid red");
		//     return;
		// }

		// if (jQuery("#form-emailw").val() == ""){
		//     jQuery("#form-emailw").css("border","1px solid red");
		//     return;
		// }

		if (jQuery("#form-telw").val() == "") {
			jQuery("#form-telw").css("border", "1px solid red");
			return;
		}

		else {
			var jqXHR = jQuery.post(
				allAjax.ajaxurl,
				{
					action: 'sendagri',
					nonce: allAjax.nonce,
					namew: namew,
					emailw: emailw,
					telw: telw,
				}
			);

			jqXHR.done(function (responce) {
				jQuery(".headen_form_blk").hide();
				jQuery('.SendetMsg').show();
			});

			jqXHR.fail(function (responce) {
				alert("Произошла ошибка. Попробуйте позднее.");
			});

		}
	});

	// Добавляем класс active к первому option - размерный ряд в карточке
	$('.option').first().addClass('active');


});












