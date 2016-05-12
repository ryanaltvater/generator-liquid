/* ========================================================================================== */
/*  DOCUMENT READY
/* ========================================================================================== */

$(document).ready(function() {


/* ============================== */
/*  Responsive Video Container
/* ============================== */

	// Wraps videos in a container that makes videos responsive.
	$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
		$(this).wrap('<div class="container__video"></div>');
	});


/* ============================== */
/*  Footer Copyright Year
/* ============================== */

	// Fills in the current year.
	$('.copyright__year').text((new Date()).getFullYear());
});