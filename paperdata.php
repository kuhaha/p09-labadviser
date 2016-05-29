<?php session_start();
include('menubar.php');
include "db.php";
$JUDNUM=$_SESSION['JUDNUM'];

$count1=0;
$count2=0;
$count3=0;
$STAR=0;


if(isset($_POST['ldata'])){//ログイン処理
	$sql = "SELECT * FROM user WHERE LNAME='{$_POST['ldata']}' AND JUDNUM=4";
}else{
	$sql = "SELECT * FROM user WHERE LNAME='{$LNAME}' AND JUDNUM=4";
}

// SQL文実行
$rs3 = mysql_query($sql, $conn);

?>

<h1>研究室卒論情報</h1>
	<form method="post" id="form_top" action="paperdata.php">
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
		<?php if(isset($_POST['ldata'])){
	echo $_POST['ldata']."研究室" ;
}else{
	echo $LNAME.'研究室';
}?>
	</h1>


	<?php
if(isset($_POST['ldata'])){
	$sql2 = "SELECT AVG(GPA) FROM user WHERE LNAME='{$_POST['ldata']}' AND JUDNUM=4";//ＧＰＡ
	// SQL文実行
	$rs = mysql_query($sql2, $conn);

   	while($row2 = mysql_fetch_array($rs)){
		if($row2){
			echo  'GPA平均:'.$row2['AVG(GPA)'];
		}
     }
}else{
		$sql2 = "SELECT AVG(GPA) FROM user WHERE LNAME='朝廣' AND JUDNUM=4";//ＧＰＡ
		// SQL文実行
		$rs = mysql_query($sql2, $conn);

	while($row2 = mysql_fetch_array($rs)){
		if($row2){
			echo  'GPA平均:'.$row2['AVG(GPA)'];
		}
	}
}?>
	<br>
	<?php
    if(isset($_POST['ldata'])){
		$sql2 = "SELECT course FROM user WHERE LNAME='{$_POST['ldata']}' AND JUDNUM=4 ";//ＧＰＡ
		// SQL文実行
		$rs = mysql_query($sql2, $conn);

	    while($row2 = mysql_fetch_array($rs)){
		    if($row2){
		    	if($row2['course']==1){
			    	$count1+=1;
			    }else if($row2['course']==2){
			    	$count2+=1;
		    	}else{
			    	$count3+=1;
		     	}
		    }
		}
	    echo '就職:'.$count1.'  進学:'.$count2.'  保留:'.$count3;

     }else{
		$sql2 = "SELECT course FROM user WHERE LNAME='朝廣' AND JUDNUM=4";//ＧＰＡ
		// SQL文実行
		$rs = mysql_query($sql2, $conn);
	    while($row2 = mysql_fetch_array($rs)){
            if($row2){
		    	if($row2['course']==1){
			    	$count1+=1;
			    }else if($row2['course']==2){
			    	$count2+=1;
		    	}else{
			    	$count3+=1;
		     	}
	         }
	    }
	    echo '就職:'.$count1.'  進学:'.$count2.'  保留:'.$count3;
     }
 ?>


	<table border="1">
		<tr>
			<th>卒業年度</th>
			<th>学籍番号</th>
			<th>名前</th>
			<th>配属当初目標</th>
			<th>卒業論文テーマ</th>
			<th>賞</th>
			<th>評価</th>
			<th>評価コメント</th>
			<th>評価入力</th>
		</tr>

		<?php

	while($row = mysql_fetch_array($rs3)){
		if ($row){
			$GRAYEAR = $row['GRAYEAR'];
			$UNAME2  = $row['UNAME'];
			$UNUM2  = $row['UNUM'];
			$MGTHEMA  = $row['MGTHEMA'];
			$REWARD  = $row['REWARD'];

			$sql="SELECT AVG(SUGNUM) FROM mgsug WHERE UNUM='{$UNUM2}'";
			$rs4 = mysql_query($sql, $conn);
			while($row4 = mysql_fetch_array($rs4)){
				if($row4){
					$AVG=$row4['AVG(SUGNUM)'];
				}
			};
			$AVG=round($AVG);




		echo '<tr><th>'."$GRAYEAR".'</th><th>'."$UNUM2".'</th><th>'.$UNAME2.'</th><th></th><th>'."$MGTHEMA".'</th><th>'."$REWARD".'</th><th>';

			$STAR=5-$AVG;
			while($AVG!=0){
				echo "★";
				$AVG-=1;
			}
			while($STAR!=0){
				echo "☆";
				$STAR-=1;
			}
		echo '</th><th>'
		.'<form method="get" id="form_top" action="valitiran.php"><input type="hidden" name="GRAYEAR" value="'.$GRAYEAR.'" /><input type="hidden" name="UNAME" value="'.$UNAME2.'" /><input type="hidden" name="UNUM" value="'.$UNUM2.'" /><input type="hidden" name="MGTHEMA" value="'.$MGTHEMA.'" /><input type="hidden" name="REWARD" value="'.$REWARD.'" /><table border="1"><input type=submit name="commentitiran" value="コメント一覧" class="btn"></table></form>'.'</th><th>'.
		'<form method="get" id="form_top" action="val.php"><input type="hidden" name="GRAYEAR" value="'.$GRAYEAR.'" /><input type="hidden" name="UNUM" value="'.$UNUM2.'" /><input type="hidden" name="REWARD" value="'.$REWARD.'" /><input type="hidden" name="UNAME2" value="'.$UNAME2.'" /><input type="hidden" name="MGTHEMA" value="'.$MGTHEMA.'" /><table border="1"><input type=submit value="評価する" class="btn"></table></form>'
		.'</th>'.'</tr>';
		}
		//データの送り方'.$UNUM2.'を送りたい
	}
?>

	</table>

</body>
</html>













