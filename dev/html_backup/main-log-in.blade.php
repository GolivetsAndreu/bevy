<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Broome | Вход</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> <!-- Do not remove -->
    <!-- Animate CSS -->
    <link rel="stylesheet" href="libs/animate/animate.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="css/common/fonts.css"> <!-- Do not remove -->
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Main_log-in/main-log-in.css">
    <!-- Capcha -->
    <link rel="stylesheet" href="css/common/capcha.css">  <!-- Do not remove -->
    <!-- Footer CSS -->
    <link rel="stylesheet" href="css/common/footer.css">  <!-- Do not remove -->
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Main_log-in/main-log-in-media.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section id="log-in-main" class="log-in-main relative">
        <div class="log-in-main__geom absolute relative d-flex justify-content-between align-items-center">
            <div class="log-in-main__geom-vr" id="reg_vr"></div>
            <span class="pasfont absolute" id="reg_vr_text">Hi! :)</span>
        </div>
        <div class="log-in-main__inner d-flex justify-content-between align-items-center">
            <div class="log-in-main__right text-center m-auto">
                <span class="upper">Welcome to</span>
                <h1 class="upper pasfont">Broome</h1>
            </div>
            <div class="log-in-main__left d-flex align-items-center">
                 <div class="log-in-main__left-inner text-center m-auto">
                    <h2 class="log-in-main__left-heading">Вход в аккаунт</h2>
                    <form class="log-in-main__form" method="POST" id="form">
                        <div class="log-in-main__form-inner d-flex justify-content-between align-items-center">
                            <div class="log-in-main__form-block">
                                <input type="text" class="log-in-main__login log-in-main__input" name="login" placeholder="Логин">
                            </div>
                            <div class="relative log-in-main__form-block">
                                <input type="password" class="log-in-main__pass log-in-main__input" name="password" placeholder="Пароль">
                                <i class="fa fa-eye absolute"></i>
                            </div>
                        </div>
                        <div class="capcha d-flex justify-content-around m-auto align-items-center">
                            <label id="NumberA" class="capcha-label"></label>
                            <label id="Operand" class="capcha-label"></label>
                            <label id ="NumberB" class="capcha-label"></label>
                            <label class="capcha-label">=</label>
                            <input type ="text" id="Answer" class="capcha-answer" placeholder="0" maxlength="2">
                        </div>
                        <button id="run_capcha" class="log-in-main__btn" type="submit">Войти</button>
                        <div class="remember-me-block d-flex justify-content-center">
                            <div class="remember-me-inner d-flex flex-wrap align-items-center">
                                <input type="checkbox" name="remember_me" id="remember_me">
                                <label for="remember_me">Запомнить меня</label>
                            </div>
                        </div>
                        <a href="#" class="log-in-main__forgot-pass d-block">Забыли пароль?</a>
                        <div>
                            <span class="log-in-main__first-user-link d-block">Впервые в Broome? <a href="/registration">Регистрация.</a></span>
                        </div>
                    </form>
                 </div>
            </div>
        </div>

        @include('layouts.footer')

    </section>
<!-- Scripts -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
<!-- Wow -->
<script src="libs/wow/wow.min.js"></script>
<!-- Main -->
<script src="js/main_log-in/main-log-in.js"></script>
<!-- Capcha -->
<script src="js/capcha/capcha.js" async></script>
</body>
</html>