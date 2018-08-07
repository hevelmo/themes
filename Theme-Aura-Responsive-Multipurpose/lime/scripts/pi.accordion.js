//region PI accordion
jQuery(function($){

	var set = {
		classAccordion: 'pi-accordion',
		classTogglerBehavior: 'pi-behavior-toggle',
		classItem: 'pi-accordion-item',
		classItemActive: 'pi-accordion-item-active',
		classItemDefaultOpen: 'pi-default-open',
		classTitle: 'pi-accordion-title',
		classContent: 'pi-accordion-content'
	};

	var $accs = $('.' + set.classItem);

	if($accs.length){

		$accs.each(function () {
			var $item = $(this);
			if (!$item.hasClass(set.classItemDefaultOpen)) {
				$item.find('.' + set.classContent).hide();
			} else {
				$item.addClass(set.classItemActive);
			}
		});

		$('.' + set.classTitle).click(function(e) {

			var $link = $(this),
				$item = $link.parents('.' + set.classItem),
				$acc = $item.parents('.' + set.classAccordion);

			if ($item.hasClass(set.classItemActive)) {
				if (!$acc.hasClass(set.classTogglerBehavior)) {
					$acc.find('.' + set.classItem).removeClass(set.classItemActive);
					$acc.find('.' + set.classContent).slideUp();
				} else {
					$item.removeClass(set.classItemActive);
					$link.next('.' + set.classContent).slideUp();
				}
			} else {
				if (!$acc.hasClass(set.classTogglerBehavior)) {
					$acc.find('.' + set.classItem).removeClass(set.classItemActive);
					$acc.find('.' + set.classContent).slideUp();
				}
				$item.addClass(set.classItemActive);
				$link.next('.' + set.classContent).slideToggle();
			}

			e.preventDefault();
		});
	}

});
//endregion