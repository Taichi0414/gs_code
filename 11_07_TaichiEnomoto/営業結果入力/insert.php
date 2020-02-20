<?php

// postデータ取得
$time    = $_POST["time"];
$company = $_POST["company"];
$guest   = $_POST["guest"];
$fee     = $_POST["fee"];
$area    = $_POST["area"];
$comment = $_POST["comment"];
// echo($time);

// DB接続
include("funcs.php");
$pdo = db_conn();

// データ登録SQL作成
$sql = "INSERT INTO gs_an_table(id,time,company,guest,fee,area,comment)VALUES(NULL,:time,:company,:guest,:fee,:area,:comment)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':time',$time,PDO::PARAM_INT);
$stmt->bindValue(':company',$company,PDO::PARAM_STR);
$stmt->bindValue(':guest',$guest,PDO::PARAM_STR);
$stmt->bindValue(':fee',$fee,PDO::PARAM_INT);
$stmt->bindValue(':area',$area,PDO::PARAM_STR);
$stmt->bindValue(':comment',$comment,PDO::PARAM_STR);

$status = $stmt->execute();

// データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  header("Location: index.php");
  exit;
}


?>