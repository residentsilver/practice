<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php session_start(); ?>   
<?php 
if(isset($_SESSION['user'])){
echo '<p>ログアウトしますか？</p>';
echo '<a href="board-logout-result.php">ログアウト</a>';
}else {
    echo 'すでにログアウトしています。';
}
 ?>
<?php require '../footer.php'; ?>