<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Видео</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Videos/videos.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Videos/videos-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="pop-up" class="pop-up justify-content-center align-items-center relative">
        <div class="closePopUp-wrapper absolute">
            <i class="fa fa-times closePopUp"></i>
        </div>
        <div class="pop-up__wrapper">
            <div class="pop-up__image-wrapper">
                <div class="videos__wrapper">
                    <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                        <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                            <i class="fa fa-play pkay-video"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-comments commentPad">
                <div class="post-comment">
                    <div class="post-info-left d-flex align-items-center">
                        <a class="profile-prew" href="#" style="background: url(img/Profile-Main/comment-profile.png) no-repeat center top / cover;"></a>
                        <div class="post-info">
                            <div class="post-author"><a href="#">Ichigo Kurosaki</a></div>
                            <div class="post-date">19 окт. 2018г. 19:45</div>
                        </div>
                    </div>
                    <div class="post-comment-text">
                        This is shit real shit!
                    </div>
                    <div class="post-edit-comment">
                        <span>Ответить</span>
                        <span>Удалить</span>
                    </div>
                </div>
            </div>
            <div class="post-add-comment new-post d-flex justify-content-between align-items-center">
                <div class="new-post-left d-flex align-items-center">
                    <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
                    <textarea class="textarea" placeholder="Добавить комментарий"></textarea>
                </div>
                <div class="post-add-comment-media new-post-right d-flex align-items-center justify-content-between">
                    <button class="new-post-btn">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        
        @include('layouts.nav')

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="add-video d-flex justify-content-end">
                            <button id="add_video">Добавить</button>
                        </div>
                        <div class="videos">
                            <div class="videos__wrapper d-flex justify-content-between flex-wrap">
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                                <div class="videos__item" style="background: url(img/videos/video.jpeg) no-repeat center top / cover;">
                                    <div class="videos__item-wrapper play-video relative d-flex justify-content-center align-items-center">
                                        <i class="fa fa-play pkay-video"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footer')

    </div>
<!-- Jquery -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
<!-- Autoresize -->
<script src="libs/autoresize/autoresize.jquery.js"></script>
<!-- Main -->
<script src="js/videos/videos.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
</body>
</html>