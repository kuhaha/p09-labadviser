<?php

    include "db.php";

	session_start();

	if(isset($_GET['UNUM'])){

		$GRAYEAR = $_GET['GRAYEAR'];
		$UNAME2  = $_GET['UNAME2'];
		$UNUM  = $_GET['UNUM'];
		$MGTHEMA  = $_GET['MGTHEMA'];
		$REWARD  = $_GET['REWARD'];

	}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel ="stylesheet" href="style.css">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	<title></title>
</head>

<body>
<h1>卒業論文の評価</h1><br>

<form method="post" id="form_top" action="action.php">
<input type="hidden" name="UNUM" value="<?php echo $UNUM ?>" />


<table border="1"><tr><th>卒業年度</th><th>学籍番号</th><th>名前</th><th>卒業論文テーマ</th><th>賞</th></tr>
<tr><th><?php echo $GRAYEAR ?></th><th><?php echo $UNUM?></th><th><?php echo $UNAME2;?></th><th><?php echo $MGTHEMA?></th><th><?php echo $REWARD?></th></tr></table>


<table>
<tr><td>評価</td><td>
<SELECT name="val">
<OPTION value="0">選択してください</OPTION>
<OPTION value="1">★☆☆☆☆</OPTION>
<OPTION value="2">★★☆☆☆</OPTION>
<OPTION value="3">★★★☆☆</OPTION>
<OPTION value="4">★★★★☆</OPTION>
<OPTION value="5">★★★★★</OPTION>
</SELECT></td></tr>
<tr><td>コメント</td><td>
<textarea name="comment" rows="4" cols="40"></textarea></td>
</tr>
<tr><td><input type=submit  name="hyouka" value="送信" class="btn"></td></tr>
</table>
<br>
<a href="paperdata.php">戻る</a>

</form>

</body>
</html>












