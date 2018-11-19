<?php
	require_once "controllers/messageController.php";
	require "db/db.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Диалоги</title>
    <meta name="description" content="Social">
    <meta name="keywords" content="social">
    <link rel="shortcut icon" href="img/common/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="libs/normalize/normalize.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="libs/bootstrap/bootstrap.css">
    <!-- Styles CSS -->
    <link rel="stylesheet" href="css/Dialog/dialog.css"> 
    <!-- Media Queries -->
    <link rel="stylesheet" href="css/Dialog/dialog-media.css"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="wrapper">

        <?php require_once "layouts/nav.php"; ?>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-mg-10 col-sm-12 m-auto">
                        <div class="dialog__label text-center">
                            <span>Диалог с <?php $id = returnUserIdFromDialog();  echo"<a href='index.php?user=".$id."'>";?><?php returnUserFromDialog();?></a></span>
                        </div>
                        <div id="dialog" class="dialog">
							<a id="linkForGetMessage" style="color:blue;" onclick="if(loadingOldMessage(40)){$(this).remove();}">Загрузить еще</a>
                            <?php returnMessageForDialog();?>
                        </div>
                        <div class="dialog__write-message">
							<form method="POST" action="controllers/messageController.php" id="addedMessage">
								<div class="new-post d-flex justify-content-between align-items-center">
									<div class="new-post-left relative d-flex align-items-center">
										<i class="fa fa-plus" id="choose_file"></i>
										<textarea name="message" id="messageText" class="textarea" placeholder="Ваше сообщение.."></textarea>
									</div>
									<div class="new-post-right d-flex align-items-center justify-content-between">
										<i class="fa fa-camera"></i>
										<i class="fa fa-music"></i>
										<button name="send" type="button" onclick="addedMessage();" class="new-post-btn">Отправить</button>
									</div>
									<input name="id" type="hidden" value="<?=$_GET['id']?>"/>
									<input name="user" type="hidden" value="<?php echo returnUserId();?>"/>
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
<!-- Autoresize -->
<script src="libs/autoresize/autoresize.jquery.js"></script>
<!-- Main -->
<script src="js/dialog/dialog.js"></script>
<!-- Header js -->
<script src="js/header.js"></script>
<!-- Add post js -->
<script src="js/add-post.js"></script>
<script src="js/dialog/dialog.js"></script>
</body>
</html>