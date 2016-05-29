<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel ="stylesheet" href="style.css">
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

  <title></title>
</head>
<body>
<?php
if (isset($_SESSION['JUDNUM'])){
  $JUDNUM=$_SESSION['JUDNUM'];
  if($JUDNUM==1){
    $UNAME=$_SESSION['UNAME'];
    $UNUM=$_SESSION['UNUM'];
    $LNAME=$_SESSION['LNAME'];
    echo "ログイン者情報:".$UNUM."　".$UNAME."　".$LNAME."研究室 権限".$JUDNUM;
    echo '<br>';
    //include "senpai.php";
    echo '<a href="index.php">トップ・研究室紹介</a> | <a href="labint.php">研究室紹介ページ作成</a> | <a href="paperdata.php">研究室卒論情報</a> | ';
  }else if($JUDNUM==2){
    $UNAME=$_SESSION['UNAME'];
    $UNUM=$_SESSION['UNUM'];
    echo "ログイン者情報:".$UNUM."　".$UNAME."　権限".$JUDNUM;
    echo "<br>";
    //include "kouhai.php";
    echo '<a href="index.php">トップ・研究室紹介</a> | <a href="targetcheck.php">面談オファー確認</a> | <a href="mendanyoyaku.php">面談予約</a> | <a href="paperdata.php">研究室卒論情報</a> | ';

  }else{
    $UNAME=$_SESSION['UNAME'];
    ///$UNUM=$_SESSION['UNUM'];
    $LNAME=$_SESSION['LNAME'];
    echo "ログイン者情報:"."　".$UNAME."　".$LNAME."研究室 権限".$JUDNUM;
    echo '<br>';
    //include "sensei.php";
    echo '<a href="index.php">トップ・研究室紹介</a> | <a href="mokuhyofeedback.php">面談オファー</a> | <a href="mendanyotei.php">面談予定</a> | <a href="paperdata.php">研究室卒論情報</a> |';
  }
  echo '  <a href="login.php">ログアウト</a>';
}else{
   echo '<a href="index.php">トップ・研究室紹介</a> | <a href="login.php">ログイン</a></a>';
}