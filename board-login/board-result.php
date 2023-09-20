<?php require('header.php'); ?>
<?php require 'menu.php'; ?>
<?php session_start(); ?>
<style>

    
</style>

<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=practice;charset=utf8',
    'root',
    'mariadb'
);

//変数定義
$name ='';
$login = '';
$password = '';
if (isset($_SESSION['user'])) {
        $name = $_SESSION['user']['name'];
        $login = $_SESSION['user']['login'];
        $password = $_SESSION['user']['password'];
}

//投稿処理
if (isset($_REQUEST['insert'])) {
    if ($_REQUEST['insert'] == 'insert' ) {
        
        $sql = $pdo->prepare('insert into boards2 values(null,?,?,0,now())');
        $sql->execute([$_SESSION['user']['login'],$_REQUEST['contents']]);
        header("location:http://localhost/~itsys/practice/board-login/board.php");
        exit();
    }
//     else if($_REQUEST['insert'] == 'insert') {
//         $sql = $pdo->prepare('insert into boards2 values(null,?,?,0,now())');
//         $sql->execute([$_REQUEST['name'], $_REQUEST['contents']]);
//         header("location:http://localhost/~itsys/practice/board-login/board.php");
//     exit();
// }
}

//いいねカウント
if (isset($_REQUEST['good'])) {
    $sql = $pdo->prepare(
        'UPDATE boards2 SET good_count = good_count + 1 where id = ?');
    $sql->execute(
        [$_REQUEST['id']]
    );
    header("location:http://localhost/~itsys/practice/board-login/board.php");
    exit();
}

?>


</form>

<?php require('../footer.php'); ?>