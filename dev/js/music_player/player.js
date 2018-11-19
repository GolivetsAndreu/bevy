$(document).ready(function() {
    $('#add_song').click(function() {
        $('#upload_song').removeClass('d-none'); 
    });

    $('#upload_song_close').click(function() {
        $('#upload_song').addClass('d-none');
    });
});