<?php session_start();
include('menubar.php');
include "db.php";
$JUDNUM=$_SESSION['JUDNUM'];

$sql="SELECT * FROM user WHERE target is not null AND JUDNUM ='2'";
$rs=mysql_query($sql,$conn);
if(!$rs){
	die('エラー: '.mysql_error());
}
?>

<h1>面談オファー画面</h1>
	<form method="post" id="form_top" action="action.php">
		<table border="1">
			<tr>
				<th>学籍番号</th>
				<th>名前</th>
				<th>設定目標</th>
				<th>オファー</th>
			</tr>
			<?php
	while($row = mysql_fetch_array($rs)){
		if ($row){
			$UNUM=$row['UNUM'];
			$UNAME=$row['UNAME'];
			$target=$row['target'];

			echo '<tr><td>'."$UNUM".'</td><td>'."$UNAME".'</td><td>'."$target".'</td><td>';
			$sql2="SELECT * FROM feedback WHERE UNUM='{$UNUM}' AND LNAME='{$LNAME}'";
			$rs1=mysql_query($sql2,$conn);
			while($row2 = mysql_fetch_array($rs1)){
				if ($row2){
					if($row2['fbjud']==1){
						echo "オファー済";
					}else{
						echo '<input type="checkbox" name='.$UNUM.'>';
					}
				}
			}


			echo'</td></tr>';
		}
	}
?>
		</table>
		<input type=submit name="offer" value="送信" class="btn">
	</form>

</body>
</html>
