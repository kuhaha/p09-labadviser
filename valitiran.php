<?php session_start();
include('menubar.php');
include "db.php";
$JUDNUM=$_SESSION['JUDNUM'];

	if(isset($_GET['commentitiran'])){
		$COUNT=0;
		$STAR=0;


		$GRAYEAR = $_GET['GRAYEAR'];
		$UNAME2  = $_GET['UNAME'];
		$UNUM2  = $_GET['UNUM'];
		$MGTHEMA  = $_GET['MGTHEMA'];
		$REWARD  = $_GET['REWARD'];
	}

?>

<h1>卒業論文コメント一覧</h1><br>
<br><br>

<table border="1"><tr><th>卒業年度</th><th>学籍番号</th><th>名前</th><th>卒業論文テーマ</th><th>賞</th></tr>
<tr><th><?php echo $GRAYEAR ?></th><th><?php echo $UNUM2?></th><th><?php echo $UNAME2;?></th><th><?php echo $MGTHEMA?></th><th><?php echo $REWARD?></th></tr></table>

<?php

$sql="SELECT * FROM mgsug WHERE UNUM='{$UNUM2}'";

	// SQL文実行
		$rs = mysql_query($sql, $conn);
		if (!$rs) {
			die('エラー: ' . mysql_error());
		}

		echo '<h2>コメント</h2>';


	while($row = mysql_fetch_array($rs)){
		if ($row){
			$SUGNUM = $row['SUGNUM'];
			$SUGCOMMENT  = $row['SUGCOMMENT'];

			$COUNT+=1;
			$STAR=5-$SUGNUM;

			echo "  ".$COUNT.": ";

			while($SUGNUM!=0){
				echo "★";
				$SUGNUM-=1;
			}
			while($STAR!=0){
				echo "☆";
				$STAR-=1;
			}

			echo "<br>";
			echo "   ".$SUGCOMMENT."<br><br>";
		}
	}




?>
<br>
<a href="paperdata.php">戻る</a>


</body></html>






















