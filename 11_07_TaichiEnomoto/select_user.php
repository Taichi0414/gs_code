<?php
session_start();

include("funcs.php");

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

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .='<p>';
    // $view .='<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["id"]."|".$result["time"]."|".$result["company"]."|".$result["guest"]."|".$result["fee"]."|".$result["area"]."|".$result["comment"];
    // $view .='</a>';
    $view .='</p>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="../営業マン登録/login.php">ログイン</a></div>
    </div>
  </nav>
</header>

<body>
<div>
    <div><?=$view?></div>
</div>

</body>
</html>