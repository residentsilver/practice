<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php 
if (isset($_SESSION['customer'])){
    $pdo = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'staff', 'password');

    try{
         $sql = $pdo->prepare('insert into favorite values(?,?)');
         $sql ->execute([$_SESSION['customer']['id'],$_REQUEST['id']]);//$_REQUEST['id']は商品IDを指している
         echo 'お気に入りを追加しました。';
         echo '<hr>';
    require 'favorite.php';
    }catch (PDOException $e){
        echo 'DBでエラー！<br>';
        echo $e->getMessage();
    }
}else {
    echo 'お気に入りに商品を追加するには、ログインしてください。';
}
 ?>
 <?php require '../footer.php'; ?>
