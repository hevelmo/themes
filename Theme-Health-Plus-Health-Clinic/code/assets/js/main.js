(function($) {
    "use strict";

    // INIT TOOLTIP
    $("[data-toggle='tooltip'], [data-hover='tooltip']").tooltip();

    // INIT POPOVER
    $("[data-toggle='popover'], [data-hover='popover']").popover();

    // INIT FILE BROWSE INPUT GROUP
    $('.btn-browse').on('click', function () {
        var inputfile = $(this).closest('.input-group').prev();
        inputfile.click();
        inputfile.change(function () {
            $(this).next().find('input[type=text]').val($(this).val());
        });
    });

    // INIT BOOTSTRAP DROPDOWNS
    $('body').on('click', '.dropdown-menu.hold-on-click', function (e) {
        e.stopPropagation();
    });

    // HOLD ON CLICK DROPDOWN
    $('.dropdown-menu.hold-on-click').on('click', function (e) {
        e.stopPropagation();
    });

})(jQuery);


