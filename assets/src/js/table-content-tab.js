var contentTab = {

	toggleContentTab() {
		let that = this;

		$('.table-content-tab__item').click(function() {

			$('.table-content-tab__item, .table-content-tab__details').removeClass('active');
			$(this).addClass('active');

			let content_id = $(this).attr('tab-content-ref');

			$('#' + content_id).addClass('active');
		});
	},	

	init() {
		this.toggleContentTab();
	}
}

contentTab.init();