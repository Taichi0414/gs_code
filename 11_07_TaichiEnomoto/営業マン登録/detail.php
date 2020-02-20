<?php
// 1.GETでデータを取得
$id = $_GET["id"];
// echo $id;

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

// 3.対象のデータを取得
$stmt = $pdo->prepare("SELECT * FROM gs_user_table where id = :id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

// 4.返ってきたデータを変数にいれる
$row = $stmt->fetch();
// var_dump($row);

?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form method ="POST" action="update.php" class="form-signin">
    <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">User Registration</h1>
    <label for="inputname" class="sr-only">User name</label>
    <input type="text" name="name" value="<?=$row["name"]?>" id="inputname" class="form-control" placeholder="User name" required autofocus>
    <label for="inputID" class="sr-only">User ID</label>
    <input type="text" name="lid" value="<?=$row["lid"]?>" id="inputID" class="form-control" placeholder="User ID" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="lpw" value="<?=$row["lpw"]?>" id="password" class="form-control" placeholder="Password" required autofocus>
    <input type="hidden" name="id" value="<?=$row["id"]?>">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Registration</button>

</form>
</body>
</html>