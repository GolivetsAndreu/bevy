<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Профиль пользователя</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Profile-Main/profile-main.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Profile-Main/profile-main-media.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="profile-wrapper wrapper">
        
        @include('layouts.nav')

        <div class="profile-content content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profile-content__left">
                            <div class="profile-content__user-photo relative">
                                <img src="img/Profile-Main/profile-fullsize.jpg" alt="Иван Иванов" class="img-responsive">
                            </div>
                            <div class="profile-content__user-data">
                                <div class="profile-content__user-name">
                                    <h2>Иван</h2>
                                    <h2>Иванов</h2>
                                </div>
                                <div class="profile-content__user-data">
                                    <ul>
                                        <li class="profile-content__user-data-item">
                                            12.03.1990
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            Украина
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            г. Киев
                                        </li>
                                        <li class="profile-content__user-data-item">
                                            <a href="#">https://google.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="profile-content__right">
                            <div class="profile-content__right-media">
                                <div class="profile-content__media-block">
                                    <div class="profile-content__media-block-heading">
                                        <a href="#">
                                            <i class="fa fa-music"></i>
                                            <span>Моя музыка</span>
                                        </a>
                                    </div>
                                    <div class="profile-content__media-block-content">
                                        <div class="profile-content__media-block-inner d-flex justify-content-around align-items-center">
                                            <div class="profile-content__media-block-item">
                                                <i class="fa fa-play"></i> <span>Bring Me The Horizon - Mantra</span>
                                            </div>
                                            <div class="profile-content__media-block-item">
                                                <i class="fa fa-play"></i> Bring Me The Horizon - Mantra
                                            </div>
                                            <div class="profile-content__media-block-item">
                                                <i class="fa fa-play"></i> Bring Me The Horizon - Mantra
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-content__media-block-footer text-center">
                                        <a href="#">Показать ещё</a>
                                    </div>
                                </div>
                                <div class="profile-content__media-block">
                                    <div class="profile-content__media-block-heading">
                                        <a href="#">
                                            <i class="fa fa-camera"></i>
                                            <span>Моя галерея</span>
                                        </a>
                                    </div>
                                    <div class="profile-content__media-block-content">
                                        <div class="profile-content__media-block-inner profile-content__gallery-inner d-flex justify-content-around align-items-center">
                                            <div class="profile-content__media-block-item profile-content__gallary-item" style="background: url(img/Profile-Main/camera_lens.png) no-repeat center top / cover;"></div>
                                            <div class="profile-content__media-block-item profile-content__gallary-item" style="background: url(img/Profile-Main/IMG_20180424_235303.jpg) no-repeat center top / cover;"></div>
                                            <div class="profile-content__media-block-item profile-content__gallary-item" style="background: url(img/Profile-Main/IMG_20180624_210459.jpg) no-repeat center top / cover;"></div>
                                            <div class="profile-content__media-block-item profile-content__gallary-item" style="background: url(img/Profile-Main/red_eye_depth.png) no-repeat center top / cover;"></div>
                                        </div>
                                    </div>
                                    <div class="profile-content__media-block-footer text-center">
                                        <a href="#">Показать ещё</a>
                                    </div>
                                </div>
                            </div>
                            <div class="new-post d-flex justify-content-between align-items-center">
                                <div class="new-post-left d-flex align-items-center">
                                    <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
                                    <textarea class="textarea" placeholder="Добавить запись"></textarea>
                                </div>
                                <div class="new-post-right d-flex align-items-center justify-content-between">
                                    <i class="fa fa-camera"></i>
                                    <i class="fa fa-music"></i>
                                    <button class="new-post-btn">Добавить</button>
                                </div>
                            </div>
                            <div class="posts">
                                <div class="post">
                                    <div class="post-heading d-flex align-items-center justify-content-between">
                                        <div class="post-info-left d-flex align-items-center">
                                            <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
                                            <div class="post-info">
                                                <div class="post-author"><a href="#">Иван Иванов</a></div>
                                                <div class="post-date">23 окт. 2018г. 07:31</div>
                                            </div> 
                                        </div>
                                        <div class="post-info-right">
                                            <div class="post-settings d-flex align-items-center relative">
                                                <i class="fa fa-ellipsis-h post_edit"></i>
                                                <div class="post-settings-drop absolute d-none post_edit_drop">
                                                    <a href="#">Редактировать</a>
                                                    <a href="#">Удалить</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-text">
                                            Привет всем!
                                        </div>
                                        <div class="post-attachment">
                                            <!-- Attachments --> 
                                        </div>
                                        <div class="post-comments">
                                            <div class="post-comment">
                                                <div class="post-info-left d-flex align-items-center">
                                                    <a class="profile-prew" href="#" style="background: url(img/Profile-Main/comment-profile.png) no-repeat center top / cover;"></a>
                                                    <div class="post-info">
                                                        <div class="post-author"><a href="#">Ichigo Kurosaki</a></div>
                                                        <div class="post-date">23 окт. 2018г. 10:13</div>
                                                    </div> 
                                                </div>
                                                <div class="post-comment-text">
                                                    Hi there!
                                                </div>
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
                                            <i class="fa fa-heart like" id="like"></i>
                                            <i class="fa fa-share share" id="share"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-heading d-flex align-items-center justify-content-between">
                                        <div class="post-info-left d-flex align-items-center">
                                            <a class="profile-prew" href="#" style="background: url(img/Profile-Main/profile-fullsize.jpg) no-repeat center top / cover;"></a>
                                            <div class="post-info">
                                                <div class="post-author"><a href="#">Иван Иванов</a></div>
                                                <div class="post-date">19 окт. 2018г. 19:40</div>
                                            </div> 
                                        </div>
                                        <div class="post-info-right">
                                            <div class="post-settings d-flex align-items-center relative">
                                                <i class="fa fa-ellipsis-h post_edit"></i>
                                                <div class="post-settings-drop absolute d-none post_edit_drop">
                                                    <a href="#">Редактировать</a>
                                                    <a href="#">Удалить</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-content">
                                        <div class="post-text">
                                            Какой прекрасный день!
                                        </div>
                                        <div class="post-attachment">
                                            <img class="img-responsive" src="img/Profile-Main/IMG_20180624_210459.jpg" alt="PHOTO">
                                        </div>
                                        <div class="post-comments">
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
                                            <i class="fa fa-heart like" id="like"></i>
                                            <i class="fa fa-share share" id="share"></i>
                                        </div>
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
<script src="js/profile-main/profile-main.js"></script>
<!-- Add post js -->
<script src="js/header.js"></script>
<!-- Header js -->
<script src="js/add-post.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
</body>
</html>