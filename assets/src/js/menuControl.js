let menuControl = {
	init() {

		$('#close-overlay').on('click', function(e) {
			e.preventDefault();
			$('#header').removeClass("scrolled-100vh");
			$('#overlay').removeClass('menu-overlay');
			$('#nav-icon').removeClass('open');
		});

	  $('#nav-icon').click(function(){
			$('#header').addClass("scrolled-100vh");
			$(this).toggleClass('open');
			$('#overlay').toggleClass('menu-overlay');
		});
	}
}

menuControl.init();
