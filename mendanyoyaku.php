<?php session_start();
include('menubar.php');
include "db.php";
$JUDNUM=$_SESSION['JUDNUM'];

if(isset($_POST['yoyaku'])){
	$APDAYUP=$_POST['APDAY'];
	$APDAYGENUP=$_POST['APDAYGEN'];
	$APJUDUP=$_POST['APJUD'];

	$sql="UPDATE appoint set UNAME = '{$user}' where APDAY='{$APDAYUP}' AND APDAYGEN='{$APDAYGENUP}' AND APJUD='{$APJUDUP}'";
	$rs=mysql_query($sql,$conn);
	if(!$rs){
		die('エラー: '.mysql_error());
	}
}


if(isset($_POST['ldata'])){//ログイン処理
	$ldata=$_POST['ldata'];
	$sql="SELECT * FROM appoint WHERE LNAME='{$ldata}' AND APJUD='1'";
	$rs=mysql_query($sql,$conn);
	if(!$rs){
		die('エラー: '.mysql_error());
	}
}else{
	$ldata="朝廣";


	$sql="SELECT * FROM appoint WHERE LNAME='{$ldata}' AND APJUD='1'";

	$rs=mysql_query($sql,$conn);
	if(!$rs) die('エラー: '.mysql_error());
}

?>
	<h1>面談予約画面</h1>
	各研究室への理解をより深めるため、面談を行いましょう。
	<br> 特に、目標設定に対して返信があった研究室へは、積極的に面談に行きましょう。
	<br>
	<br> 面談キャンセルの場合は、出来る限り早めに直接教授に連絡をしてください。
	<br>

	<br>

	<form method="post" id="form_top" action="mendanyoyaku.php">
		<table border="1">
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

	<br>
	<br>
	<h1>
	<?php echo $ldata?>
		研究室
	</h1>
	<table border="1">
		<tr>
			<th>面談予定日付</th>
			<th>予定１</th>
			<th>予定２</th>
			<th>予定３</th>
		</tr>

		<?php
		while($row = mysql_fetch_array($rs)){
			if ($row){
				$APDAY=$row['APDAY'];
				$APDAYGEN=$row['APDAYGEN'];
				$datetime = date_create($APDAY);
				$week = array("日", "月", "火", "水", "木", "金", "土");
				$w = (int)date_format($datetime, 'w');

				echo '<tr><th>'.$APDAY.'<br>('.$week[$w].')</th>';

				$sql2="SELECT * FROM appoint WHERE LNAME='{$ldata}' AND APDAY='{$APDAY}' AND APDAYGEN='{$APDAYGEN}'";


				$rs2=mysql_query($sql2,$conn);

				if(!$rs2){
					die('エラー: '.mysql_error());
				}
				while($row2 = mysql_fetch_array($rs2)){
					if ($row2){
						$APJUD=$row2['APJUD'];
						$UNAME=$row2['UNAME'];
						$SYONIN=$row2['SYONIN'];
						$APDAYGEN=$row2['APDAYGEN'];


						if($APJUD==1){
							if($APDAYGEN==1){
								echo "<th>9:00～9:25(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==2){
								echo "<th>10:40～11:05(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==3){
								echo "<th>13:00～13:25(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==4){
								echo "<th>14:40～15:05(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==5){
								echo "<th>16:10～16:35(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==6){
								echo "<th>17:50～18:15(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}
						}else if($APJUD==2){
							if($APDAYGEN==1){
								echo "<th>9:30～9:55(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==2){
								echo "<th>11:10～11:35(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==3){
								echo "<th>13:30～13:55(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==4){
								echo "<th>15:10～15:35(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==5){
								echo "<th>16:40～17:05(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==6){
								echo "<th>18:20～18:45(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}
						}else if($APJUD==3){
							if($APDAYGEN==1){
								echo "<th>10:00～10:25(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==2){
								echo "<th>11:40～12:05(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==3){
								echo "<th>14:00～14:25(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==4){
								echo "<th>15:40～16:05(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==5){
								echo "<th>17:10～17:35(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
										echo "既に予定が埋まっています".'</th>';
									}
								}
							}else if($APDAYGEN==6){
								echo "<th>18:50～19:15(25分)<br>";
								if($UNAME==null){
									echo '<form method="post" id="form_top" action="mendanyoyaku.php"><input type="hidden" name="APDAY" value="'.$APDAY.'" /><input type="hidden" name="APDAYGEN" value="'.$APDAYGEN.'" /><input type="hidden" name="APJUD" value="'.$APJUD.'" /><input type=submit name="yoyaku" value="面談予約" class="btn"></form></th>';
								}else{
									if($UNAME=="{$user}"){
										if($SYONIN==2){
											echo "承認待ち".'</th>';
										}else{
											echo "承認されています".'</th>';
										}
									}else{
									echo "既に予定が埋まっています".'</th>';
								}
							}
						}
					}


				}
			}





		}
	}
?>



	</table>



</body>
</html>
