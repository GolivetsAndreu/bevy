$(document).ready(function() {
	/* Show password */
  	$('#settings_form input[type="password"]').on('input', function() {
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

  	/* Passwords validate */

  	var passError = 'Пароль должен иметь больше 5-ти символов и не должен содержать пробелы и спец. символы';

  	$('#cur_pass').on('input', function() {
		if (!validPass($(this))) inputError('cur_pass', passError);
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	$('#new_pass').on('input', function() {
		if (!validPass($(this))) inputError('new_pass', passError);
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	$('#repeat_new_pass').on('input', function() {
		if (!validRepeatPassword($(this))) inputError('repeat_new_pass', 'Пароли не совпадают.');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	$('#user_id').on('input', function() {
		if (!validId($(this))) inputError('user_id', 'Id должен иметь больше 3-х символов и не должен содержать пробелы и спец. символы');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	function validPass(password) { return !(password.val().match(/[",'^:/"\\. ]/g) || password.val().length < 5); } 

	function validRepeatPassword(password) { return $('#new_pass').val() === password.val(); }

	function validId(id) { return !(id.val().match(/[",'^:/"\\. ]/g) || id.val().length < 3); }

	function resetError(input) {
		input.removeClass('input_error_active');
		$(document).find('span.' + input.attr('name')).html('');
	}

	function inputError(siblingName, err) {
		$(document).find('span.' + siblingName).html(err);
		$(document).find('input[name="' + siblingName + '"]').addClass('input_error_active');
	}
});