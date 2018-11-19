<?php
	session_start();
	require_once "../../db/db.php";  //connect database

	//get current user
	$user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    //get friends posts
    $get_news = "SELECT * FROM user_posts WHERE user_id='$user_id' OR user_id IN(SELECT idFriend FROM friends WHERE idUser='$user_id') ORDER BY id DESC LIMIT 10";
    $result = $conn->query($get_news);    

    $current_user_profile_pic = (!empty($user['profile_pic']) and !empty($user['user_folder'])) ? '
        users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']
        : 'img/Profile-Main/profile_default.jpg';

    //if user is logged, show him the panel with likes\reposts and adding comments
    $user_post_activity = (isset($_SESSION['user_login'])) ? '
        <div class="new-post-left d-flex align-items-center">
            <a class="profile-prew" href="#" style="background: url(' . $current_user_profile_pic . ') no-repeat center top / cover;"></a>
            <textarea class="textarea" placeholder="Добавить комментарий"></textarea>
        </div>
        <div class="post-add-comment-media new-post-right d-flex align-items-center justify-content-between">
            <button class="new-post-btn">Добавить</button>
            <i class="fa fa-heart like" id="like"></i>
            <i class="fa fa-share share" id="share"></i>
        </div>
    ': '';

	while ($posts = mysqli_fetch_array($result)) $posts_array[] = $posts;

	foreach ($posts_array as $post) {
        //show profile pictures for current users and for friends
        if ($post['user_id'] === $user_id and !empty($user['profile_pic']) and !empty($user['user_folder'])) {
            $user_profile_pic = 'users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic'];
        } elseif ($post['user_id'] !== $user_id) {
            $friend_id = $post['user_id'];
            $get_friend = "SELECT * FROM users WHERE id='$friend_id'";
            $friend = mysqli_fetch_array($conn->query($get_friend));

            if (!empty($friend['profile_pic']) and !empty($friend['user_folder']))
                $user_profile_pic = 'users-media/' . $friend['user_folder'] . '/images/profile-images/' . $friend['profile_pic'];
            else $user_profile_pic = 'img/Profile-Main/profile_default.jpg';
            
        } else { $user_profile_pic = 'img/Profile-Main/profile_default.jpg'; }

        //if user is logged, show him post settings
        $user_delete_post_rights = (isset($_SESSION['user_login']) and $post['user_id'] === $user_id) ? '
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

        //username of the current post
        if ($post['user_id'] === $user_id) {
            $username = $user['name'] . ' ' . $user['surname'];
        } else {
            $friend_id = $post['user_id'];
            $get_friend = "SELECT * FROM users WHERE id='$friend_id'";
            $friend = mysqli_fetch_array($conn->query($get_friend));
            $username = $friend['name'] . ' ' . $friend['surname'];
        }

		echo '											
			<div class="post">
                <div class="post-heading d-flex align-items-center justify-content-between">
                    <div class="post-info-left d-flex align-items-center">
                        <a class="profile-prew" href="#" style="background: url(' . $user_profile_pic . ') no-repeat center top / cover;"></a>
                        <div class="post-info">
                            <div class="post-author"><a href="#">' . $username . '</a></div>
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
?>