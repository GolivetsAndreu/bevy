<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Уведомления</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Notifications/notifications-main.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Notifications/notifications-media.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">

        @include('layouts.nav')

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="notif m-auto">
                            <div class="notif__new">
                                <div class="notif__item relative">
                                    <div class="notif__item-content d-flex align-items-center">
                                        <div class="notif__item-user" style="background: url(img/Notifications/notification-user.png) no-repeat center top / cover;"></div>
                                        <span class="notif__item-user-name">Ichigo Kurosaki</span>
                                        <span class="notif__item-message">Добавил комментарий под Вашим постом</span>
                                    </div>
                                    <div class="notif__item-date absolute">
                                        26 окт. 2018г. 19:45
                                    </div>
                                </div>
                                <div class="notif__item relative">
                                    <div class="notif__item-content d-flex align-items-center">
                                        <div class="notif__item-user" style="background: url(img/Notifications/notification-user.png) no-repeat center top / cover;"></div>
                                        <span class="notif__item-user-name">Ichigo Kurosaki</span>
                                        <span class="notif__item-message">Поставил лайк под Вашей фотографией</span>
                                    </div>
                                    <div class="notif__item-date absolute">
                                        26 окт. 2018г. 13:45
                                    </div>
                                </div>
                                <div class="notif__item relative">
                                    <div class="notif__item-content d-flex align-items-center">
                                        <div class="notif__item-user" style="background: url(img/Notifications/notification-user.png) no-repeat center top / cover;"></div>
                                        <span class="notif__item-user-name">Ichigo Kurosaki</span>
                                        <span class="notif__item-message">Поделился Вашим постом</span>
                                    </div>
                                    <div class="notif__item-date absolute">
                                        26 окт. 2018г. 19:50
                                    </div>
                                </div>
                            </div>
                            <div class="notif__old">
                                <div class="notif__item relative">
                                    <div class="notif__item-content d-flex align-items-center">
                                        <div class="notif__item-user" style="background: url(img/Notifications/notification-user.png) no-repeat center top / cover;"></div>
                                        <span class="notif__item-user-name">Ichigo Kurosaki</span>
                                        <span class="notif__item-message">Добавил комментарий под Вашим постом</span>
                                    </div>
                                    <div class="notif__item-date absolute">
                                        26 окт. 2018г. 19:45
                                    </div>
                                </div>
                                <div class="notif__item relative">
                                    <div class="notif__item-content d-flex align-items-center">
                                        <div class="notif__item-user" style="background: url(img/Notifications/notification-user.png) no-repeat center top / cover;"></div>
                                        <span class="notif__item-user-name">Ichigo Kurosaki</span>
                                        <span class="notif__item-message">Поставил лайк под Вашей фотографией</span>
                                    </div>
                                    <div class="notif__item-date absolute">
                                        26 окт. 2018г. 13:45
                                    </div>
                                </div>
                                <div class="notif__item relative">
                                    <div class="notif__item-content d-flex align-items-center">
                                        <div class="notif__item-user" style="background: url(img/Notifications/notification-user.png) no-repeat center top / cover;"></div>
                                        <span class="notif__item-user-name">Ichigo Kurosaki</span>
                                        <span class="notif__item-message">Поделился Вашим постом</span>
                                    </div>
                                    <div class="notif__item-date absolute">
                                        26 окт. 2018г. 19:50
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
<!-- Header js -->
<script src="js/header.js"></script>
</body>
</html>