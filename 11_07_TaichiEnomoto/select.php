<?php
session_start();

include("funcs.php");
// var_dump($_FILES["upfile"]);

loginCheck();
// admin();

// DB接続
// include("funcs.php");
$pdo = db_conn();

// データ登録SQL作成
$stmt = $pdo->prepare("SELECT*FROM gs_an_table");
$status = $stmt->execute();

// データ表示
$view ="";
$name = $_SESSION["name"];

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<p>';
    $view .='<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["id"]."|".$result["time"]."|".$result["company"]."|".$result["guest"]."|".$result["fee"]."|".$result["area"]."|".$result["comment"];
    
    $view .='</a>';
    $view .='    ';
    $view .='<a href="delete.php?id='.$result["id"].'">';
    $view .='[ 削除 ]';
    $view .='</a>';
    $view .='</p>';

    $view .='<div class="image">';
    $view .= '<img src = "'."upload/".$result["img"].'">';
    $view .='</div>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/sales.css">
  <title>Document</title>
</head>

<header>
  <!-- <? include("menu.php") ?> -->

  ユーザー名：<div><?=$name?></div>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="index.php">営業実績入力</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="select.php">営業実績一覧</a></div>
    <!-- <div class="navbar-header"><a class="navbar-brand" href="user_select.php">営業マン一覧</a></div> -->
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
    </div>
  </nav>
</header>

<body>
<div>
    <div><?=$view?></div>
</div>

</body>
</html>