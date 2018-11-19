<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Диалоги</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Dialog/dialog.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Dialog/dialog-media.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">

        @include('layouts.nav')

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-mg-10 col-sm-12 m-auto">
                        <div class="dialog__label text-center">
                            <span>Диалог с <a href="#">Ichigo Kurosaki</a></span>
                        </div>
                        <div id="dialog" class="dialog">
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/dialog-friend.png) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Ichigo Kurosaki</h3>
                                        <div class="dialog__text">
                                            Привет, как дела?))0))0)
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:50</span>
                                </div>
                            </div>
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/profile-fullsize.jpg) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Иван Иванов</h3>
                                        <div class="dialog__text">
                                            Все збс.
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:51</span>
                                </div>
                            </div>
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/profile-fullsize.jpg) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Иван Иванов</h3>
                                        <div class="dialog__text">
                                            Hello World
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:51</span>
                                </div>
                            </div>
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/profile-fullsize.jpg) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Иван Иванов</h3>
                                        <div class="dialog__text">
                                            Sometimes the same is different
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:51</span>
                                </div>
                            </div>
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/profile-fullsize.jpg) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Иван Иванов</h3>
                                        <div class="dialog__text">
                                            :3
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:51</span>
                                </div>
                            </div>
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/profile-fullsize.jpg) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Иван Иванов</h3>
                                        <div class="dialog__text">
                                            KEKEKEKEK
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:51</span>
                                </div>
                            </div>
                            <div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(img/Dialog/dialog-friend.png) no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">Ichigo Kurosaki</h3>
                                        <div class="dialog__text">
                                            Windows SUX!
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>24 окт. 2018г. 19:50</span>
                                </div>
                            </div>
                        </div>
                        <div class="dialog__write-message">
                            <div class="new-post d-flex justify-content-between align-items-center">
                                <div class="new-post-left relative d-flex align-items-center">
                                    <i class="fa fa-plus" id="choose_file"></i>
                                    <textarea class="textarea" placeholder="Ваше сообщение.."></textarea>
                                </div>
                                <div class="new-post-right d-flex align-items-center justify-content-between">
                                    <i class="fa fa-camera"></i>
                                    <i class="fa fa-music"></i>
                                    <button class="new-post-btn">Отправить</button>
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
<script src="js/dialog/dialog.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
</body>
</html>