
<?php require('../header.php'); ?>

<?php 
$pdo = new PDO(
    'mysql:host=localhost;dbname=shop;charset=utf8',
    'root',
    'mariadb'
);

$pdo->query('select sum(price) as total_price from product' );

?>
<?php require '../footer.php'; ?>