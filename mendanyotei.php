<?php session_start();
include('menubar.php');
include "db.php";
$JUDNUM=$_SESSION['JUDNUM'];

if(isset($_POST['syounin'])){
	$APDAYUP=$_POST['APDAY'];
	$APDAYGENUP=$_POST['APDAYGEN'];
	$APJUDUP=$_POST['APJUD'];

	$sql="UPDATE appoint set SYONIN = '1' where APDAY='{$APDAYUP}' AND APDAYGEN='{$APDAYGENUP}' AND APJUD='$APJUDUP'";
	$rs=mysql_query($sql,$conn);
}

$sql="SELECT * FROM appoint WHERE LNAME='{$LNAME}' AND APJUD='1'";

$rs=mysql_query($sql,$conn);
if(!$rs) die('エラー: '.mysql_error());


?>
<h1>面談予定画面</h1>
面談イベントの作成や、現在の面談予定一覧を確認することができます。<br><br>


	<table border="1">
		<tr><th>面談予定日付</th><th>予定１</th><th>予定２</th><th>予定３</th></tr>

		<?php
		while($row = mysql_fetch_array($rs)){
			$APDAY=$row['APDAY'];
			$APDAYGEN=$row['APDAYGEN'];
			$datetime = date_create($APDAY);
			$week = array("日", "月", "火", "水", "木", "金", "土");
			$w = (int)date_format($datetime, 'w');

			echo '<tr><th>'.$APDAY.'<br>('.$week[$w].')<br>'.$APDAYGEN.'限<br>';
			//echo '<form method="post" id="form_top" action="action.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type=submit name="cancel" value="削除" class="btn"></from></th>';


			$sql2="SELECT * FROM appoint WHERE LNAME='{$LNAME}' AND APDAY='{$APDAY}' AND APDAYGEN='{$APDAYGEN}'";


			$rs2=mysql_query($sql2,$conn);

			if(!$rs2) die('エラー: '.mysql_error());
			while($row2 = mysql_fetch_array($rs2)){
				$APJUD=$row2['APJUD'];
				$UNAME=$row2['UNAME'];
				$SYONIN=$row2['SYONIN'];
				$APDAYGEN=$row2['APDAYGEN'];


				if($APJUD==1){
					if($APDAYGEN==1){

						echo "<th>9:00～9:25(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==2){
						echo "<th>10:40～11:05(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==3){
						echo "<th>13:00～13:25(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==4){
						echo "<th>14:40～15:05(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==5){
						echo "<th>16:10～16:35(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==6){
						echo "<th>17:50～18:15(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}
				}else if($APJUD==2){
					if($APDAYGEN==1){
						echo "<th>9:30～9:55(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==2){
						echo "<th>11:10～11:35(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==3){
						echo "<th>13:30～13:55(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==4){
						echo "<th>15:10～15:35(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==5){
						echo "<th>16:40～17:05(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==6){
						echo "<th>18:20～18:45(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}
				}else if($APJUD==3){
					if($APDAYGEN==1){
						echo "<th>10:00～10:25(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==2){
						echo "<th>11:40～12:05(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==3){
						echo "<th>14:00～14:25(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==4){
						echo "<th>15:40～16:05(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==5){
						echo "<th>17:10～17:35(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}else if($APDAYGEN==6){
						echo "<th>18:50～19:15(25分)<br>";
						if($UNAME==null){
							echo "予約待ち</th>";
						}else{
							echo "$UNAME".'<br>';
							if($SYONIN==2){
								echo '<form method="post" id="form_top" action="mendanyotei.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="syounin" value="承認" class="btn"></form></th>';
							}else{
								echo "承認済み";
							}
						}
					}
			}
			}
		}
		?>



	</table>


	<form method="post" id="form_top" action="action.php">

		新規面談予定作成 <br>
		<SELECT name="tuki">
			<OPTION value="01">１</OPTION>
			<OPTION value="02">２</OPTION>
			<OPTION value="03">３</OPTION>
			<OPTION value="04">４</OPTION>
			<OPTION value="05">５</OPTION>
			<OPTION value="06">６</OPTION>
			<OPTION value="07">７</OPTION>
			<OPTION value="08">８</OPTION>
			<OPTION value="09">９</OPTION>
			<OPTION value="10">１０</OPTION>
			<OPTION value="11">１１</OPTION>
			<OPTION value="12">１２</OPTION>
		</SELECT>月/
		<SELECT name="hi">
			<OPTION value="01">１</OPTION>
			<OPTION value="02">２</OPTION>
			<OPTION value="03">３</OPTION>
			<OPTION value="04">４</OPTION>
			<OPTION value="05">５</OPTION>
			<OPTION value="06">６</OPTION>
			<OPTION value="07">７</OPTION>
			<OPTION value="08">８</OPTION>
			<OPTION value="09">９</OPTION>
			<OPTION value="10">１０</OPTION>
			<OPTION value="11">１１</OPTION>
			<OPTION value="12">１２</OPTION>
			<OPTION value="13">１３</OPTION>
			<OPTION value="14">１４</OPTION>
			<OPTION value="15">１５</OPTION>
			<OPTION value="16">１６</OPTION>
			<OPTION value="17">１７</OPTION>
			<OPTION value="18">１８</OPTION>
			<OPTION value="19">１９</OPTION>
			<OPTION value="20">２０</OPTION>
			<OPTION value="21">２１</OPTION>
			<OPTION value="22">２２</OPTION>
			<OPTION value="23">２３</OPTION>
			<OPTION value="24">２４</OPTION>
			<OPTION value="25">２５</OPTION>
			<OPTION value="26">２６</OPTION>
			<OPTION value="27">２７</OPTION>
			<OPTION value="28">２８</OPTION>
			<OPTION value="29">２９</OPTION>
			<OPTION value="30">３０</OPTION>
			<OPTION value="31">３１</OPTION>
		</SELECT>日/
		<SELECT name="gen">
			<OPTION value="1">１</OPTION>
			<OPTION value="2">２</OPTION>
			<OPTION value="3">３</OPTION>
			<OPTION value="4">４</OPTION>
			<OPTION value="5">５</OPTION>
			<OPTION value="6">６</OPTION>
		</SELECT> 限 に新規イベントを作成します。
		<input type=submit name="icreate" value="送信" class="btn">
	</FORM>

</body>
</html>
