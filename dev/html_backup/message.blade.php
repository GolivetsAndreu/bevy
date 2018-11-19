<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Сообщения</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Message/message.css">  
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Message/message-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">

        @include('layouts.nav')

        <div class="content">
            <div class="container">
                <div class="message-list">
                    <div class="message-add">
                        <button class="message-add-btn">Начать беседу</button>
                    </div>
                    <div class="message-new__wrapper">
                        <div class="message-card">
                            <div class="message-user-foto">
                                <a class="navbar-brand profile-prew" href="#" style="background: url(img/Message/message-profile.png) no-repeat center top / cover;"></a>
                            </div>
                            <div class="message-user-name">
                                Ichigo Kurosaki
                            </div>
                            <div class="message-name">
                                Привет, как дела?
                            </div>
                            <div class="message-date">
                                26 окт. 2018г. 19:45
                            </div>
                        </div>
                        <div class="message-card">
                            <div class="message-user-foto">
                                <a class="navbar-brand profile-prew" href="#" style="background: url(img/Message/message-profile.png) no-repeat center top / cover;"></a>
                            </div>
                            <div class="message-user-name">
                                Ichigo Kurosaki
                            </div>
                            <div class="message-name">
                                Привет, как дела?
                            </div>
                            <div class="message-date">
                                26 окт. 2018г. 19:45
                            </div>
                        </div>
                        <div class="message-card">
                            <div class="message-user-foto">
                                <a class="navbar-brand profile-prew" href="#" style="background: url(img/Message/message-profile.png) no-repeat center top / cover;"></a>
                            </div>
                            <div class="message-user-name">
                                Ichigo Kurosaki
                            </div>
                            <div class="message-name">
                                Привет, как дела?
                            </div>
                            <div class="message-date">
                                26 окт. 2018г. 19:45
                            </div>
                        </div>
                    </div>
                    <div class="message-old__wrapper">
                        <div class="message-card">
                            <div class="message-user-foto">
                                <a class="navbar-brand profile-prew" href="#" style="background: url(img/Message/message-profile.png) no-repeat center top / cover;"></a>
                            </div>
                            <div class="message-user-name">
                                Ichigo Kurosaki
                            </div>
                            <div class="message-name">
                                Привет, как дела?
                            </div>
                            <div class="message-date">
                                26 окт. 2018г. 19:45
                            </div>
                        </div>
                        <div class="message-card">
                            <div class="message-user-foto">
                                <a class="navbar-brand profile-prew" href="#" style="background: url(img/Message/message-profile.png) no-repeat center top / cover;"></a>
                            </div>
                            <div class="message-user-name">
                                Ichigo Kurosaki
                            </div>
                            <div class="message-name">
                                Привет, как дела?
                            </div>
                            <div class="message-date">
                                26 окт. 2018г. 19:45
                            </div>
                        </div>
                        <div class="message-card">
                            <div class="message-user-foto">
                                <a class="navbar-brand profile-prew" href="#" style="background: url(img/Message/message-profile.png) no-repeat center top / cover;"></a>
                            </div>
                            <div class="message-user-name">
                                Ichigo Kurosaki
                            </div>
                            <div class="message-name">
                                Привет, как дела?
                            </div>
                            <div class="message-date">
                                26 окт. 2018г. 19:45
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