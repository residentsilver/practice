<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
//変数定義
$name ='';
$login = '';
$password = '';

if(empty($_SESSION['token'])){
    //このセッション専用のトークンを作る
    $token =bin2hex(openssl_random_pseudo_bytes(24));
    //セッション変数としてトークンを登録
    $_SESSION['token'] =$token;
}else {
    $token = $_SESSION['token'];
}

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
    ?>
    <!-- トークンを送る -->
 <input type="hidden" name="token" value="<?php echo htmlspecialchars($token , ENT_COMPAT, 'utf-8'); ?>">
 <?php 
    echo '</form>';
}else{
    echo 'ログインしてください';
}
?>
<?php require '../footer.php'; ?>