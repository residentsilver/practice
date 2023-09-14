<?php require('header.php'); ?>

<style>

    
</style>


<div class="insert">
<form action="board-result.php" method="post">
    <input type="hidden" name="id" value="id">
    <input type="hidden" name="insert" value="insert">
    名前<br><input type="text" name="name" placeholder="匿名" class="name" ><br>
    内容<input type="text" name="contents" class="contents">
    <input type="submit" value="投稿する"><br><br>
    投稿内容
</form>
</div>


<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=practice;charset=utf8',
    'root',
    'mariadb'
);

if (isset($_REQUEST['insert'])) {
    if ($_REQUEST['insert'] == 'insert' && $_REQUEST['name'] =='') {
        $sql = $pdo->prepare('insert into board values(null,DEFAULT,?,0,now())');
        $sql->execute([ $_REQUEST['contents']]);
        header("location:http://localhost/~itsys/practice/board.php");
        exit();
    }else if($_REQUEST['insert'] == 'insert') {
        $sql = $pdo->prepare('insert into board values(null,?,?,0,now())');
        $sql->execute([$_REQUEST['name'], $_REQUEST['contents']]);
        header("location:http://localhost/~itsys/practice/board.php");
    exit();
}
}

if (isset($_REQUEST['good'])) {
    $sql = $pdo->prepare(
        'UPDATE board SET good_count = good_count + 1 where id = ?');
    $sql->execute(
        [$_REQUEST['id']]
    );
    header("location:http://localhost/~itsys/practice/board.php");
    exit();
}

// 閲覧のための記述

foreach ($pdo->query('select * from board') as $row) {
    echo '<div class="all">';
    echo $row['id'],'.';
    echo $row['name'] ,' ',$row['time'];
    echo '<div class="content">';
    echo $row['contents'];
    echo ' </div>';
    echo '<div class="good">';
    echo '<form class="ib" action="board-result.php" method="post">';
    echo '<input type="hidden" name="id" value="',$row['id'],'">';
    echo '<input type="submit" name="good" value="いいね">';
    echo '</form>';
    echo $row['good_count'];
    echo ' </div>';
    echo '<br>';
    echo ' </div>';

}; 


?>


</form>

<?php require('../footer.php'); ?>