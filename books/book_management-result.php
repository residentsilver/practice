<!-- 2作目 -->

<?php require '../header.php'; ?>
<div class="th0">ID
</div>
<div class="th1">商品名</div>
<div class="th1">著者名</div>
<div class="th1">価格
</div><br>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 
'root', 'mariadb');


if (isset($_REQUEST['command'])) {
	switch ($_REQUEST['command']) {
	case 'insert':
		if (empty($_REQUEST['name']) || 
			!preg_match('/^[0-9]+$/', $_REQUEST['price'])) break;
		$sql=$pdo->prepare('insert into book values(null,?,?,?)');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']), htmlspecialchars($_REQUEST['auther']),$_REQUEST['price']]);
		break;
	case 'update':
		if (empty($_REQUEST['name']) || 
			!preg_match('/^[0-9]+$/', $_REQUEST['price'])) break;
		$sql=$pdo->prepare(
			'update book set name=?, auther=?, price=?  where id=?');
		$sql->execute(
			[htmlspecialchars($_REQUEST['name']), htmlspecialchars($_REQUEST['auther']), $_REQUEST['price'], 	$_REQUEST['id']]);
		break;
	case 'delete':
		$alert = "<script type='text/javascript'>confirm('本当に削除をしますか？');</script>";
		echo $alert;
		$sql=$pdo->prepare('delete from book where id=?');
		$sql->execute([$_REQUEST['id']]);
		break;
	}
}

foreach ($pdo->query('select * from book') as $row) {
	echo '<form class="ib" action="book_management-result.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo $row['id'];
	echo '<input type="text" name="name" value="', $row['name'], '">';
	echo '<input type="text" name="auther" value="', $row['auther'], '">';
	echo '<input type="text" name="price" value="', $row['price'], '">';
	echo '<input type="submit" value="更新">';
	echo '</form> ';

	echo '<form class="ib" action="book_management-result.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="submit" value="削除">';
	echo '</form><br>';
}
?>

<form action="book_management-result.php" method="post">
<input type="hidden" name="command" value="insert">
<div class="td0"></div>
<div class="td1"><input type="text" name="name"></div>
<div class="td1"><input type="text" name="auther"></div>
<div class="td1"><input type="text" name="price"></div>
<div class="td2"><input type="submit" value="追加"></div>

</form>
<?php require '../footer.php'; ?>
