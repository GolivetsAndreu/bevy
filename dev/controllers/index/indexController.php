<?php
	function validForFriends(){
		require "db/db.php";
		$friend = $_GET['user'];
		$idUser = $GLOBALS['userinfo'];
		$idUser = $idUser['id'];
		$result = $conn->query("SELECT * FROM friends WHERE idUser = '$idUser' AND idFriend = '$idUser'");
		while(($row = $result->fetch_assoc()) !=false){
			if(($friend == $row['idFriend'] && $idUser == $row['idUser']) || ($friend == $row['idUser'] && $idUser == $row['idFriend'])) {
				echo '<br><br><form method="POST" action="controllers/index/indexController.php">
				<input type="submit" style="width:200px;cursor:pointer;" name="delete" value="Удалить из друзей"/>
				<input type="hidden" value="'.$row["id"].'" name="id"/>
				</form>';
				break;
			}
			else{
				echo '<br><br><form method="POST" action="controllers/index/indexController.php">
				<input type="submit" style="width:200px;cursor:pointer;" name="insert" value="Добавить в друзья"/>
				<input type="hidden" value="'.$friend.'" name="id"/>
				<input type="hidden" value="'.$idUser.'" name="user"/>
				</form>';
				break;
			}
		}
	}
	function insertFriend(){
		require "../../db/db.php";
		$id = $_POST['id'];
		$user = $_POST['user'];
		$conn->query("INSERT INTO friends (idUser, idFriend)VALUES ('$user', '$id')");
		header("Location: /dev/index.php?user=$id");
		exit;
	}
	function deleteFriend(){
		require "../../db/db.php";
		$id = $_POST['id'];
		$conn->query("DELETE FROM friends WHERE id = '$id'");
		header("Location: /dev/index.php?user=$id");
		exit;
	}
	function returnFriends(){
		require "db/db.php";
		$user_email = $_SESSION['user_login'];
		$get_user = "SELECT * FROM users WHERE email='$user_email'";
		$user = mysqli_fetch_array($conn->query($get_user));
		$user_id = $user['id'];
		$result = $conn->query("SELECT * FROM friends WHERE idUser = '$user_id'");
		while(($row = $result->fetch_assoc()) !=false){
			$friend = $conn->query("SELECT * FROM users WHERE id = '".$row['idFriend']."'");
			$friend = $friend->fetch_assoc();
			echo '<div class="card-friend">
                                    <div class="foto-friend">
                                        <a class="navbar-brand profile-prew-friend" href="#" style="background: url(users-media/'.$friend['user_folder'].'/images/profile-images/'.$friend['profile_pic'].') no-repeat center top / cover;"></a>
                                    </div>
                                    <div class="name-friend">
                                        '.$friend["name"].' '.$friend["surname"].'
                                    </div>
                                    <div class="date-friend-and-country">
                                        '.$friend["birth_day"].'/'.$friend["birth_month"].'/'.$friend["birth_year"].'
                                    </div>
                                    <div class="date-friend-and-country">
                                        '.$friend["country"].', '.$friend["city"].'
                                    </div>
                                    <div class="link-friend">
                                        <a href="'.$friend["web_site"].'">'.$friend["web_site"].'</a>
                                    </div>
                                    <div class="friend-send-mail">
										<form method="POST" action="controllers/messageController.php">
											<button class="friend-send-btn" type="submit" name="createDialog">Написать</button>
											<input type="hidden" value="'.$friend["id"].'" name="idUser1"/>
											<input type="hidden" value="'.$user_id.'" name="idUser2"/>
										</form>
                                    </div>
                                </div>';
		}
	}
	if(isset($_POST['delete'])) deleteFriend();
	else if(isset($_POST['insert']))insertFriend();
?>