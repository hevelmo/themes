jQuery(function ($) {

	//region Input blur styles
	var $b = $('body'),
		cls = {
			changed: 'pi-form-control-changed',
			focused: 'pi-form-control-focused',
			withIcon: 'pi-input-with-icon'
		};
	$b.delegate('.form-control', 'keyup',function () {
		var $el = $(this),
			val = $el.val();
		if (val !== 'placeholder' && $.trim(val)) {
			$el.addClass(cls.changed);
			$el.parents('form').addClass(cls.changed);
		} else {
			$el.removeClass(cls.changed);
			$el.parents('form').removeClass(cls.changed);
		}
	}).delegate('.form-control', 'focus',function () {
		var $el = $(this);
		$el.parents('form').addClass(cls.focused);
		$el.parents('.' + cls.withIcon).addClass(cls.focused);
	}).delegate('.form-control', 'blur', function () {
		var $el = $(this);
		$el.parents('form').removeClass(cls.focused);
		$el.parents('.' + cls.withIcon).removeClass(cls.focused);
	});
	//endregion

});