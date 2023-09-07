<?php require('header.php'); ?>

<style>

    
</style>

<form action="board-result.php" method="post">
    <input type="hidden" name="id">
    <input type="hidden" name="test" value="insert">
    名前<input type="text" name="name" value="匿名">
    内容<input type="text" name="contents">
    <input type="submit" value="投稿する">
</form>


<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=practice;charset=utf8',
    'root',
    'mariadb'
);

if (isset($_REQUEST['test'])) {
    if ($_REQUEST['test'] == 'insert') {
        $sql = $pdo->prepare('insert into board values(null,?,?,0)');
        $sql->execute([$_REQUEST['name'], $_REQUEST['contents']]);
    }
}

echo '投稿内容';
echo '<br>';
echo '<br>';



if (isset($_REQUEST['good'])) {
    $sql = $pdo->prepare(
        'UPDATE board SET good_count = good_count + 1 where id = ?');
    $sql->execute(
        [$_REQUEST['id']]
    );
}

// 閲覧のための記述

foreach ($pdo->query('select * from board') as $row) {
    echo '<div class="all">';
    echo $row['id'],'.';
    echo $row['name'];
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