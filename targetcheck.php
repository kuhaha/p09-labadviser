<?php

include "db.php";
session_start();
$JUDNUM=$_SESSION['JUDNUM'];

	if($JUDNUM==1){
		$url = "errorpage.php";
		header("Location:". $url);
	}else if($JUDNUM==2){
		$UNAME=$_SESSION['UNAME'];
		$UNUM=$_SESSION['UNUM'];
		$LNAME="朝廣";
		echo "ログイン者情報:".$UNUM."　".$UNAME."　権限".$JUDNUM;
		echo '<br>';

		include "kouhai.php";
	}else{
		$url = "errorpage.php";
		header("Location:". $url);
	}



$sql="SELECT * FROM user WHERE UNAME='{$UNAME}'";
		// SQL文実行
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die('エラー: ' . mysql_error());
}
		//問合せ結果の処理
$row = mysql_fetch_array($rs);  //問合せ結果を配列として一行受け取る
if ($row){
	$unum2=$row['UNUM'];
	$target=$row['target'];
}
$sql="SELECT * FROM feedback WHERE UNUM='{$unum2}' AND fbjud='1'";
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die('エラー: ' . mysql_error());
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
<h1>面談オファー確認画面</h1><br>
<div id="text1">
あなたが入力した目標に対しての教授のフィードバックを表示しています。<br>
オファーがあった研究室へは、是非面談に行きましょう。</div>

<table border="1" width="500">
<tr><th>自己目標<br><?php echo $target?></th><th>面談</th></tr>
<?php
while($row = mysql_fetch_array($rs)){
	if($row){
		$LNAME2=$row['LNAME'];
		echo '<tr><td>'.$LNAME2.'研究室から面談オファーがきています。ぜひ参加しましょう。</td><td><a href="mendanyoyaku.php">予約</a></td></tr>';
	}
}
?>
</table>
</body>
</html>