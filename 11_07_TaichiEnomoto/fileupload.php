<?php
//[FileUploadCheck--START--]
// var_dump($_FILES["upfile"]);

if(isset($_FILES["upfile"]) && $_FILES["upfile"]["error"] == 0) {
    $file_name = $_FILES["upfile"]["name"];
    $tmp_path = $_FILES["upfile"]["tmp_name"];//一時保存先のパスを取得

    $extension = pathinfo($file_name, PATHINFO_EXTENSION); //拡張子を取得する
    $file_name = date("YmdHis").md5(session_id()).'.'.$extension; //ユニークな名前を生成
    // echo $extension;
    // var_dump($file_name);

    // アップロード処理
    $img = "";
    $file_dir_path = "upload/".$file_name; //アップロード先

    if (is_uploaded_file($tmp_path)){
        if (move_uploaded_file($tmp_path , $file_dir_path)){
            chmod($file_dir_path,0644);
            $img = '<img src = "'.$file_dir_path.'">';
        }else{
            echo "Error:ファイル移動失敗";
        }

        //DBに接続して対象のテーブルに画像の名前を保存する
        
        //DB接続します(エラー処理追加)
        include("funcs.php");
        $pdo = db_conn();

        $stmt = $pdo->prepare("UPDATE gs_an_table SET img=:img WHERE id = :id");
        $stmt->bindValue(':img',$file_name,PDO::PARAM_STR);
        $status = $stmt->execute();

        $result=
        header("Location: select.php");
        exit;
    }
}else{
    echo "アップロード失敗";
}

// // データ登録処理後
// if($status==false){
//     $error = $stmt->errorInfo();
//     exit("QueryError:".$error[2]);
//   }else{
//     header("Location: index.php");
//     exit;
//   }

//[FileUploadCheck--END--] 


?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アップロード画面サンプル</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <main>
    <!-- ヘッダー -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="file_view.php">写真アップロード</a></div>
            </div>
        </nav>
    </header>
    <!-- ヘッダー -->
    <?php echo $img; ?>

</main>
</body>
</html>