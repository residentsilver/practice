
<?php require '../header.php'; ?>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=practice;charset=utf8', 
'root', 'mariadb');
$sql=$pdo->prepare('select * from book where name like ?');
$sql->execute(
			[htmlspecialchars('%'.$_REQUEST['search'].'%')]);
            foreach ($sql as $row) {
                echo '<tr>';
                echo '<td>', $row['id'], '</td>';
                echo '<td>', $row['name'], '</td>';
                echo '<td>', $row['auther'], '</td>';
                echo '<td>', $row['price'], '</td>';
                echo '</tr>';
                echo '<br>';
            }
?>

<?php require '../footer.php'; ?>