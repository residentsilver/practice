<!-- 3作目 -->

<?php require '../header.php'; ?>
<div class="th0">ID
</div>
<div class="th1">商品名</div>
<div class="th1">著者名</div>
<div class="th1">価格
</div><br>


<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=practice;charset=utf8',
    'root',
    'mariadb'
);

foreach ($pdo->query('select * from book') as $row) {

    //更新
    
    echo '<form class="ib" action="books-result.php" method="post">';
    echo '<input t4ype="hidden" name="test" value="update">';
    echo '<input type="hidden" name= "id" value="', $row['id'], '" >';
    echo $row['id'];
    echo '<input type="text" name="name" value="', $row['name'], '">';
    echo '<input type="text" name="auther" value="', $row['auther'], '">';
    echo '<input type="text" name="price" value="', $row['price'], '">';
    echo '<input type="submit" name="update" value="更新する">';
    echo '</form>';

    //削除
    echo '<form class="ib" action="books-result.php" method="post">';

    echo '<input type="hidden" name="test" value="delete">';
    echo '<input type="hidden" name= "id" value="', $row['id'], '" >';
    echo '<input type="submit" name="delete" value="削除する">';
    echo '</form>';
    echo '<br>';

}

?>

<!-- 追加 -->
<form action="books-result.php" method="post">
<input type="hidden" name="test" value="insert">
    <input type="hidden" name="id">
    <input type="text" name="name">
    <input type="text" name="auther">
    <input type="text" name="price">
    <input type="submit" name="insert" value="追加する" >
</form>

<p>検索ワードを入力してください</p>
<form action="books-search-result.php" method="post">
<input type="text" name="search">
<input type="submit" value="検索する">
</form>

<?php require '../footer.php'; ?>