<?php
header("Content-Type: text/html; charset=UTF-8");
$LNAME='成';
    include "db.php";

	session_start();




	$JUDNUM=$_SESSION['JUDNUM'];
	if($JUDNUM==1){
		$UNAME=$_SESSION['UNAME'];
		$UNUM=$_SESSION['UNUM'];
		$LNAME=$_SESSION['LNAME'];
		echo "ログイン者情報:".$UNUM."　".$UNAME."　".$LNAME."研究室 権限".$JUDNUM;
		echo '<br>';
		include "senpai.php";
	}else if($JUDNUM==2){
			$url = "errorpage.php";
			header("Location:". $url);
	}else{
			$url = "errorpage.php";
			header("Location:". $url);
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
<br><br>
<table border=1>
<tr><th><h1>研究室紹介ページ作成</h1></th></tr>
</table><br>

<table border=1>
<tr><td>
<div id="text1">

<?php echo $LNAME?>研究室
</div></td></tr>

	<form method="post" id="form_top" action="action.php"  enctype="multipart/form-data">
				<tr><td>表紙画像アップロード<input type="file" name="upfile" size="30" /></td></tr>


				<tr><td>紹介文<br>
				<textarea name="syokai" rows="4" cols="40"></textarea></td></tr>

				<tr><td>年間行事（昨年度実績）<br>
				<table>
				<tr><td>４月</td><td><input type="text" name="four" size="30" maxlength="30" ></td>
				<tr><td>５月</td><td><input type="text" name="five" size="30" maxlength="30" >
				<tr><td>６月</td><td><input type="text" name="six" size="30" maxlength="30" >
				<tr><td>７月</td><td><input type="text" name="seven" size="30" maxlength="30" >
				<tr><td>８月</td><td><input type="text" name="eight" size="30" maxlength="30" >
				<tr><td>９月</td><td><input type="text" name="nine" size="30" maxlength="30" >
				<tr><td>１０月</td><td><input type="text" name="ten" size="30" maxlength="30" >
				<tr><td>１１月</td><td><input type="text" name="eleven" size="30" maxlength="30" >
				<tr><td>１２月</td><td><input type="text" name="twelve" size="30" maxlength="30" >
				<tr><td>１月</td><td><input type="text" name="one" size="30" maxlength="30" >
				<tr><td>２月</td><td><input type="text" name="two" size="30" maxlength="30" >
				<tr><td>３月</td><td><input type="text" name="three" size="30" maxlength="30" >
				</td></tr></table></td></tr>

				<tr><td><input type=submit  name="data" value="送信" class="btn"></td></tr>
			</form>
</table>


</body>
</html>