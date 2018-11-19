<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Музыка</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Music/music.css">  
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Music/music-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">
        
        @include('layouts.nav')

        <div class="content">
            <div class="container">
                <div class="music-add">
                    <button class="music-add-btn">Добавить</button>
                </div>
                <div class="music-list">
                
                   
                    <div class="music-card relative">
                        <div class="music-play d-flex justify-content-center align-items-center">
                            <i class="fa fa-play" id="play" onclick="playAudio()"></i>
                            <i class="fa fa-pause d-none" id="pause"></i>
                        </div>
                        <div class="music-name">
                            <span>Pokemon-Horror Theme(ochen strashno)</span>
                            <div class="music__play-line absolute relative">
                                <div class="music__play-line-playing absolute"></div>
                                <div class="music__play-line-loading absolute"></div>
                            </div>
                        </div>
                        <div class="music-length">
                            <label id ="currentTime">03:46:12</label>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    
        @include('layouts.footer')

    </div>
<!-- Jquery -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- jPlayer-->
<script type="text/javascript" src="libs/jPlayer/jquery.jplayer.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
<!-- Autoresize -->
<script src="libs/autoresize/autoresize.jquery.js"></script>
<!-- Main -->
<script src="js/music_player/player.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Post js -->
<script src="js/post.js"></script>
</body>
</html>