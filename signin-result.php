<?php require('../header.php'); ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 
	'root', 'mariadb');


    $sql=$pdo->prepare('insert into user values(?, ?, ?,?)');
    if ($sql->execute([$_REQUEST['id'],$_REQUEST['name'], $_REQUEST['age'],$_REQUEST['pass']])) {
        echo '追加に成功しました。';
    } else {
        echo '追加に失敗しました。';
    }
?>
<?php require('../footer.php'); ?>