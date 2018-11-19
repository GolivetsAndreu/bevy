$(document).ready(function() {
	/* Post Edit */
	// $('.post_edit').on('click', function (e) {
	// 	var target = $(e.target);
	// 	target.next().toggleClass('d-none');
	// });

	// $(document).mouseup(function(e) { 
	// 	var target = $(e.target);
 //        if (!target.hasClass('post_edit')) { 
 //            $('.post_edit').removeClass('d-none');
 //        }
 //    });

	/* Like share */
	$('.like').on('click', function (e) {
		var target = $(e.target);
		target.toggleClass('like_active');
	});

	$('.share').on('click', function (e) {
		var target = $(e.target);
		target.toggleClass('share_active');
	});
});