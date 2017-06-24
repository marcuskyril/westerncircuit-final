var tabs = {

	toggleTabs() {
		let that = this;

		$('.tabs li').click(function(e) {

			e.preventDefault();

			$('.tabs li, .tabs-content').removeClass('active');
			$(this).addClass('active');

			let content_id = $(this).find('a').attr('href');

			$(content_id).addClass('active');
		});
	},

	init() {
		this.toggleTabs();
	}
}

tabs.init();
