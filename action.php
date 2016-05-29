<?php
    include "db.php";

	session_start();

	if(isset($_POST['login'])){//ログイン処理

		$USERID = $_POST['id'];
		$PWD = $_POST['pass'];

		$sql = "SELECT * FROM user WHERE UNUM='{$USERID}' AND PASS='{$PWD}'";
		// データベースへ接続


		// SQL文実行
		$rs = mysql_query($sql, $conn);
		if (!$rs) {
			die('エラー: ' . mysql_error());
		}

		//問合せ結果の処理
		$row = mysql_fetch_array($rs);  //問合せ結果を配列として一行受け取る
		if ($row){
			$JUDNUM=$row['JUDNUM'];
			if($JUDNUM==1){//先輩

				$JUDNUM = $row['JUDNUM'];//権限
				$UNAME  = $row['UNAME'];//名前
				$UNUM  = $row['UNUM'];//学籍番号
				$LNAME  = $row['LNAME'];//研究室
				$_SESSION['JUDNUM'] = $JUDNUM;
				$_SESSION['UNAME'] = $UNAME;
				$_SESSION['UNUM'] = $UNUM;
				$_SESSION['LNAME'] = $LNAME;


				$sql="SELECT * FROM lab WHERE LNAME='{$LNAME}'";
				// SQL文実行
				$rs = mysql_query($sql, $conn);
				if (!$rs) {
					die('エラー: ' . mysql_error());
				}

				//問合せ結果の処理
				$row = mysql_fetch_array($rs);  //問合せ結果を配列として一行受け取る
				if ($row){
					$_SESSION['LID']=$row['LID'];
				}

				$url = "labdata.php";
				header("Location:". $url);

			}else if($JUDNUM==2){//三年次
			 $JUDNUM = $row['JUDNUM'];//権限
			 $UNAME  = $row['UNAME'];//名前
			 $UNUM  = $row['UNUM'];//学籍番号
			 $_SESSION['JUDNUM'] = $JUDNUM;
			 $_SESSION['UNAME'] = $UNAME;
			 $_SESSION['UNUM'] = $UNUM;

			 $url = "target.php";
			header("Location:". $url);


			}else if($JUDNUM==3){//教授

				$JUDNUM = $row['JUDNUM'];//権限
				$UNAME  = $row['UNAME'];//名前
				$LNAME  = $row['LNAME'];//研究室

				$_SESSION['JUDNUM']=$JUDNUM;
				$_SESSION['UNAME']=$UNAME;
				$_SESSION['LNAME']=$LNAME;

				$url = "mokuhyofeedback.php";
				header("Location:". $url);


			}else{
				$url = "errorpage.php";
				header("Location:". $url);

			}

		}
	}



	if(isset($_POST['hyouka'])){
		$val = $_POST['val'];
		$comment = $_POST['comment'];
		$UNUM=$_POST['UNUM'];

		$sql = "INSERT INTO mgsug (UNUM,SUGNUM,SUGCOMMENT) VALUES ('{$UNUM}','{$val}','{$comment}')";


		// SQL文実行
		$rs = mysql_query($sql, $conn);
		if (!$rs) {
			die('エラー: ' . mysql_error());
		}

			$url = "paperdata.php";
			header("Location:". $url);

	}

	if(isset($_POST['icreate'])){
		$tuki=$_POST['tuki'];
		$hi=$_POST['hi'];
		$gen=$_POST['gen'];
		$LNAME=$_SESSION['LNAME'];//テスト
		$DATE=date("Y");
		$APDAY="$DATE-$tuki-$hi";


		$sql = "INSERT INTO appoint (LNAME,APDAY,APDAYGEN,APJUD,SYONIN) VALUES ('{$LNAME}','{$APDAY}','{$gen}','1','2')";

		$rs=mysql_query($sql,$conn);
		if(!$rs){
			die('エラー: '.mysql_error());
		}

		$sql = "INSERT INTO appoint (LNAME,APDAY,APDAYGEN,APJUD,SYONIN) VALUES ('{$LNAME}','{$APDAY}','{$gen}','2','2')";

		$rs=mysql_query($sql,$conn);
		if(!$rs){
			die('エラー: '.mysql_error());
		}
		;

		$sql = "INSERT INTO appoint (LNAME,APDAY,APDAYGEN,APJUD,SYONIN) VALUES ('{$LNAME}','{$APDAY}','{$gen}','3','2')";

		$rs=mysql_query($sql,$conn);
		if(!$rs){
			die('エラー: '.mysql_error());
		}

		$url = "mendanyotei.php";
		header("Location:". $url);
	}

	if(isset($_POST['cancel'])){
		$APDAY=$_POST['APDAY'];
		$APDAYGEN=$_POST['APDAYGEN'];
		$LNAME=$_SESSION['LNAME'];
		$sql="DELETE FROM appoint WHERE APDAY='{$APDAY}' AND LNAME='{$LNAME}' AND APDAYGEN='{$APDAYGEN}'";


	}

	if(isset($_POST['data'])){
		$LNAME=$_SESSION['LNAME'];
		$pic=$_POST['pic'];
		$syokai=$_POST['syokai'];
		$one=$_POST['one'];
		$two=$_POST['two'];
		$three=$_POST['three'];
		$four=$_POST['four'];
		$five=$_POST['five'];
		$six=$_POST['six'];
		$seven=$_POST['seven'];
		$eight=$_POST['eight'];
		$nine=$_POST['nine'];
		$ten=$_POST['ten'];
		$eleven=$_POST['eleven'];
		$twelve=$_POST['twelve'];

		$sql="SELECT * FROM ldevent WHERE LDMONTH='1' AND LNAME='{$LNAME}'";


		$rs=mysql_query($sql,$conn);

		$sql1="UPDATE ldevent SET LDEVENT='{$one}' WHERE LNAME='{$LNAME}' AND LDMONTH='1'";
		$sql2="UPDATE ldevent SET LDEVENT='{$two}' WHERE LNAME='{$LNAME}' AND LDMONTH='2'";
		$sql3="UPDATE ldevent SET LDEVENT='{$three}' WHERE LNAME='{$LNAME}' AND LDMONTH='3'";
		$sql4="UPDATE ldevent SET LDEVENT='{$four}' WHERE LNAME='{$LNAME}' AND LDMONTH='4'";
		$sql5="UPDATE ldevent SET LDEVENT='{$five}' WHERE LNAME='{$LNAME}' AND LDMONTH='5'";
		$sql6="UPDATE ldevent SET LDEVENT='{$six}' WHERE LNAME='{$LNAME}' AND LDMONTH='6'";
		$sql7="UPDATE ldevent SET LDEVENT='{$seven}' WHERE LNAME='{$LNAME}' AND LDMONTH='7'";
		$sql8="UPDATE ldevent SET LDEVENT='{$eight}' WHERE LNAME='{$LNAME}' AND LDMONTH='8'";
		$sql9="UPDATE ldevent SET LDEVENT='{$nine}' WHERE LNAME='{$LNAME}' AND LDMONTH='9'";
		$sql10="UPDATE ldevent SET LDEVENT='{$ten}' WHERE LNAME='{$LNAME}' AND LDMONTH='10'";
		$sql11="UPDATE ldevent SET LDEVENT='{$eleven}' WHERE LNAME='{$LNAME}' AND LDMONTH='11'";
		$sql12="UPDATE ldevent SET LDEVENT='{$twelve}' WHERE LNAME='{$LNAME}' AND LDMONTH='12'";

		$rs=mysql_query($sql1,$conn);
		$rs=mysql_query($sql2,$conn);
		$rs=mysql_query($sql3,$conn);
		$rs=mysql_query($sql4,$conn);
		$rs=mysql_query($sql5,$conn);
		$rs=mysql_query($sql6,$conn);
		$rs=mysql_query($sql7,$conn);
		$rs=mysql_query($sql8,$conn);
		$rs=mysql_query($sql9,$conn);
		$rs=mysql_query($sql10,$conn);
		$rs=mysql_query($sql11,$conn);
		$rs=mysql_query($sql12,$conn);

		$sql="UPDATE lab SET IPAGE='{$syokai}' WHERE LNAME='{$LNAME}'";
		$rs=mysql_query($sql,$conn);

    		$url = "labdata.php";
    		header("Location:". $url);

	}

	if(isset($_POST['mokuhyo'])){
		$UNAME=$_SESSION['UNAME'];
		$UNUM=$_SESSION['UNUM'];
		$textdata=$_POST['textdata'];
		$sql="UPDATE user SET target='{$textdata}' WHERE UNAME='{$UNAME}'";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('朝廣','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('Apduhan','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('安部','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('石田健','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('一ノ瀬','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('合志','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('下川','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('成','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('田中','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('仲','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('米元','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('稲永','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('澤田','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('古井','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="INSERT INTO feedback(LNAME,UNUM,fbjud) VALUES('安武','{$UNUM}','2')";
		$rs=mysql_query($sql,$conn);
		$sql="UPDATE user SET targetjud='1' WHERE UNAME='{$UNAME}'";
		$rs=mysql_query($sql,$conn);
		$url = "targetcheck.php";
		header("Location:". $url);
	}

	if(isset($_POST['offer'])){
		$LNAME=$_SESSION['LNAME'];
		$sql="SELECT * FROM user WHERE target is not null";
		$rs=mysql_query($sql,$conn);
		if(!$rs){
			die('エラー: '.mysql_error());
		}
		while($row = mysql_fetch_array($rs)){
			if ($row){
				//echo
				$UNUM=$row['UNUM'];
				if(isset($_POST["{$UNUM}"])){
					$sql="UPDATE feedback SET fbjud='1' WHERE LNAME='{$LNAME}' AND UNUM ='{$UNUM}'";
					$rs1=mysql_query($sql,$conn);
					if(!$rs1){
						die('エラー: '.mysql_error());
					}

				}
			}
		}
		$url = "mokuhyofeedback.php";
		header("Location:". $url);
	}


?>















