<?php
//1.POSTでParamを取得
$id      = $_POST["id"];
// echo $id;
$time    = $_POST["time"];
$company = $_POST["company"];
$guest   = $_POST["guest"];
$fee     = $_POST["fee"];
$area    = $_POST["area"];
$comment = $_POST["comment"];

//2.DB接続など
include("funcs.php");
$pdo = db_conn();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//基本的にinsert.phpの処理の流れと同じです。
$stmt = $pdo->prepare("UPDATE gs_an_table SET time=:time, company=:company, guest=:guest, fee=:fee, area=:area, comment=:comment where id=:id");

$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->bindValue(':time',$time,PDO::PARAM_INT);
$stmt->bindValue(':company',$company,PDO::PARAM_STR);
$stmt->bindValue(':guest',$guest,PDO::PARAM_STR);
$stmt->bindValue(':fee',$fee,PDO::PARAM_INT);
$stmt->bindValue(':area',$area,PDO::PARAM_STR);
$stmt->bindValue(':comment',$comment,PDO::PARAM_STR);

$status = $stmt->execute();

// 次のページへのリダイレクト
if($status==false){
 sql_error(); 
}else{
 redirect("select.php");
}
?>
