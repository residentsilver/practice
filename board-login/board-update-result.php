<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 'root', 'mariadb');

$token =filter_input(INPUT_POST,'token');
    if (empty($_SESSION['token'])||$token !== $_SESSION['token']){
        //不正な処理なので処理を終了する
        die('正規の画面からご使用ください。');//適切なエラーメッセージを表示
    }

if (isset($_SESSION['user'])) {
    $login = $_SESSION['user']['login'];
    $name = $_SESSION['user']['name'];
    $sql = $pdo->prepare('select * from user where login!=? and name=?');
    $sql->execute([$login,$name]);
} 

if (empty($sql->fetchAll())) {
        $sql = $pdo->prepare('update user set name =? ,password=? where login =?');
        $sql->execute([$_REQUEST['name'], $_REQUEST['password'],$_REQUEST['login']]);
        $_SESSION['user'] = [
            'name' => $_REQUEST['name'],
            'password' => $_REQUEST['password'],
            'login'=>$_REQUEST['login']
        ];
        echo 'お客様情報を更新しました';
        	//トークン反映確認のための記述
	echo $_SESSION['token'];
	echo '<br>';
	echo $token;
    }

    else {
        echo '名前がすでに使用されていますので、変更してください。';
    }



?>
<?php require '../footer.php'; ?>