<?php require('../header.php'); ?>

<form action="signin-result.php" method="post">
    
<label for="id">id
<input type="text" name="id"></label>
<br>
名前
<input type="text" name="name" >
<br>
年齢
<input type="text" name="age">

<br>
<label for="pass">パスワード
<input type="text" name="pass" ></label>
<p><input type="submit" value="確定"></p>
</form>

<?php require('../footer.php'); ?>