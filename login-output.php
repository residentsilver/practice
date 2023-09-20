<?php require('../header.php'); ?>
<?php require 'menu.php'; ?>
<?php
echo 'ようこそ、', $_REQUEST['id'], 'さん';

if($_REQUEST['pass'] =='pass'){
echo 'ログインに成功しました。';
}else{
    echo 'ログインに失敗しました。';
}
?>

<?php require('../footer.php'); ?>