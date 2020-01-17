<?php

// XSS対策
function h ($value){
  return htmlspecialchars($value,ENT_QUOTES);
}

// postデータ取得
$name = $_POST["name"];
$dept = $_POST["dept"];
$question1 = $_POST["question1"];
$question2 = $_POST["question2"];
$question3 = $_POST["question3"];

// DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// データ登録SQL作成
$sql = "INSERT INTO gs_07_task(name,dept,question1,question2,question3)VALUES(:a1,:a2,:a3,:a4,:a5)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1',$name,PDO::PARAM_STR);
$stmt->bindValue(':a2',$dept,PDO::PARAM_STR);
$stmt->bindValue(':a3',$question1,PDO::PARAM_INT);
$stmt->bindValue(':a4',$question2,PDO::PARAM_INT);
$stmt->bindValue(':a5',$question3,PDO::PARAM_INT);

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