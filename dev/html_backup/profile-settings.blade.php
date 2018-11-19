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
        
        @include('layouts.nav')

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                        <div class="profile-settings">
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
                                            <div class="profile-settings__content-item-content-photo-wrap" style="background: url(img/Profile-Settings/profile-fullsize.jpg) no-repeat center top / cover;"></div>
                                            <div class="profile-settings__content-item-content-photo-settings text-center">
                                                <span>Удалить фото</span>
                                            </div>
                                        </div>
                                        <div class="profile-settings__content-item-content-photo-new">
                                            <input type="file" name="file_pic" id="file_pic" class="inputfile-pic" />
                                            <label for="file_pic"><i class="fa fa-camera"></i> Выбрать фото</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-settings__content-item">
                                    <div class="profile-settings__content-item-heading">
                                        <h3>2) Имя и фамилия</h3>
                                    </div>
                                    <div class="profile-settings__content-item-content">
                                        <form class="d-flex">
                                            <div class="profile-settings__content-item-content-names-wrap">
                                                <input id="profile_settings_name" name="name" type="text" class="profile-settings__content-item-username profile-settings__content-item-names-input" placeholder="Имя">
                                            </div>
                                            <div class="profile-settings__content-item-content-names-wrap">
                                                <input id="profile_settings_surname" name="surname" type="text" class="profile-settings__content-item-usersurname profile-settings__content-item-names-input" placeholder="Фамилия">
                                            </div>
                                        </form>
                                        <span class="input_error name surname"></span>
                                    </div>
                                </div>
                                <div class="profile-settings__content-item">
                                    <div class="profile-settings__content-item-heading">
                                        <h3>3) Дата рождения</h3>
                                    </div>
                                    <div class="profile-settings__content-item-content">
                                        <select id="days" class="profile-settings__content-item-content-select-birth"></select>
                                        <select id="month" class="profile-settings__content-item-content-select-birth"></select>
                                        <select id="year" class="profile-settings__content-item-content-select-birth"></select>
                                    </div>
                                </div>
                                <div class="profile-settings__content-item">
                                    <div class="profile-settings__content-item-heading">
                                        <h3>4) Место жительства</h3>
                                    </div>
                                    <div class="profile-settings__content-item-content">
                                        <select id="country" class="profile-settings__content-item-content-select-birth"><option value="Украина">Украина</option></select>
                                        <select id="city" class="profile-settings__content-item-content-select-birth"><option value="Кропивницкий">Кропивницкий</option></select>
                                        <input type="text" class="profile-settings__content-item-adress profile-settings__content-item-input" placeholder="Адрес" id="adress">
                                    </div>
                                </div>
                                <div class="profile-settings__content-item">
                                    <div class="profile-settings__content-item-heading">
                                        <h3>5) Веб-сайт</h3>
                                    </div>
                                    <div class="profile-settings__content-item-content">
                                        <div>
                                            <input type="text" name="web_site" id="profile_settings_site" class="profile-settings__content-item-site profile-settings__content-item-input" placeholder="URL..">
                                        </div>
                                        <span class="input_error web_site"></span>
                                    </div>
                                </div>
                                <div class="profile-settings__content-item">
                                    <div class="profile-settings__content-item-heading">
                                        <h3>6) Мобильный телефон</h3>
                                    </div>
                                    <div class="profile-settings__content-item-content">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <input type="text" id="profile_settings_phone" name="phone" class="profile-settings__content-item-phone profile-settings__content-item-input" placeholder="+380969999999">
                                            <div class="profile-settings__content-item-content-confirm-for-show">
                                                <input type="checkbox" name="show_phone" id="show_phone_check">
                                                <label for="show_phone_check">Отображать на странице</label>
                                            </div>
                                        </div>
                                        <span class="input_error phone"></span>
                                    </div>
                                </div>
                                <div class="profile-settings__content-item">
                                    <div class="profile-settings__content-item-heading">
                                        <h3>7) Электронный адрес</h3>
                                    </div>
                                    <div class="profile-settings__content-item-content">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <input type="text" name="email" id="profile_settings_mail" class="profile-settings__content-item-mail profile-settings__content-item-input" placeholder="my.mail@my.com">
                                            <div class="profile-settings__content-item-content-confirm-for-show">
                                                <input type="checkbox" name="show_mail" id="show_mail_check">
                                                <label for="show_mail_check">Отображать на странице</label>
                                            </div>
                                        </div>
                                        <span class="input_error email"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-settings__footer text-center">
                                <div>
                                    <button class="profile-settings__save" name="save_btn" id="save_prof_setings">Сохранить</button>
                                </div>
                                <span class="input_error save_btn"></span>
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
<!-- Main -->
<script src="js/profile-settings/profile-settings.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
</body>
</html>