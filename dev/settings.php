<?php
    session_start();
    require_once "db/db.php";

    $user_email = $_SESSION['user_login'];
    $get_user = "SELECT * FROM users WHERE email='$user_email'";
    $user = mysqli_fetch_array($conn->query($get_user));
    $user_id = $user['id'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Настройки</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Settings/settings.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Settings/settings-media.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">
        
        <?php require_once "layouts/nav.php"; ?>

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                        <div class="settings">
                            <div class="settings__heading text-center">
                                <h2>Настройки</h2>
                            </div>
                            <div class="settings__content">
                                <div class="settings__content-item">
                                    <div class="settings__content-item-heading">
                                        <h3>Смена пароля</h3>
                                    </div>
                                    <div class="settings__content-item-content">
                                        <form id="settings_form" method="POST" action="controllers/Profile/update-password.php">
                                            <div class="settings__content-item-content-input-wrapper relative">
                                                <input type="password" name="cur_pass" id="cur_pass" placeholder="Текущий пароль">
                                                <span class="input_error cur_pass"></span>
                                                <i class="fa fa-eye absolute"></i>
                                            </div>
                                            <div class="settings__content-item-content-input-wrapper relative">
                                                <input type="password" name="new_pass" id="new_pass" placeholder="Новый пароль">
                                                <span class="input_error new_pass"></span>
                                                <i class="fa fa-eye absolute"></i>
                                            </div>
                                            <div class="settings__content-item-content-input-wrapper relative">
                                                <input type="password" name="repeat_new_pass" id="repeat_new_pass" placeholder="Повторите пароль">
                                                <span class="input_error repeat_new_pass"></span>
                                                <i class="fa fa-eye absolute"></i>
                                            </div>
                                            <div class="settings__content-item-content-save-pas">
                                                <button type="submit" name="update_pass" id="save_new_pass">Сохранить пароль</button>  
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- <div class="settings__content-item">
                                    <div class="settings__content-item-heading">
                                        <h3>2) Статистика аккаунта</h3>
                                    </div>
                                    <div class="settings__content-item-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus dolores molestias maiores nulla dolor libero explicabo ipsa delectus modi blanditiis.
                                    </div>
                                </div>
                                <div class="settings__content-item">
                                    <div class="settings__content-item-heading">
                                        <h3>3) Идентефикатор учетной записи</h3>
                                    </div>
                                    <div class="settings__content-item-content">
                                        <form action="" method="POST" class="settings__content-item-content-id-wrap">
                                            <div class="settings__content-item-id d-flex align-items-center flex-wrap">
                                                <span>https://broome.com/</span>
                                                <input type="text" id="user_id" name="user_id" class="user-id" placeholder="ID">
                                            </div>
                                            <span class="input_error user_id"></span>
                                            <div class="settings__content-item-content-save-id-wrap">
                                                <button id="save_user_id" type="button">Сохранить ID</button>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                                <div class="settings__content-item">
                                    <div class="settings__content-item-heading">
                                        <h3>Удалить аккаунт</h3>
                                    </div>
                                    <div class="settings__content-item-content d-flex align-items-end">
                                        <div class="settings__content-item-content-del-wrapper d-flex align-items-center flex-wrap">
                                            <div>
                                                <a href="delete-account.php">Удалить мою учетную запись</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="js/settings/settings.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
</body>
</html>