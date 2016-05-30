<?php session_start();
include('menubar.php');
include "db.php";

$LNAME = 'Apduhan';
if(isset($_POST['ldata'])){//ログイン処理
	$LNAME=$_POST['ldata'];
	$sql = "SELECT * FROM ldevent WHERE LNAME='{$LNAME}'";
	// SQL文実行
	$rs = mysql_query($sql, $conn);
	if (!$rs) die('エラー: ' . mysql_error());
	$sql1 = "SELECT * FROM lab WHERE LNAME='{$LNAME}'";
	$rs1 = mysql_query($sql1, $conn);
	if (!$rs1) die('エラー: ' . mysql_error());
	$row1 = mysql_fetch_array($rs1);  //問合せ結果を配列として一行受け取る
	if ($row1){
		$IPAGE=$row1['IPAGE'];
	}
}else{
	$sql = "SELECT * FROM ldevent WHERE LNAME='{$LNAME}'";
	// SQL文実行
	$rs = mysql_query($sql, $conn);
	if (!$rs) die('エラー: ' . mysql_error());

	$sql1 = "SELECT * FROM lab WHERE LNAME='{$LNAME}'";
	$rs1 = mysql_query($sql1, $conn);
	if (!$rs1) die('エラー: ' . mysql_error());
	$row1 = mysql_fetch_array($rs1);  //問合せ結果を配列として一行受け取る
	if ($row1) $IPAGE=$row1['IPAGE'];
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

<title></title>
</head>

<body>
<?php
if (isset($LNAME)){
	$sql="SELECT * FROM lab WHERE LNAME='{$LNAME}'";
}else{
	$sql="SELECT * FROM lab LIMIT 1";
}
// SQL文実行
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die('エラー: ' . mysql_error());
}

//問合せ結果の処理
$row = mysql_fetch_array($rs);  //問合せ結果を配列として一行受け取る
$imgfile = "images/dummy.jpg";
if ($row){
	$LID	=$row['LID'];
	if (is_file("images/" . $LID . ".jpg")){
		$imgfile = "images/" . $LID . ".jpg";
	} 
	$LNAME=$row['LNAME'];
	$IPAGE=$row['IPAGE'];
}
?>

	<h1>各種研究室紹介</h1>
	<br>

	<form method="post" id="form_top" action="index.php">
		<table border="1" width="70%">
			<tr>
				<th><input type=submit name="ldata" value="朝廣" class="btn"></th>
				<th><input type=submit name="ldata" value="Apduhan" class="btn"></th>
				<th><input type=submit name="ldata" value="安部" class="btn"></th>
				<th><input type=submit name="ldata" value="石田健" class="btn"></th>
				<th><input type=submit name="ldata" value="一ノ瀬" class="btn"></th>
				<th><input type=submit name="ldata" value="合志" class="btn"></th>
				<th><input type=submit name="ldata" value="下川" class="btn"></th>
				<th><input type=submit name="ldata" value="成" class="btn"></th>
			</tr>
			<tr>
				<th><input type=submit name="ldata" value="田中" class="btn"></th>
				<th><input type=submit name="ldata" value="仲" class="btn"></th>
				<th><input type=submit name="ldata" value="米元" class="btn"></th>
				<th><input type=submit name="ldata" value="稲永" class="btn"></th>
				<th><input type=submit name="ldata" value="澤田" class="btn"></th>
				<th><input type=submit name="ldata" value="古井" class="btn"></th>
				<th><input type=submit name="ldata" value="安武" class="btn"></th>
			</tr>
		</table>
	</form>

	<table border="1" width="70%">
		<tr>
			<td colspan="2"><h1> <?php echo $LNAME."研究室"?> </h1>
				<img src="<?php echo $imgfile ?>" width="400" height="300" alt="画像なし"><br> <?php echo $IPAGE ?>
			</td>
		</tr>
		<tr>
			<td><h1>年間行事</h1>
				<table border="1" width="100%">
<?php
	for($i=4;$i<=12;$i++){
		$sql = "SELECT * FROM ldevent WHERE LNAME='{$LNAME}' AND LDMONTH='{$i}'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die('エラー: ' . mysql_error());
		while($row2 = mysql_fetch_array($rs)){
			if($row2) echo "<tr><td>".$i."月"."</td><td>".$row2['LDEVENT']."</td></tr>";
		}
	}

	for($i=1;$i<=3;$i++){
		$sql = "SELECT * FROM ldevent WHERE LNAME='{$LNAME}' AND LDMONTH='{$i}'";
		$rs = mysql_query($sql, $conn);
		if (!$rs) die('エラー: ' . mysql_error());

		while($row2 = mysql_fetch_array($rs)){
			if($row2)	echo "<tr><td>".$i."月"."</td><td>".$row2['LDEVENT']."</td></tr>";
		}
	}

?>
				</table>
			</td>

		</tr>
	</table>





	<br>


</body>
</html>
