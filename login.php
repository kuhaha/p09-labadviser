<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel ="stylesheet" href="style.css">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	<title></title>
</head>

<body>
<h1>研究室配属希望調査支援システム</h1>

	<form method="post" id="form_top" action="action.php">
				<table>
				<tr>
				<td>USERID:<input size="40" type ="id" class="hope" placeholder="USERID" name="id"></td></tr>
				<tr>
				<td>PASSWORD<input size="40" type ="password" class="hope" placeholder="パスワード" name="pass"></td>
				<input type ="hidden" id="rest" name="rest" value="">
				</tr>
				</table>
				<section class="demo1">
				<input type=submit  name="login" value="ログイン" class="btn">
				</section>
			</form>

</body>
</html>