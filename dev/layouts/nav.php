<?php 
	if (isset($_SESSION['user_login'])) {
		$userEmail = $_SESSION['user_login'];
		$getUser = "SELECT * FROM users WHERE email='$userEmail'";
		$userinfo = mysqli_fetch_array($conn->query($getUser));
	}
 ?>

<header id="header" class="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg fixed-top">
                            <div class="container">

                                <?php
                                    if (!isset($_SESSION['user_login'])) {
                                ?>

                                <div class="guest-header d-flex justify-content-end align-items-center">
                                    <div class="d-flex justify-content-between">
                                        <a class="nav-link" href="login.php" style="color: #fff;">Вход</a>
                                        <a class="nav-link" href="register.php" style="color: #fff;">Регистрация</a>
                                    </div>
                                </div>

                                <?php
                                    } else {
                                ?>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerHeader" aria-controls="navbarTogglerHeader" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon d-flex align-items-center"><i class="fa fa-bars"></i></span>
                                </button>
                                <a class="navbar-brand profile-prew" href="/dev" style="background: url(<?php if (!empty($userinfo['profile_pic']) and !empty($userinfo['user_folder'])) echo 'users-media/' . $userinfo['user_folder'] . '/images/profile-images/' . $userinfo['profile_pic']; else echo 'img/Profile-Main/profile_default.jpg'; ?>) no-repeat center top / cover;"></a>
                                <div class="collapse navbar-collapse" id="navbarTogglerHeader">
                                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 header__nav">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="news.php">Новости</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="music.php">Музыка</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="gallery.php">Галерея</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="videos.php">Видео</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="notifications.php">Уведомления</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="message.php">Сообщения</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="friends.php">Друзья</a>
                                        </li>
                                        <li class="nav-item header__menu-item-mobile">
                                            <a class="nav-link" href="profile-settings.php">Редактировать профиль</a>
                                        </li>
                                        <li class="nav-item header__menu-item-mobile">
                                            <a class="nav-link" href="settings.php">Настройки</a>
                                        </li>
                                        <li class="nav-item header__menu-item-mobile">
                                            <a class="nav-link" href="controllers/Auth/logout.php">Выйти</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header__setting">
                                    <div class="header__settings-inner relative">
                                        <div class="header__settings-btn">
                                            <i class="fa fa-cog" id="header_btn_drop"></i>
                                        </div>
                                        <div class="header__settings-drop absolute">
                                            <a href="profile-settings.php">Редактировать профиль</a>
                                            <a href="settings.php">Настройки</a>
                                            <a class="dropdown-item" href="controllers/Auth/logout.php">Выйти</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php
                                    }
                                ?>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>