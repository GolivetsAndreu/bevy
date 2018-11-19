<?php
	session_start();
	function returnUserId(){
		require "db/db.php";
		$user_email = $_SESSION['user_login'];
        $get_user = "SELECT * FROM users WHERE email='$user_email'";
        $user = mysqli_fetch_array($conn->query($get_user));
        return $user['id'];
	}
	function returnUserFromDialog(){
		require "db/db.php";
		$idDialog = $_GET['id'];
		$user_id = returnUserId();
		$sql = "SELECT * FROM dialogs WHERE id = '$idDialog'";
		$dialog = $conn->query($sql);
		$userFromId = 0;
		while(($row = $dialog->fetch_assoc()) !=false){
			$idUSers = explode("|", $row['users']);
			for($i = 0;$i<count($idUSers);$i++){
				if($idUSers[$i] != $user_id){
					$userFromId = $idUSers[$i];
					break;
				}
			}
		}
		$user = $conn->query("SELECT * FROM users WHERE id = '$userFromId'");
		$user = $user->fetch_assoc();
		echo $user['name'].' '.$user['surname'];
	}
	function returnUserIdFromDialog(){
		require "db/db.php";
		$idDialog = $_GET['id'];
		$user_id = returnUserId();
		$sql = "SELECT * FROM dialogs WHERE id = '$idDialog'";
		$dialog = $conn->query($sql);
		$userFromId = 0;
		while(($row = $dialog->fetch_assoc()) !=false){
			$idUSers = explode("|", $row['users']);
			for($i = 0;$i<count($idUSers);$i++){
				if($idUSers[$i] != $user_id){
					$userFromId = $idUSers[$i];
					break;
				}
			}
		}
		$user = $conn->query("SELECT * FROM users WHERE id = '$userFromId'");
		$user = $user->fetch_assoc();
		return $user['id'];
	}
	function returnDivWithMessage($massage, $user, $dialogsId, $i){
		echo '<div class="message-card">
								<div class="message-user-foto">
									<a class="navbar-brand profile-prew" href="dialog.php?id='.$dialogsId[$i].'" style="background: url(users-media/'.$user['user_folder'].'/images/profile-images/'.$user['profile_pic'].') no-repeat center top / cover;"></a>
								</div>
								<div class="message-user-name">
									<a href="dialog.php?id='.$dialogsId[$i].'">'.$user['name'].' '.$user['surname'].'</a>
								</div>
								<div class="message-name">
									'.$massage['message'].'
								</div>
								<div class="message-date">
									'.$massage['time'].'
								</div>
							</div>';
	}
	function returnDivWithMessageForDialog($massage, $i, $user){
		echo '<div class="dialog__item relative">
                                <div class="dialog__item-content d-flex align-items-center">
                                    <div class="dialog__item-pic" style="background: url(users-media/'.$user['user_folder'].'/images/profile-images/'.$user['profile_pic'].') no-repeat center top / cover;"></div>
                                    <div class="dialog__item-info">
                                        <h3 class="dialog__author">'.$user['name'].' '.$user['surname'].'</h3>
                                        <div class="dialog__text">
                                            '.$massage[$i]['message'].'
                                        </div>
                                    </div>
                                </div>
                                <div class="dialog__item-date absolute">
                                    <span>'.$massage[$i]['time'].'</span>
                                </div>
                            </div>';
	}
	function returnNewMessageUser(){
		require "db/db.php";
        $user_id = returnUserId();
		$sql = "SELECT * FROM dialogs WHERE active = '1'";
		$message = $conn->query($sql);
		$dialogsId;
		$idUserFrom;
		$j = 0;
		while(($row = $message->fetch_assoc()) !=false){
			$idUSers = explode("|", $row['users']);
			for($i = 0;$i<count($idUSers);$i++){
				if($idUSers[$i] == $user_id){
					$dialogsId[$j] = $row['id'];
					$j++;
				}
			}
		}
		if(!empty($dialogsId)){
			for($i = 0; $i < count($dialogsId); $i++){
				$lastMessage = $conn->query("SELECT * FROM messages WHERE idDialog = '".$dialogsId[$i]."' ORDER BY time DESC LIMIT 1");
				$result = $lastMessage->fetch_assoc();
				if($result['userTo'] != $user_id) $user = $conn->query("SELECT * FROM users WHERE id = '".$result['userTo']."'");
				else $user = $conn->query("SELECT * FROM users WHERE id = '".$result['userFrom']."'");
				$infoUser = $user->fetch_assoc();
				returnDivWithMessage($result, $infoUser, $dialogsId, $i);
			}
		}
	}
	function returnOldMessageUser(){
		require "db/db.php";
		$user_id = returnUserId();
		$sql = "SELECT * FROM dialogs WHERE active = '0'";
		$message = $conn->query($sql);
		$dialogsId;
		$idUserFrom;
		$j = 0;
		while(($row = $message->fetch_assoc()) !=false){
			$idUSers = explode("|", $row['users']);
			for($i = 0;$i<count($idUSers);$i++){
				if($idUSers[$i] == $user_id){
					$dialogsId[$j] = $row['id'];
					$j++;
				}
			}
		}
		if(!empty($dialogsId)){
			for($i = 0; $i < count($dialogsId); $i++){
				$lastMessage = $conn->query("SELECT * FROM messages WHERE idDialog = '".$dialogsId[$i]."' ORDER BY time DESC LIMIT 1");
				$result = $lastMessage->fetch_assoc();
				if($result['userTo'] != $user_id) $user = $conn->query("SELECT * FROM users WHERE id = '".$result['userTo']."'");
				else $user = $conn->query("SELECT * FROM users WHERE id = '".$result['userFrom']."'");
				$infoUser = $user->fetch_assoc();
				returnDivWithMessage($result, $infoUser, $dialogsId, $i);
			}
		}
	}
	function returnMessageForDialog(){
		require "db/db.php";
		$idDialog = $_GET['id'];
		$message = $conn->query("SELECT * FROM messages WHERE idDialog = '".$idDialog."' ORDER BY time DESC LIMIT 20");
		if($message){
			$index = 0;
			$messageSort;
			$i = 0;
			while($result = mysqli_fetch_array($message)){
				$messageSort[$index] = $result;
				$index++;
			}
			$messageSort = array_reverse($messageSort);
			while(isset($messageSort[$i]['message'])) {
				$user = $conn->query("SELECT * FROM users WHERE id = '".$messageSort[$i]['userFrom']."'");
				$userIfo = $user->fetch_assoc();
				returnDivWithMessageForDialog($messageSort, $i, $userIfo);
				$i++;
			}
		}
	}
	function validForm(){
			require "../db/db.php";
			$idDialog = $_POST['id'];
			$user = $_POST['user'];
			$message = htmlspecialchars($_POST['message']);
			$result = $conn->query("SELECT * FROM dialogs WHERE id = '$idDialog'");
			$result = $result->fetch_assoc();
			$idUSers = explode("|", $result['users']);
			for($i = 0;$i<count($idUSers);$i++){
				if($idUSers[$i] != $user){
					$userTo = $idUSers[$i];
					break;
				}
			}
			$sql = "INSERT INTO messages (message, userFrom, idDialog, userTo)VALUES ('$message', '$user', '$idDialog', '$userTo')";
			$conn->query($sql);
	}
	function returnOldMessageForDialog(){
		if(isset($_POST['id']) && isset($_POST['idM'])){
			require "../db/db.php";
			$idDialog = $_POST['id'];
			$limit = $_POST['idM'];
			$message = $conn->query("SELECT * FROM messages WHERE idDialog = '".$idDialog."' ORDER BY time DESC LIMIT $limit");
			if($message){
				$index = 0;
				$messageSort;
				$i = 0;
				while(($result = $message->fetch_assoc()) !=false){
					$messageSort[$index] = $result;
					$index++;
				}
				$messageSort = array_reverse($messageSort);
				echo '<a id="linkForGetMessage" style="color:blue;" onclick="if(loadingOldMessage('.($_POST['idM']+20).')){$(this).remove();}">Загрузить еще</a>';
				while(isset($messageSort[$i]['message'])) {
					$user = $conn->query("SELECT * FROM users WHERE id = '".$messageSort[$i]['userFrom']."'");
					$userIfo = $user->fetch_assoc();
					returnDivWithMessageForDialog($messageSort, $i, $userIfo);
					$i++;
				}
			}
		}
		else echo '';
	}
	function returnNewMessageForDialog(){
		require "../db/db.php";
		$idDialog = $_POST['idDialog'];
		$message = $conn->query("SELECT * FROM messages WHERE idDialog = '".$idDialog."' ORDER BY time DESC LIMIT 20");
		if($message){
			$index = 0;
			$messageSort;
			$i = 0;
			while(($result = $message->fetch_assoc()) !=false){
				$messageSort[$index] = $result;
				$index++;
			}
			$messageSort = array_reverse($messageSort);
			echo '<a id="linkForGetMessage" style="color:blue;" onclick="if(loadingOldMessage(40)){$(this).remove();}">Загрузить еще</a>';
			while(isset($messageSort[$i]['message'])) {
				$user = $conn->query("SELECT * FROM users WHERE id = '".$messageSort[$i]['userFrom']."'");
				$userIfo = $user->fetch_assoc();
				returnDivWithMessageForDialog($messageSort, $i, $userIfo);
				$i++;
			}
		}
	}
	function createDialog(){
		require "../db/db.php";
		$user1 = $_POST['idUser1'];
		$user2 = $_POST['idUser2'];
		$users = $user1.'|'.$user2.'|';
		$sql = "INSERT INTO dialogs (users, active)VALUES ('$users', '1')";
		if($conn->query($sql)){
			$idDialog = $conn->insert_id;
			header("Location: /dev/dialog.php?id=$idDialog");
			exit;
		}
	}
	if(isset($_POST['createDialog'])) createDialog();
	else if(isset($_POST['newMessage'])){returnNewMessageForDialog();}
	else if(isset($_POST['user'])){ validForm();};
	returnOldMessageForDialog();
?>