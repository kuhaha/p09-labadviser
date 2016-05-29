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
		$sql="SELECT * FROM user WHERE UNAME='{$UNAME}'";
		$rs=mysql_query($sql,$conn);
		if(!$rs){
			die('エラー: '.mysql_error());
		}
		while($row = mysql_fetch_array($rs)){
			if ($row){
				$targetjud=$row['targetjud'];
			}
		}
		if($targetjud==1){
			$url = "targetcheck.php";
			header("Location:". $url);
		}
		echo "ログイン者情報:".$UNUM."　".$UNAME."　権限".$JUDNUM;
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
<h1>目標設定</h1><br>

このシステムを利用する前に、あなたの目標を教えてください。<br><br>
<div id="text1">あなたがこれから研究室に配属し、卒業論文等で取り組んでいきたいこと、興味のある分野などを入力してください。<br>
それらは各研究室の教授へ送信され、面談のオファーを受けることができます。</div>

	<form method="post" id="form_top" action="action.php">

				<table>


				<tr><td>
				<input size="80" type ="text" class="hope" placeholder="あなたの目標を入力してください" name="textdata">
				</td></tr>


				</table>
				<input type=submit  name="mokuhyo" value="送信する" class="btn">

	</form>

	<div id="text2">
	例：<br>
	　・webプログラミングに興味がある。<br>
	　・スマホのゲームを作りたい。<br>
	　・セキュリティに関する知識を深めたい。<br>
	　・とにかくやる気はあるので勉強がしたい。<br>
	　・難しいことにチャレンジしてみたい。<br>
	</div>

</body>
</html>