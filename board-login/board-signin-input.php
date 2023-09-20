<?php require('../header.php'); ?>
<?php require 'menu.php'; ?>
<form action="board-signin-result.php" method="post">
    
<label for="id">ログインID
<input type="text" name="id"></label>
<br>
名前
<input type="text" name="name" >
<br>
<label for="pass">パスワード
<input type="text" name="pass" ></label>
<p><input type="submit" value="確定"></p>
</form>

<?php require('../footer.php'); ?>