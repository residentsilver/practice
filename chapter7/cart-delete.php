<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
<?php 

unset($_SESSION['product'][$_REQUEST['id']]);
echo 'カートから削除されました。';
echo '<hr>';
require 'cart.php';
?>

<?php require '../footer.php'; ?>

