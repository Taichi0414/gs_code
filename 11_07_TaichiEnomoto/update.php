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
// $img     = $_POST["img"];
// echo ($img);

//2.DB接続など
include("funcs.php");
$pdo = db_conn();

// 画像ファイルアップロード+データ送信

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
  // var_dump($img);

  if (is_uploaded_file($tmp_path)){
      if (move_uploaded_file($tmp_path , $file_dir_path)){
          chmod($file_dir_path,0644);
          $img = '<img src = "'.$file_dir_path.'">';
      }else{
          echo "Error:ファイル移動失敗";
      }

      //DBに接続して対象のテーブルに画像の名前を保存する

      $stmt = $pdo->prepare("UPDATE gs_an_table SET time=:time, company=:company, guest=:guest, fee=:fee, area=:area, comment=:comment, img=:img where id=:id");
      
      $stmt->bindValue(':time',$time,PDO::PARAM_INT);
      $stmt->bindValue(':company',$company,PDO::PARAM_STR);
      $stmt->bindValue(':guest',$guest,PDO::PARAM_STR);
      $stmt->bindValue(':fee',$fee,PDO::PARAM_INT);
      $stmt->bindValue(':area',$area,PDO::PARAM_STR);
      $stmt->bindValue(':comment',$comment,PDO::PARAM_STR);
      $stmt->bindValue(':img',$file_name,PDO::PARAM_STR);
      
      $status = $stmt->execute();
  }
}else{
  $stmt = $pdo->prepare("UPDATE gs_an_table SET time=:time, company=:company, guest=:guest, fee=:fee, area=:area, comment=:comment where id=:id");
  
  $stmt->bindValue(':time',$time,PDO::PARAM_INT);
  $stmt->bindValue(':company',$company,PDO::PARAM_STR);
  $stmt->bindValue(':guest',$guest,PDO::PARAM_STR);
  $stmt->bindValue(':fee',$fee,PDO::PARAM_INT);
  $stmt->bindValue(':area',$area,PDO::PARAM_STR);
  $stmt->bindValue(':comment',$comment,PDO::PARAM_STR);
  
  $status = $stmt->execute();
}

// データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  redirect("select.php");
  exit;
}


?>
