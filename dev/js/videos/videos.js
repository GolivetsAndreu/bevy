$(document).ready(function () {
	$('.videos__item-wrapper').click(function () {
		$('.pop-up').addClass('d-flex');
		$('#body').addClass('reset_overflow');
	});

	$('.fa-times').click(function () {
		$('.pop-up').removeClass('d-flex');
		$('#body').removeClass('reset_overflow');
	});

	$('#add_video').click(function() {
        $('#upload_video').removeClass('d-none'); 
    });

    $('#upload_video_close').click(function() {
        $('#upload_video').addClass('d-none');
    });
});