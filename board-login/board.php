<?php require('header.php'); ?>
<?php require 'menu.php'; ?>
<?php session_start(); ?>

<!-- 追加内容 -->
<!-- <div class="insert">
<form action="board-result.php" method="post">
    <input type="hidden" name="id" value="id">
    <input type="hidden" name="insert" value="insert">
    <input type="hidden" name="login" value="$login">
    名前<br><input type="text" name="name" placeholder="匿名" class="name" ><br>
    内容<input type="text" name="contents" class="contents">
    <input type="submit" value="投稿する"><br><br>
    投稿内容
    
</form>
</div> -->

<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=practice;charset=utf8',
    'root',
    'mariadb'
);

//変数定義
$name = '';
$login = '';
$password = '';
if (isset($_SESSION['user'])) {
    $name = $_SESSION['user']['name'];
    $login = $_SESSION['user']['login'];
    $password = $_SESSION['user']['password'];
    // print_r($name);
    // print_r($login);
    // print_r($password);
} else {
    echo 'ログインしてください';
}

// <!-- 追加内容 -->
echo '<div class="insert">';
echo '<form action="board-result.php" method="post">';
echo '    <input type="hidden" name="id" value="id">';
echo '    <input type="hidden" name="insert" value="insert">';
// echo '    <input type="hidden" name="login" value="$login">';
echo '名前<br><input type="text" name="name" placeholder="匿名" class="name" ><br>';
echo '内容<input type="text" name="contents" class="contents">';
echo '<input type="submit" value="投稿する"><br><br>';
echo ' 投稿内容';
echo ' </form>';
echo ' </div>';

// 閲覧のための記述
if (isset($_SESSION['user'])) {
    foreach ($pdo->query('select * from boards2') as $row) {
        echo '<div class="all">';
        echo '<div class="introduce">';
        echo $row['id'], '.';
        echo $row['user_login'], ' ', $row['time'];
        echo ' </div>';
        echo '<div class="content">';
        echo $row['contents'];
        echo ' </div>';
        echo '<div class="good">';
        echo '<form class="ib" action="board-result.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<input type="submit" name="good" value="いいね">';
        echo '</form>';
        echo $row['good_count'];
        echo ' </div>';
        echo '<br>';
        echo ' </div>';
    }
};



?>
<?php require('../footer.php'); ?>