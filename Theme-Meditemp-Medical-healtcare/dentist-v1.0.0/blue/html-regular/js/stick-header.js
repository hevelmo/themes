$(document).ready(function() {
  $('#nav').affix({
    offset: {
    top: $('header').height()
    }
});


$('#nav').on('affix-top.bs.affix', function () {
      $('#nav + .container').css('margin-top', 0);
		});
});

