$(document).ready(function () {
	$('.ImageContainer').click(function () {
		$('.pop-up').addClass('d-flex');
		$('#body').addClass('reset_overflow');

		/*  */

		var
			dataIndex = $(this).attr('data-index'),
			dataPath  = $(this).attr('data-path'),
			dataPhoto = $(this).attr('data-photo'),
			popUp     = $('#pop-up');

		popUp.find('.pop-up__image-wrapper img').attr('src', dataPath);
		popUp.find('#photo_index').attr('value', dataIndex);
		popUp.find('#photo_name').attr('value', dataPhoto);
	});

	$('.fa-times').click(function () {
		$('.pop-up').removeClass('d-flex');
		$('#body').removeClass('reset_overflow');
	});

	/* Add photo */

	$('#add_photo').click(function() {
        $('#upload_photo').removeClass('d-none'); 
    });

    $('#upload_photo_close').click(function() {
        $('#upload_photo').addClass('d-none');
    });
});