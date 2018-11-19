<?php
	session_start();
	require_once "../../db/db.php";  //connect database

	//get current user
	$user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

	$start_from = $_POST['start_from'];

	$get_posts = "SELECT * FROM user_posts WHERE user_id='$user_id' ORDER BY id DESC LIMIT $start_from, 10";
    $result = $conn->query($get_posts);

    //if user has profile picture, show him the profile picture
    $user_profile_pic = (!empty($user['profile_pic']) and !empty($user['user_folder'])) ? '
    	users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']
    	: 'img/Profile-Main/profile_default.jpg';
    
    //if user is logged, show him post settings
    $user_delete_post_rights = (isset($_SESSION['user_login'])) ? '

    	<span class="delete-post" onclick="
            postId = $(this).parent().attr(\'data-post\');
            $.ajax({
                url:      \'controllers/Profile/delete-post.php\', 
                type:     \'POST\',
                dataType: \'html\', 
                data: {
                    \'post_id\': postId
                }
            }).done(function() {
                loadPosts();
                startFrom = 10;
            });
        ">Удалить</span>
    
    ': '';

    //if user is logged, show him the panel with likes\reposts and adding comments
    $user_post_activity = (isset($_SESSION['user_login'])) ? '

    	<div class="new-post-left d-flex align-items-center">
            <a class="profile-prew" href="#" style="background: url(' . $user_profile_pic . ') no-repeat center top / cover;"></a>
            <textarea class="textarea" placeholder="Добавить комментарий"></textarea>
        </div>
        <div class="post-add-comment-media new-post-right d-flex align-items-center justify-content-between">
            <button class="new-post-btn">Добавить</button>
            <i class="fa fa-heart like" id="like"></i>
            <i class="fa fa-share share" id="share"></i>
        </div>
    
    ': '';

	while ($posts = mysqli_fetch_array($result)) {
		$posts_array[] = $posts;
	}
	if(!empty($posts_array)){
		foreach ($posts_array as $post) {
			echo '											
				<div class="post">
					<div class="post-heading d-flex align-items-center justify-content-between">
						<div class="post-info-left d-flex align-items-center">
							<a class="profile-prew" href="#" style="background: url(' . $user_profile_pic . ') no-repeat center top / cover;"></a>
							<div class="post-info">
								<div class="post-author"><a href="#">' . $user["name"] . ' ' . $user["surname"] . '</a></div>
								<div class="post-date">' . $post["post_date"] . '</div>
							</div> 
						</div>
						<div class="post-info-right" data-post="' . $post["id"] . '">
							' . $user_delete_post_rights . '  
						</div>
					</div>
					<div class="post-content">
						<div class="post-text">
							<p>' . $post["post_text"] . '</p>
						</div>
						<div class="post-attachment">
						   
						</div>
						<div class="post-comments">
					
						</div>
					</div>
					<div class="post-add-comment new-post d-flex justify-content-between align-items-center">
						' . $user_post_activity . '
					</div>
				</div>
			';
		}
	}
?>