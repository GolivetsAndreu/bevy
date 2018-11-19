window.onload = function() {
	/* Animate Vr and text on registration page */
	var win_w = $('body').width();
 	if (win_w > 768) {
    	setTimeout(function() {
			$('#reg_vr').addClass('reg-main__vr_active');
			setTimeout(function() {
				$('#reg_vr_text').addClass('reg-main__text_active');
			}, 700);
		}, 800);
  	}

  	/* Show password */
  	$('input[type="password"]').on('input', function() {
  		if ($(this).val().length >= 1) {
  			$(this).next().next().addClass('show-password_active');
  		} else {
  			$(this).next().next().removeClass('show-password_active');
  		}
  	});

  	$('.fa-eye').on('click', function() {
  		$(this).toggleClass('fa-eye_active');
  		if ($(this).hasClass('fa-eye_active')) {
  			$(this).prev().prev().attr('type', 'text');
  		} else {
  			$(this).prev().prev().attr('type', 'password');
  		}
  	});
}
