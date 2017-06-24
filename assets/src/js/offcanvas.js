let offcanvas = {
	
	/**
	 * Handles the toggling effect of the hidden menu.
	 */
	toggleOffCanvasItem() {
		let controllers = $('.off-canvas__control');
		let itemClassPrefix = '.off-canvas__';

		controllers.click(function() {

			let clicked = $(this);
			let itemClassName = itemClassPrefix + $(this).data('controls');
			let item = $(itemClassName);
			let body = $('body');

			offcanvas.toggleClickedButton(controllers, clicked);

			if (item.hasClass('is-opened')) {
				offcanvas.close(body, item);

				return;
			}

			// Ensures not other item is opened.
			$('.off-canvas__content').removeClass('is-opened');
			offcanvas.open(body, item);
		});
	},

	/**
	 * Manipulates the active class for the off-canvas menu icons.
	 * @param  object 	controllers	Array of all the the menu icon elements	
	 * @param  object 	clicked     The selected icon
	 */
	toggleClickedButton(controllers, clicked) {
		if (clicked.hasClass('is-active')) {
			clicked.removeClass('is-active');

			return;
		}

		controllers.removeClass('is-active');
		clicked.addClass('is-active');
	},

	/**
	 * Handles the open action.
	 * @param  object 	body
	 * @param  object 	controlledItem	The offcanvas content that will be shown.
	 */
	open(body, controlledItem) {
		body.addClass('off-canvas-effect');
		controlledItem.addClass('is-opened');
	},

	/**
	 * Handles the close action.
	 * @param  object 	body
	 * @param  object 	controlledItem	The offcanvas content that will be hidden.
	 */
	close(body, controlledItem) {
		body.removeClass('off-canvas-effect');
		controlledItem.removeClass('is-opened');
	},

	init() {
		this.toggleOffCanvasItem();
	}
}

offcanvas.init();