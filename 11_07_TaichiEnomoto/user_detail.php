<?php
session_start();
include("funcs.php");
loginCheck();
admin();

$id = $_GET["id"]; //?id~**を受け取る

$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if($status==false) {
    sql_error($stmt);
}else{
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザーデータ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <? include("menu.php") ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>[編集]</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ID：<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>管理権限：
     <select class="form-control" name="kanri_flg">
        <option value="0">一般</option>
        <option value="1">管理者</option>
      </select> 
     </label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>">
    </fieldset>
  </div>
  <a href="user_select.php">[ 戻る ]</a>
</form>
<!-- Main[End] -->


</body>
</html>
