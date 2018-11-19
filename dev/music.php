<?php
    session_start();
    require_once "db/db.php";
    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];

    $get_user_songs = $conn->query("SELECT * FROM music WHERE user_id='$user_id' ORDER BY id DESC");
?>

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
    <div class="upload-song d-none fixed relative" id="upload_song">
        <div class="upload-song__close absolute">
            <i class="fa fa-times" id="upload_song_close"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="upload-song__wrapper">
                        <div class="upload-song__heading text-center">
                            <h3>Загрузка аудиозаписи</h3>
                        </div>
                        <form action="controllers/Music/upload-song.php" method="POST" enctype="multipart/form-data">
                            <div class="upload-song__content">
                                <div class="upload-song__content-block">
                                    <label for="song_artist">1) Имя исполнителя: </label>
                                    <input required type="text" id="song_artist" name="song_artist" placeholder="Исполнитель">
                                </div>
                                <div class="upload-song__content-block">
                                    <label for="song_name">2) Название трека: </label>
                                    <input required type="text" id="song_name" name="song_name" placeholder="Название трека">
                                </div>
                                <div class="upload-song__content-block">
                                    <label for="song_name">3) Выберите аудиозапись: </label>
                                    <input required type="file" name="filename">
                                </div>
                                <div class="upload-song__footer text-center">
                                    <button type="submit" name="upload_song_sub">Загрузить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        
        <?php require_once "layouts/nav.php"; ?>

        <div class="content">
            <div id="music" class="music">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                            <div class="music__add-button-set d-flex justify-content-end align-self-center">
                                <button class="music__add-song" id="add_song">Добавить</button>
                            </div>
                            <div class="music__wrapper">
                                
                                <?php while($song = mysqli_fetch_array($get_user_songs)) { ?>

                                <div class="music__item">
                                    <div class="music__item-heading d-flex align-items-center">
                                        <?php echo $song['author'] . ' - ' . $song['name']; ?>
                                    </div>
                                    <div class="music__item-inner d-flex align-items-center">
                                        <audio controls preload="none">
                                          <source src="<?php echo $song['rout']; ?>" type="audio/mpeg">
                                        Ваш браузер не поддерживает прослушивание аудиофайлов :(
                                        </audio>
                                    </div>
                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php require_once "layouts/footer.php"; ?>

    </div>
<!-- Jquery -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
<!-- Main -->
<script src="js/music_player/player.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
</body>
</html>