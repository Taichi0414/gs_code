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
    <div class="navbar-header"><a class="navbar-brand" href="select.php">営業結果一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    </div>
  </nav>
</header>

<body>
  <form action="insert.php" method = "POST" enctype="multipart/form-data">
    <p>訪問日時：<input type="date" name="time"></p>
    <p>営業先：<input type="text" name="company"></p>
    <p>先方担当者：<input type="text" name="guest"></p>
    <p>商談内容</p>
    <p>希望賃料<input type="text" name="fee"></p>
    <p>希望エリア<input type="text" name="area"></p>
    <p>その他コメント：<textarea name="comment" rows="30" cols="100"></textarea></p>
    <input type="file" name="upfile" accept="image/*">
    <input type="submit" value="送信">
  </form>
</body>
</html>