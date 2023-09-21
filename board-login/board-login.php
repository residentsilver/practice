<?php require('header.php'); ?>
<?php require 'menu.php'; ?>

<!-- トークンの実装 -->
<?php 
session_start();
if(empty($_SESSION['token'])){
    //このセッション専用のトークンを作る
    $token =bin2hex(openssl_random_pseudo_bytes(24));
    //セッション変数としてトークンを登録
    $_SESSION['token'] =$token;
}else {
    $token = $_SESSION['token'];
}; ?>

<form action="board-login-output.php" method="post">
ログイン名<input type="text" name="login"><br>
パスワード<input type="password" name="password"><br>
<!-- トークンを送る -->
<input type="hidden" name="token" value="<?php echo htmlspecialchars($token , ENT_COMPAT, 'utf-8'); ?>">
<input type="submit" value="ログイン">

<?php require('../footer.php'); ?>