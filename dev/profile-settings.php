<?php
    session_start();

    if (!$_SESSION['user_login']) {
        header('Location: /dev/login.php');
    } else {
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
    <title>Редактирование профиля</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Profile-Settings/profile-settings.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Profile-Settings/profile-settings-media.css"> 
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
                        <div class="profile-settings">
                            <form enctype="multipart/form-data" action="controllers/Profile/save-profile-settings.php" method="POST">
                                <div class="profile-settings__heading text-center">
                                    <h2>Редактирование профиля</h2>
                                </div>
                                <div class="profile-settings__content">
                                    <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>1) Фотография профиля</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content d-flex flex-wrap">
                                            <div class="profile-settings__content-item-content-photo">
                                                <div class="profile-settings__content-item-content-photo-wrap" style="background: url(<?php if (!empty($user['profile_pic']) and !empty($user['user_folder'])) echo 'users-media/' . $user['user_folder'] . '/images/profile-images/' . $user['profile_pic']; else echo 'img/Profile-Main/profile_default.jpg'; ?>) no-repeat center top / cover;"></div>
                                                <div class="profile-settings__content-item-content-photo-settings text-center">
                                                    <span>
                                                        <?php
                                                            if (!empty($user['profile_pic'])) echo '<a href="controllers/Profile/delete-profile-pic.php">Удалить фото</a>';
                                                        ?>
                                                    </span> 
                                                </div>
                                            </div>
                                            <div class="profile-settings__content-item-content-photo-new">
                                                <input type="file" name="user_img" id="file_pic" class="inputfile-pic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>2) Имя и фамилия</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content">
                                            <div class="d-flex">
                                                <div class="profile-settings__content-item-content-names-wrap">
                                                    <input id="profile_settings_name" name="name" type="text" class="profile-settings__content-item-username profile-settings__content-item-names-input" value="<?php echo $user['name']; ?>" placeholder="Имя">
                                                </div>
                                                <div class="profile-settings__content-item-content-names-wrap">
                                                    <input id="profile_settings_surname" name="surname" type="text" class="profile-settings__content-item-usersurname profile-settings__content-item-names-input" value="<?php echo $user['surname']; ?>" placeholder="Фамилия">
                                                </div>
                                            </div>
                                            <span class="input_error name surname"></span>
                                        </div>
                                    </div>
                                    <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>3) Дата рождения</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content">
                                            <select id="year" class="profile-settings__content-item-content-select-birth"></select>
                                            <select id="month" class="profile-settings__content-item-content-select-birth"></select>
                                            <select id="days" class="profile-settings__content-item-content-select-birth"></select>
                                        </div>
                                        <div>
                                            <input type="hidden" name="day" id="user_day" value="<?php echo $user['birth_day']; ?>">
                                            <input type="hidden" name="month" id="user_month" value="<?php echo $user['birth_month']; ?>">
                                            <input type="hidden" name="year" id="user_year" value="<?php echo $user['birth_year']; ?>">
                                        </div>
                                    </div>
                                    <!-- <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>4) Место жительства</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content">
                                            <select id="country" class="profile-settings__content-item-content-select-birth"><option value="Украина">Украина</option></select>
                                            <select id="city" class="profile-settings__content-item-content-select-birth"><option value="Кропивницкий">Кропивницкий</option></select>
                                            <input type="text" class="profile-settings__content-item-adress profile-settings__content-item-input" placeholder="Адрес" id="adress">
                                        </div>
                                    </div> -->
                                    <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>4) Веб-сайт</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content">
                                            <div>
                                                <input type="text" name="web_site" id="profile_settings_site" class="profile-settings__content-item-site profile-settings__content-item-input" value="<?php echo $user['web_site']; ?>" placeholder="URL..">
                                            </div>
                                            <span class="input_error web_site"></span>
                                        </div>
                                    </div>
                                    <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>5) Мобильный телефон</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <input type="text" id="profile_settings_phone" name="phone" class="profile-settings__content-item-phone profile-settings__content-item-input" value="<?php echo $user['phone']; ?>" placeholder="+380969999999">
                                                <div class="profile-settings__content-item-content-confirm-for-show">
                                                    <input type="checkbox" name="show_phone" id="show_phone_check" <?php if ($user['public_phone'] === '1') echo 'checked'; ?>>
                                                    <label for="show_phone_check">Отображать на странице</label>
                                                    <input type="hidden" name="public_phone" id="public_phone" value="<?php echo $user['public_phone']; ?>">
                                                </div>
                                            </div>
                                            <span class="input_error phone"></span>
                                        </div>
                                    </div>
                                    <div class="profile-settings__content-item">
                                        <div class="profile-settings__content-item-heading">
                                            <h3>6) Электронный адрес</h3>
                                        </div>
                                        <div class="profile-settings__content-item-content">
                                            <div class="d-flex align-items-center flex-wrap">
                                                <input type="text" name="email" id="profile_settings_mail" class="profile-settings__content-item-mail profile-settings__content-item-input" value="<?php echo $user['email']; ?>" placeholder="my.mail@my.com">
                                                <div class="profile-settings__content-item-content-confirm-for-show">
                                                    <input type="checkbox" name="show_mail" id="show_mail_check" <?php if ($user['public_email'] === '1') echo 'checked'; ?>>
                                                    <label for="show_mail_check">Отображать на странице</label>
                                                    <input type="hidden" name="public_email" id="public_email" value="<?php echo $user['public_email']; ?>">
                                                </div>
                                            </div>
                                            <span class="input_error email"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-settings__footer text-center">
                                    <div>
                                        <button class="profile-settings__save" name="save_profile_setting" id="save_prof_setings" type="submit">Сохранить</button>
                                    </div>
                                    <span class="input_error save_btn"></span>
                                </div>
                            </form>
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
<script src="js/profile-settings/profile-settings.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
</body>
</html>

<?php } ?>