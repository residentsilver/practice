<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>
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


//テーブル結合、コンテンツ内容を検索
$search = '%' . $_REQUEST['search'] . '%';
$sql = $pdo->prepare("select * from boards2 join user on boards2.user_login = user.login  WHERE contents LIKE ?");
$sql->execute([$search]);

foreach ($sql as $row) {
    if(isset($_SESSION['user'])){
    echo '<div class="all">';
    echo '<div class="introduce">';
    echo $row['id'], '.';
    echo $row['name'], ' ', $row['time'];
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
}else echo ' ログインしてください。';
}
?>

<?php require '../footer.php'; ?>