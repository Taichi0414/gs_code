<?php
// 1.GETでデータを取得
$id = $_GET["id"];
// echo $id;

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

// 3.対象のデータを取得
$stmt = $pdo->prepare("SELECT * FROM gs_an_table where id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// 4.返ってきたデータを変数にいれる
$row = $stmt->fetch();
// var_dump($row);

?>

<!-- index.php（登録フォームの画面ソースコードを全コピーして、PHP処理以降のこのファイルをまるっと上書き保存） -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>営業実績修正</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">営業実績一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form action="update.php" method = "POST">
    <p>訪問日時：<input type="date" name="time" value="<?=$row["time"]?>"></p>
    <p>営業先：<input type="text" name="company" value="<?=$row["company"]?>"></p>
    <p>先方担当者：<input type="text" name="guest" value="<?=$row["guest"]?>"></p>
    <p>商談内容</p>
    <p>希望賃料<input type="text" name="fee" value="<?=$row["fee"]?>"></p>
    <p>希望エリア<input type="text" name="area" value="<?=$row["area"]?>"></p>
    <p>その他コメント：<textarea name="comment" rows="30" cols="100"><?=$row["comment"]?></textarea></p>
    <input type="hidden" name="id" value="<?=$row["id"]?>">
    <input type="submit" value="送信">
  </form>
  <form method="post" action="fileupload.php" enctype="multipart/form-data">
    <input type="file" name="upfile" accept="image/*">
    <input type="submit" class="btn btn-success btn-sm" value="Fileアップロード">
</form>

<!-- Main[End] -->


</body>
</html>
