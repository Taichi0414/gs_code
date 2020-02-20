<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$lid  = $_POST["lid"];
$kanri_flg = $_POST["kanri_flg"];
$id     = $_POST["id"];

echo $kanri_flg;

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_user_table SET name=:name,lid=:lid,kanri_flg=:kanri_flg WHERE id=:id");
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',  $lid,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id',     $id,     PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error($stmt);
}else{
  redirect("user_select.php");
}
?>
