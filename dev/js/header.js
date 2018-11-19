$(document).ready(function() {
	/* Header gropdown menu */
	$('#header_btn_drop').click(function() {
		$('.header__settings-btn').toggleClass('header__settings-btn_active');
		$('.header__settings-drop').toggleClass('d-block');
	});

	$(document).mouseup(function(e) { 
        if (!$('#header_btn_drop').is(e.target) && $('.header__settings-drop').hasClass('d-block')) { 
            $('.header__settings-drop').removeClass('d-block'); 
            $('.header__settings-btn').toggleClass('header__settings-btn_active');
        }
    });

    /* Fixed bar */
    $(window).scroll(function() {
		if ($(this).scrollTop() > 20) {
			$('.navbar').addClass('navbar_active');
		}
		else {
			$('.navbar').removeClass('navbar_active');
		};
	});
});