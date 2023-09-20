<?php require('header.php');
 ?>


<!-- 追加内容 -->



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

// 閲覧のための記述

foreach ($pdo->query('select * from board') as $row) {
    echo '<div class="all">';
    echo '<div class="introduce">';
    echo $row['id'],'.';
    echo $row['name'] ,' ',$row['time'];
    echo ' </div>';
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

