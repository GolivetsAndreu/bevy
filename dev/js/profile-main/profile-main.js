loadPosts();

var 
    inProgress = false,
    startFrom  = 10;

$('#add_post').click(function() {
    $.ajax({
        url: 'controllers/Profile/post.php',
        method: 'POST',
        dataType: 'html',
        data: $('#post_text').serialize(),
        success: success()
    });
    loadPosts();
});

$(window).scroll(function() {
    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 150 && !inProgress) {
        $.ajax({
            url: 'controllers/Profile/load-posts-on-scroll.php',
            method: 'POST',
            data: { "start_from" : startFrom },
            beforeSend: function() { inProgress = true; }
        }).done(function(post) {
            $('#posts').append(post);
            inProgress = false;
            startFrom += 10;
        });
    }
});

function success() {
    $('#post_text').val('');
}

function loadPosts() {
    $.get('controllers/Profile/load-posts.php', function(post) {
        $('#posts').html('');
        $('#posts').append(post);
        startFrom = 10;
    });
}