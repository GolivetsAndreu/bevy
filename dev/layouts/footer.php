<footer id="footer" class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-between align-items-center">
                            <div class="footer__left">
                                <ul class="d-flex justify-content-between align-items-center animated fadeInUp">
                                    <li>
                                        <a href="about.php">О нас</a>
                                    </li>
                                    
                                    <?php
                                        if (!isset($_SESSION['user_login'])) {
                                    ?>        

                                    <li>
                                        <a href="register.php">Регистрация</a>
                                    </li>
                                    <li>
                                        <a href="login.php">Вход</a>
                                    </li>

                                    <?php
                                        } else {
                                    ?>  

                                    <li>
                                        <a href="controllers/Auth/logout.php">
                                            Выход
                                        </a>
                                    </li>

                                    <?php
                                        }
                                    ?>

                                </ul>
                            </div>
                            <div class="footer__right animated fadeInUp">
                                <span>&copy; <?php echo date('Y'); ?> <span>Bevy</span></span>
                            </div>
                        </div>
                    </div>
                </div>
        </footer>