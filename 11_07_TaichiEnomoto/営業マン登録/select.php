<?php

include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view_id = "";
$view_name = "";
$view_lid = "";
$view_lpw = "";
$view_delete = "";

if($status==false) {
  sql_error();
}else{
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view_id .= "<p>";
    $view_id .= '<a href="detail.php?id='.$r["id"].'">';
    $view_id .=$r["id"];
    $view_id .= '</a>';
    $view_id .= "</p>";
    $view_name .= "<p>".$r["name"]."</p>";
    $view_lid .= "<p>".$r["lid"]."</p>";
    $view_lpw .= "<p>".$r["lpw"]."</p>";
    $view_delete .="<p>";
    $view_delete .='<a href="delete.php?id='.$r["id"].'">';
    $view_delete .='削除';
    $view_delete .='</a>';
    $view_delete .='</p>';
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
  </head>

  <body>
          <h2>User list</h2>
          <p><a href="../ブックマーク登録/select_master.php">ブックマーク一覧</a></p>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>ID</th>
                  <th>PW</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?=$view_id?></td>
                  <td><?=$view_name?></td>
                  <td><?=$view_lid?></td>
                  <td><?=$view_lpw?></td>
                  <td><?=$view_delete?></td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
       
  </body>
</html>