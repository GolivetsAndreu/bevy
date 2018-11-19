$(document).ready(function() { show_numbers(); });

$('#user_name').on('input', function() {
	if (!validName()) inputError('name', 'Имя не должно содержать пробелы, цифры, спец. символы, а также должно иметь больше одного символа и начинаться с большой буквы');
	else resetError($(this));
	if ($(this).val() === '') resetError($(this));
});

$('#user_surname').on('input', function() {
	if (!validSurname()) inputError('surname', 'Фамилия не должна содержать пробелы, цифры, спец. символы, а также должна иметь больше одного символа и начинаться с большой буквы');
	else resetError($(this));
	if ($(this).val() === '') resetError($(this));
});

$('#reg_login').on('input', function() {
	if (!validLogin()) inputError('email', 'Введите корректный адрес электронной почты или телефон');
	else resetError($(this));
	if ($(this).val() === '') resetError($(this));
});

$('#user_password').on('input', function() {
	if (!validPass()) inputError('password', 'Пароль должен иметь больше 5-ти символов и не должен содержать пробелы и спец. символы');
	else resetError($(this));
	if ($(this).val() === '') resetError($(this));
});

$('#user_password_repeat').on('input', function() {
	if (!validRepeatPassword()) inputError('repeat_password', 'Пароли не совпадают');
	else resetError($(this));
	if ($(this).val() === '') resetError($(this));
});

// $('#reg_button').on('click', function() {
// 	if (validName() && validSurname() && validLogin() && validPass() && validRepeatPassword() && capcha()) {

// 		//ajax

// 		$('#reg_step_1').css('display', 'none');
// 		$('#reg_step_2').css('display', 'block');
// 	} else { show_numbers(); }
// });


/* * * * * * * * * * * * * * * * * * * * * *
 *   Validate Name, Surmane and Passwords  *
 * * * * * * * * * * * * * * * * * * * * * */

function validName() {
	var userName = $('#user_name').val();
	return !(userName.match(/[0-9",'`:/"\\. !@#$%^&*()_+=-]/g) || userName.length < 2 || userName[0] === userName[0].toLowerCase());
}

function validSurname() {
	var	userSurname = $('#user_surname').val();
	return !(userSurname.match(/[0-9",'`:/"\\. !@#$%^&*()_+=-]/g) || userSurname.length < 2 || userSurname[0] === userSurname[0].toLowerCase());
}

function validPass(password) {
	var password = $('#user_password').val();
	return !(password.match(/[",'^:/"\\. ]/g) || password.length < 5);
} 

function validRepeatPassword() { return $('#user_password').val() === $('#user_password_repeat').val(); }


/* * * * * * * * * * *
 *   Login Validate  *
 * * * * * * * * * * */

function validateEmail(email) {
	var regulyarka = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return regulyarka.test(email);
}

function validatePhone(phoneNumber) {
	var regulyarka = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
    return regulyarka.test(phoneNumber);
}

function validLogin() {
	var login = $("#reg_login").val();
	if (validateEmail(login)){
		$('#reg_user_login').html(' электронный адрес ');
		return true;
	} else if (validatePhone(login)) {
		$('#reg_user_login').html(' номер телефона ');
		return true;
	} else { return false; }
}


/* * * * * * *
 *   Capcha  *
 * * * * * * */

function show_numbers() {
    //init global vars
    var numberA = Math.floor(Math.random() * 25);
    var numberB = Math.floor(Math.random() * 25); //random numbers
    var CapchaAnswer;
    //init variables
    $("#NumberA").html(numberA); 
    $("#Operand").html(" + ");
    $("#NumberB").html(numberB);
    d = numberA + numberB;     //usseles math operation
}

function capcha() {
    //init variebles    
    var answers = $('#Answer').val();
    answers = parseInt(answers);   //entered value in  input
    if (d == answers) {
        return true;
    } else {
        show_numbers();
        $('#Answer').val('');
        return false;
    }
}


/* * * * * * *
 *   Errors  *
 * * * * * * */

function resetError(input) {
	input.removeClass('input_error_active');
	input.next().html('');
}

function inputError(siblingName, err) {
	$('#form').find('span.' + siblingName).html(err);
	$('#form').find('input[name="' + siblingName + '"]').addClass('input_error_active');
}