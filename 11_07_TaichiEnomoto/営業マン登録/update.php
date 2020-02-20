<?php
//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$lid    = $_POST["lid"];
$lpw    = $_POST["lpw"];
// echo $id;
// echo $name;
// echo $lid;
// echo $lpw;

//2.DB接続など
include("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name, lid=:lid, lpw=:lpw where id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// 次のページへのリダイレクト
if($status==false){
  sql_error(); 
 }else{
  redirect("select.php");
 }

?>