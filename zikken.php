<?php

	if(isset($_POST['data'])){
		$syokai=$_POST['syokai'];
		echo $syokai;
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
<h1>研究室サポートシステム</h1>


	<form method="post" id="form_top" action="zikken.php">
	<textarea name="syokai" rows="4" cols="40"></textarea></td>
	<input type=submit  name="data" value="送信" class="btn">
	</form>

</body>
</html>