<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ログイン</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="../営業結果入力/index.php">営業実績入力</a></div>
    </div>
    <div class="navbar-header"><a class="navbar-brand" href="../営業結果入力/select_user.php">営業実績一覧</a></div>
    </div>
  </nav>
</header>
<h2>ログインフォーム</h2>
<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="login_act.php" method="post">
NAME:<input type="text" name="name" />
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>


</body>
</html>