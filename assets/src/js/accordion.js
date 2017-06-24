var sectionAccordion = {

	toggleAccordion() {
		let that = this;

		$('.accordion__header').click(function() {

			let accordion = $(this).closest('.accordion');
			let header = $(this);

			if (that.checkIfLink(header)) {
				return;
			}

			if (accordion.hasClass('is-opened')) {
				that.close(accordion);
			}
			else {
				that.open(accordion);
			}
		});
	},

	open(accordion) {
		accordion.addClass('is-opened');
	},

	close(accordion) {
		accordion.removeClass('is-opened');
	},

	checkIfLink(header) {
		return header.is('a');
	},

	init() {
		this.toggleAccordion();
	}
}

sectionAccordion.init();
