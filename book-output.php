<?php require('../header.php'); ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 
	'root', 'mariadb');

    // 以下表示する　(select文)
    if (isset($_REQUEST['select'])) {
    foreach ($pdo->query('select * from book') as $row) {
       echo '<p>';
       echo $row['id'],':';
       echo $row['name'],':';
       echo $row['auther'],':';
       echo $row['price'];
       echo '</p>';
    }
    
    // 以下登録（insert文）
}else if (isset($_REQUEST['insert'])) {
    $sql=$pdo->prepare('insert into book values(?, ?, ?,?)');
    if ($sql->execute([$_REQUEST['id'],$_REQUEST['name'], $_REQUEST['auther'],$_REQUEST['price']])) {
        echo '追加に成功しました。';
    } else {
        echo '追加に失敗しました。';
    }

    // 以下更新（update文）
}else if(isset($_REQUEST['update'])) {

    $sql=$pdo->prepare('update book set name = ?, auther = ?, price = ? where id =?');
    if($sql->execute([$_REQUEST['name'], $_REQUEST['auther'],$_REQUEST['price'],$_REQUEST['id']])){
        echo '更新に成功しました';
    }else {
        echo '更新に失敗しました';
    }

    // 以下削除（delete文）
}else if(isset($_REQUEST['delete'])) {
    $sql=$pdo->prepare('delete from book where id =?');
    if($sql->execute([$_REQUEST['id']])){
        echo '削除に成功しました';
    }else{
        echo '削除に失敗しました';
    }
}

?>
<?php require('../footer.php'); ?>