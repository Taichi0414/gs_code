<?php

// DB接続
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e){
  exit('DbConnectError:'.$e->getMessage());
}

// データ登録SQL作成
$stmt = $pdo->prepare("SELECT*FROM gs_07_task");
$status = $stmt->execute();

// データ表示
$view_name = "";
$view_dept = "";
$view1 = "";
$view2 = "";
$view3 = "";
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view_name .= "<p>".$result["name"]."</p>";
    $view_dept .= "<p>".$result["dept"]."</p>";
    $view1 .= "<p>".$result["question1"]."</p>";
    $view2 .= "<p>".$result["question2"]."</p>";
    $view3 .= "<p>".$result["question3"]."</p>";
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
<body>
  <table border ="1">
    <tr>
      <th>名前</th><th>部署</th><th>Q1</th><th>Q2</th><th>Q3</th>
    </tr>
    <tr>
      <td><?=$view_name?></td><td><?=$view_dept?></td><td><?=$view1?></td><td><?=$view2?></td><td><?=$view3?></td>
    </tr>
  </table>
</body>
</html>