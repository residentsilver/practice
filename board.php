<?php require('header.php'); ?>


<!-- 追加内容 -->

<form action="board-result.php" method="post">
    <input type="hidden" name="id" value="id">
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

echo '投稿内容';
echo '<br>';
echo '<br>';

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
<?php require('../footer.php'); ?>

