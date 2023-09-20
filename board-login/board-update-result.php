<?php session_start(); ?>

<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 'root', 'mariadb');


if (isset($_SESSION['user'])) {
    $login = $_SESSION['user']['login'];
    $sql = $pdo->prepare('select * from user where login!=?');
    $sql->execute([$login]);
} 

if (empty($sql->fetchAll())) {
        $sql = $pdo->prepare('update user set name =? ,password=? where login =?');
        $sql->execute([$_REQUEST['name'], $_REQUEST['password'],$_REQUEST['login']]);
        $_SESSION['user'] = [
            'name' => $_REQUEST['name'],
            'password' => $_REQUEST['password']
        ];
        echo 'お客様情報を更新しました';
    }

    else {
        echo 'ログイン名がすでに使用されていますので、変更してください。';
    }


?>
<?php require '../footer.php'; ?>