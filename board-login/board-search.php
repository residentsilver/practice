<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php 
if (isset($_SESSION['user'])) {
echo '<form action="board-search-result.php" method="post">';
echo '<input type="text" name="search">';
echo '<input type="submit" value="検索する">';
}else{
echo 'ログインしてください';
}
echo '</form>';
 ?>
<?php require '../footer.php'; ?>