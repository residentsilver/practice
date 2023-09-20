<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
unset($_SESSION['user']);

$pdo=new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 
	'root', 'mariadb');

$sql=$pdo->prepare('select * from user where login=? and password=?');
$sql->execute([$_REQUEST['login'], $_REQUEST['password']]);

//以下編集実施

foreach ($sql as $row) {
	$_SESSION['user']=[
		'name'=>$row['name'], 
		'password'=>$row['password'], 'login'=>$row['login']]
		;
}
if (isset($_SESSION['user'])) {
	echo 'ようこそ、', $_SESSION['user']['name'], 'さん。';
} else {
	echo 'ログイン名またはパスワードが違います。';
}
?>
<?php require '../footer.php'; ?>
