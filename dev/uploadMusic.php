<?php
include('db/db.php');
session_start();
$user_email = $_SESSION['user_login'];
$get_user = "SELECT * FROM users WHERE email='$user_email'";
$user = mysqli_fetch_array($conn->query($get_user));
$user_id = $user['id'];

$song_nameDB=$_POST['song_name']; 
$artist=$_POST['song_artist']; 
$uploaddir = 'dev/music/';
$_FILES["filename"]["name"];
$hashname=hash("md5",$_FILES['filename']['name']);
$name ="music/".$hashname.".mp3";
//$dump=var_dump($_FILES);
$uploadfile = $uploaddir.basename($name);
if ( move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile))
{
echo "<h3>Файл успешно загружен на сервер</h3>";
$sql="INSERT INTO music (user_id,rout,author,name) VALUES ('$user_id',$name','$artist','$song_nameDB')";
mysqli_query($conn,$sql)or die(mysqli_error($conn));
header('Location:music.php'); exit;
}
else { echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; exit;}
// Выводим информацию о загруженном файле:
?>