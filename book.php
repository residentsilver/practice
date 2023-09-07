<!-- 1作目 -->

<?php require('../header.php'); ?>

<form action="book-output.php" method="post">
    
登録中の本を表示する
<input type="submit" name="select" value="表示する"><br>

<label for="id">ＩＤ
<input type="text" name="id"></label>
<br>
名前
<input type="text" name="name" >
<br>
著者名
<input type="text" name="auther">
<br>
<label for="price">価格
<input type="text" name="price" ></label>
<p><input type="submit" name="insert" value="登録"></p>
<p><input type="submit" name="update" value="更新する">
</p>
<p><input type="submit" name="delete" value="削除する"></p>

</form>

<?php require('../footer.php'); ?>