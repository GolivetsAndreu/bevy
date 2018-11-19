$(document).ready(function() {

	/* User Birth Day Validation */

	var
		month 	    = document.getElementById('month'),  //months select tag 
		year  	    = document.getElementById('year'),  //years select tag
		days        = document.getElementById('days'), //days select tag
		hiddenDay   = document.getElementById('user_day'),
		hiddenMonth = document.getElementById('user_month'),
		hiddenYear  = document.getElementById('user_year'),
		showPhone   = document.getElementById('show_phone_check'),
		showEmail   = document.getElementById('show_mail_check'),
		publicPhone = document.getElementById('public_phone'),
		publicEmail = document.getElementById('public_email'), 
		date        = new Date(),                     //date for current year
		minimalYear = 1970,  //min year in select
		dayCount    = 30,   // days for month (default)
		monthArray  = [    //month array
			'Январь',
			'Февраль',
			'Март',
			'Апрель',
			'Май',
			'Июнь',
			'Июль',
			'Август',
			'Сентябрь',
			'Октябрь',
			'Ноябрь',
			'Декабрь'
		];

	getMonths();  // get the all month's in select tag
	getYears();  // get all years in select tag
	getDays();  // get 31 days in select tag

	rememberUsersBirthday(year, hiddenYear);
	rememberUsersBirthday(month, hiddenMonth);
	rememberUsersBirthday(days, hiddenDay);

	month.onclick = function(e) {
		checkActiveMonth(e.target); //check for current selected month
		getDays();  //get days for month
		checkLeapYear();  //check for a leap year when choose the month
		hiddenMonth.value = this.value;
	}

	year.onclick = function(e) {  
		getCurrentYear(e.target);
		hiddenYear.value = this.value;
	}

	days.onclick = function(e) {  
		hiddenDay.value = this.value;
	}

	function checkLeapYear() {
		var
			yearsArray = document.querySelectorAll('#year option');  //get all options from year select tag

		for (var i = 0; i < yearsArray.length; i++) {
			if (yearsArray[i].hasAttribute('data-year') && getLeapYear(Number(yearsArray[i].value))) {
				getLeapDays(); //get days for a leap year
			} 
		}
	}

	function checkActiveMonth(target) {
		var 
			currentOption = document.querySelector('option[value="' + target.value + '"]');

		for (var j = 0; j < monthArray.length; j++) {  //remove data-month attr from all month options when user choose
			var tempOption = document.querySelector('option[value="' + (j + 1) + '"]');
			tempOption.removeAttribute('data-month');
		}

		currentOption.setAttribute('data-month', 'true'); //and set data-month on choosed

		if (target.value % 2 != 0) {   //check for the long month
			dayCount  = 30;
		} else {
			dayCount  = 31;
		}

		//check for february
		if (target.value == 2) {
			dayCount  = 28;
		} 
	}

	function getCurrentYear(target) {
		var 
			leapNumber  = Number(target.value),
			currentYear = document.querySelector('option[value="' + target.value + '"]'); 

		for (var i = date.getFullYear(); i > minimalYear; i--) {
			var tempYear = document.querySelector('option[value="' + i + '"]');
			tempYear.removeAttribute('data-year');
		}

		currentYear.setAttribute('data-year', 'true'); //set arrt data-year on current

		if (getLeapYear(leapNumber)) {
			getLeapDays();
		} else {
			getDays();
		}
	}

	function getMonths() {
		//append the months
		for (var i = 0; i < monthArray.length; i++) {
			var monthOption = document.createElement('option');
			monthOption.value = i + 1;

			if (i == 0) {
				monthOption.setAttribute('data-month', 'true');
			}

			monthOption.innerHTML = monthArray[i];
			month.appendChild(monthOption);
		}
	}

	function getYears() {
		//display the year select tag
		for (var i = date.getFullYear(); i > minimalYear; i--) {
			var yearOption = document.createElement('option');

			if (i == date.getFullYear()) {
				yearOption.setAttribute('data-year', 'true');
			}

			yearOption.innerHTML = i;
			yearOption.value     = i;
			year.appendChild(yearOption);
		}
	}

	function getDays() {
		days.innerHTML = ''; //clear days select before appending
		for (var i = 1; i <= dayCount; i++) {
			var dayOption       = document.createElement('option');
			dayOption.innerHTML = i;
			dayOption.value     = i;
			days.appendChild(dayOption);
		}
	}

	function getLeapDays() {
		var februaryOption = document.querySelector('option[value="' + 2 + '"]');
		if (februaryOption.hasAttribute('data-month')) {
			days.innerHTML = ''; //clear days select before appending
			for (var i = 1; i <= 29; i++) {
				var dayOption       = document.createElement('option');
				dayOption.innerHTML = i;
				days.appendChild(dayOption);
			}
		} else {
			getDays();
		}
	}

	function rememberUsersBirthday(select, hidden) {
		var options = select.getElementsByTagName('option');
		for (let i = 0; i < options.length; i++) {
			if (options[i].value === hidden.value) options[i].setAttribute('selected', 'selected');
			else options[i].removeAttribute('selected');
		}
	}

	//check for a leap year
	function getLeapYear(year) {
		return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
	}

	/* Validate User Name */
	$('#profile_settings_name').on('input', function() {
		if (!validName($(this))) inputError('name', 'Имя не должно содержать пробелы, цифры, спец. символы, а также должно иметь больше одного символа и начинаться с большой буквы');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	/* Validate User Surname */
	$('#profile_settings_surname').on('input', function() {
		if (!validName($(this))) inputError('surname', 'Фамилия не должна содержать пробелы, цифры, спец. символы, а также должна иметь больше одного символа и начинаться с большой буквы');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	/* Validate phone number */
	$('#profile_settings_phone').on('input', function() {
		if (!validatePhone($(this).val())) inputError('phone', 'Введите корректный номер телефона');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	$('#profile_settings_mail').on('input', function() {
		if (!validateEmail($(this).val())) inputError('email', 'Введите корректный электронный адрес');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	$('#profile_settings_site').on('input', function() {
		if (!validUrl($(this).val())) inputError('web_site', 'Введите корректный адрес');
		else resetError($(this));
		if ($(this).val().length === 0) resetError($(this));
	});

	$('#save_prof_setings').on('click', function() {
		if (validName($('#profile_settings_name')) && validName($('#profile_settings_surname'))) {
			resetError($(this));

			//ajax

		} else { inputError('save_btn', 'Укажите имя и фамилию'); }
	});

	function validName(str) {
		var userName = str.val();
		return !(userName.match(/[0-9",'`:/"\\. !@#$%^&*()_+=-]/g) || userName.length < 2 || userName[0] === userName[0].toLowerCase());
	}

	function validateEmail(email) {
		var regulyarka = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return regulyarka.test(email);
	}

	function validatePhone(phoneNumber) {
		var regulyarka = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
	    return regulyarka.test(phoneNumber);
	}

	function validUrl(url) {
		var reg = /^(ht|f)tps?:\/\/[a-z0-9-\.]+\.[a-z]{2,4}\/?([^\s<>\#%"\,\{\}\\|\\\^\[\]`]+)?$/;
	    return reg.test(url);
	}

	function resetError(input) {
		input.removeClass('input_error_active');
		$(document).find('span.' + input.attr('name')).html('');
	}

	function inputError(siblingName, err) {
		$(document).find('span.' + siblingName).html(err);
		$(document).find('input[name="' + siblingName + '"]').addClass('input_error_active');
	}


	/*  */

	showPhone.onclick = function() {
		(showPhone.checked) ? publicPhone.value = '1': publicPhone.value = '0';
	}

	showEmail.onclick = function() {
		(showEmail.checked) ? publicEmail.value = '1': publicEmail.value = '0';
	}

});