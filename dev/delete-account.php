<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Удаление аккаунта</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/delete account/delete-account.css"> 
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 co-sm-12 m-auto">
                        <div class="delete-account">
                            <div class="delete-account__heading text-center">
                                <h3>Похоже, вы хотите нас покинуть :( Ну что же..подтвердите свое действие!</h3>
                            </div>
                            <div class="delete-account__block">
                                <form method="POST" action="controllers/Profile/delete-profile.php">
                                    <div class="delete-account__button-set d-flex justify-content-center">
                                        <button name="verify_email_send" type="submit">Удаление аккаунта подтверждаю</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Jquery -->
<script src="libs/jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="libs/bootstrap/bootstrap.min.js"></script>
</body>
</html>