$(document).ready(function() {

	//запускаем scrollbar для блока с расписанием
	$('.sessions').scrollbar({
		"scrollx": "none"
	});

	//на маленьком экране показываем бар для открытия меню и скрываем меню
	$("#hm").click(function () {
		$('#hm').addClass('hidden-xs');
		$('#nn').removeClass('hidden-xs');
		$('#hc').removeClass('hidden-xs');
	});

	$("#hc").click(function () {
		$('#hc').addClass('hidden-xs');
		$('#nn').addClass('hidden-xs');
		$('#hm').removeClass('hidden-xs');
	});

	//При наведении на фильм в слайдере зум и выползающие ссылки    
	$('.poster').hover(
		function () {
			$(this).stop().css({'background-size': "125%"});
			$(this).find('.film-name').css({'bottom': "0px"});
			$(this).find('.film-cap').css({'top': "0px"});
		},
		function () {
			$(this).stop().css({'background-size': "100%"});
			$(this).find('.film-name').css({'bottom': "-35px"});
			$(this).find('.film-cap').css({'top': "-35px"});
		});

	// для отображения и скрытия формы авторизации и регистрации
	var a = 0; //вспомогательная переменная

	$('.s-login').click(function () {
		if (a == 0) {
			$('.autorization').css('top', '0px');
			a = 1;
		} else {
			$('.autorization').css('top', '-190px');
			$('.registration').css('top', '-270px');
			a = 0;
		}
	});
	//показываем при нажатии на регистрации окно регистрации
	$('#reg').click(function () {
		if (a == 1) {
			$('.autorization').css('top', '-190px');
			$('.registration').css('top', '0px');
		}
	});
	//при нажатии на иконку назад
	$('.back').click(function () {
		$('.registration').css('top', '-270px');
		$('.autorization').css('top', '0px');
	});
	//при нажатии на крестик скрываем авторизацию или регистрацию
	$('.close').click(function () {
		$('.autorization').css('top', '-190px');
		$('.registration').css('top', '-270px');
		a = 0;
	});

	//Каруселька
	//Документация: http://owlgraphic.com/owlcarousel/
	function carousel_0() {
		var owl = $(".carousel-top");
		owl.owlCarousel({
			items: 1,
			singleItem: true,
			autoPlay: 10000,
		});
		owl.on("resized.owl.carousel", function (event) {
			var $this = $(this);
			$this.find(".owl-height").css("height", $this.find(".owl-item.active").height());
		});
		setTimeout(function () {
			owl.find(".owl-height").css("height", owl.find(".owl-item.active").height());
		}, 5000);
	};
	carousel_0();


	function carousel_1() {
		var owl = $(".carousel");
		owl.owlCarousel({
			items: 6,
			itemsCustom: false,
			itemsDesktop: [1199, 4],
			itemsDesktopSmall: [980, 3],
			itemsTablet: [768, 3],
			itemsTabletSmall: false,
			itemsMobile: [479, 1],
			singleItem: false,
			itemsScaleUp: false,
			navigation: true,
			navigationText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
			pagination: false
		});
		owl.on("resized.owl.carousel", function (event) {
			var $this = $(this);
			$this.find(".owl-height").css("height", $this.find(".owl-item.active").height());
		});
		setTimeout(function () {
			owl.find(".owl-height").css("height", owl.find(".owl-item.active").height());
		}, 5000);
	};
	carousel_1();
});