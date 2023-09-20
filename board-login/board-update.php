<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
//変数定義
$name ='';
$login = '';
$password = '';

if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        $login = $_SESSION['user']['login'];
        $password = $_SESSION['user']['password'];

    echo '<form action="board-update-result.php" method="post">';
    echo '<table>';
    echo '<tr><td>お名前</td><td>';
    echo '<input type="text" name="name" value="', $name, '">';
    echo '</td></tr>';
    echo '<input type="hidden" name="login" value="', $login, '">';
    echo '<tr><td>パスワード</td><td>';
    echo '<input type="password" name="password" value="', $password, '">';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit" value="確定">';

}else{
    echo 'ログインしてください。';
}
?>
<?php require '../footer.php'; ?>