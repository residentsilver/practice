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

if ($_REQUEST['test'] == 'update') {
    $sql=$pdo->prepare(
        'update book set name=?, auther=?, price=?  where id=?');
    $sql->execute([$_REQUEST['name'], $_REQUEST['auther'], $_REQUEST['price'], $_REQUEST['id']]);
} else if ($_REQUEST['test']  == 'insert') {
    $sql = $pdo->prepare('insert into book values(null,?,?,?)');
    $sql->execute([$_REQUEST['name'], $_REQUEST['auther'], $_REQUEST['price']]);
} else if ($_REQUEST['test']  == 'delete') {
    $sql = $pdo->prepare('delete from book where id = ?');
    $sql->execute([$_REQUEST['id']]);
}

echo '<form class="ib" action="books-result.php" method="post">';
foreach ($pdo->query('select * from book') as $row) {
    //更新
    echo '<form class="ib" action="books-result.php" method="post">';
    echo '<input type="hidden" name="test" value="update">';
    echo '<input type="hidden" name= "id" value="', $row['id'], '" >';
    echo $row['id'];
    echo '<input type="text" name="name" value="', $row['name'], '">';
    echo '<input type="text" name="auther" value="', $row['auther'], '">';
    echo '<input type="text" name="price" value="', $row['price'], '">';
    echo '<input type="submit" name="update" value="更新する">';
    echo '</form>';

    echo '<form class="ib" action="books-result.php" method="post">';
    echo '<input type="hidden" name="test" value="delete">';
    echo '<input type="hidden" name= "id" value="', $row['id'], '" >';
    echo '<input type="submit" name="delete" value="削除する">';
    echo '</form>';
    echo '<br>';
}

echo '</form>';

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