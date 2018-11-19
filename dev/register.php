<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Bevy | Регистрация</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="libs/animate/animate.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Main-registration/main-registration.css">
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Main-registration/main-registration-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section id="reg-main" class="reg-main relative">
        <div class="reg-main__geom absolute relative d-flex justify-content-between align-items-center" id="reg_vr">
            <span class="pasfont absolute" id="reg_vr_text">Created with love :)</span>
        </div>
        <div class="reg-main__inner d-flex justify-content-between align-items-center">
            <div class="reg-main__left d-flex align-items-center">
                <div class="reg-main__left-inner text-center m-auto" id="reg_step_1">
                    <h2 class="reg-main__left-heading">Регистрация</h2>
                    <!-- <h3 class="reg-main__left-step">Шаг 1</h3> -->
                    <form class="reg-main__form" method="POST" id="form" action="controllers/Auth/register-user.php">
                        <div class="reg-main__form-inner d-flex justify-content-center flex-column">
                            <div class="d-flex justify-content-center flex-column reg-main__form-block">
                                <input id="user_name" type="text" class="reg-main__login reg-main__input" name="name" placeholder="Имя" required>
                                <span class="input_error name"></span>
                            </div>
                            <div class="d-flex justify-content-center flex-column reg-main__form-block">
                                <input id="user_surname" type="text" class="reg-main__pass reg-main__input" name="surname" placeholder="Фамилия" required>
                                <span class="input_error surname"></span>
                            </div>
                            <div class="d-flex justify-content-center flex-column reg-main__form-block">
                                <input type="email" id="reg_login" class="reg-main__pass reg-main__input" name="email" placeholder="Почта" required>
                                <span class="input_error email"></span>
                                <!-- <span class="reg-main__input-desc"><span>*</span> Номер телефона или электронная почта</span> -->
                            </div>
                            <div class="d-flex justify-content-center flex-column reg-main__form-block relative">
                                <input id="user_password" type="password" class="reg-main__pass reg-main__input" name="password" placeholder="Пароль" required>
                                <span class="input_error password"></span>
                                <i class="fa fa-eye absolute"></i>
                            </div>
                            <div class="d-flex justify-content-center flex-column reg-main__form-block relative">
                                <input id="user_password_repeat" type="password" class="reg-main__pass reg-main__input" name="repeat_password" placeholder="Повторите пароль" required>
                                <span class="input_error repeat_password"></span>
                                <i class="fa fa-eye absolute"></i>
                            </div>
                            <!-- <div class="capcha d-flex justify-content-around m-auto align-items-center">
                                <label id="NumberA" class="capcha-label"></label>
                                <label id="Operand" class="capcha-label"></label>
                                <label id ="NumberB" class="capcha-label"></label>
                                <label class="capcha-label">=</label>
                                <input type ="text" id="Answer" class="capcha-answer" placeholder="0" maxlength="2">
                            </div> -->
                        </div>
                        <button name="reg" id="reg_button" class="reg-main__btn" type="submit">Зарегистрироваться</button>
                        <div class="reg-main__registered">
                            <span>Уже зарегестрированы? </span><a href="login.php">Войти.</a>
                        </div>
                    </form>
                </div>
                <!-- <div class="reg-main__left-inner text-center m-auto" id="reg_step_2">
                    <h2 class="reg-main__left-heading">Регистрация</h2>
                    <h3 class="reg-main__left-step">Шаг 2</h3>
                    <form class="reg-main__form" method="POST" id="form_code">
                        <div class="reg-main__form-inner d-flex justify-content-center flex-column">
                            <div class="reg-main__form-block reg-main__form-block-heading">
                                На ваш <span id="reg_user_login"></span> отправлен код подтверждения процесса регистрации. Введите его в поле ниже.
                            </div>
                            <div class="d-flex justify-content-center flex-column reg-main__form-block">
                                <input type="text" id="reg_code" class="reg-main__pass reg-main__input reg-main__conform-code" name="confirm_code" placeholder="Код подтверждения">
                            </div>
                        </div>
                        <button id="reg_button" class="reg-main__btn" type="submit">Подтвердить</button>
                        <div class="reg-main__registered">
                            <span>Уже зарегестрированы? </span><a href="main-log-in.html">Войти.</a>
                        </div>
                    </form>
                </div> -->
            </div>
            <div class="reg-main__right text-center m-auto">
                <span class="upper">Join the</span>
                <h1 class="upper pasfont">Bevy</h1>
                <span class="upper">Community</span>
            </div>
        </div>
        
        <?php require_once "layouts/footer.php"; ?>

    </section>
<!-- Scripts -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
<!-- Wow -->
<script src="libs/wow/wow.min.js"></script>
<!-- Main -->
<script src="js/main_registration/main-registration.js"></script>
<!-- Registration Validate -->
<script src="js/reg-validate/reg-validate.js" async></script>
</body>
</html>