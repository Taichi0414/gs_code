<?php

$menu = "";

if( !isset( $_SESSION["chk_ssid"] ) || $_SESSION["chk_ssid"] != session_id() ){
    $menu .= '<a class="navbar-brand" href="index.php">営業実績登録</a>';
    $menu .= '<a class="navbar-brand" href="user.php">ユーザー登録</a>';
    $menu .= '<a class="navbar-brand" href="login.php">ログイン</a>';
}else if ( $_SESSION["kanri_flg"] != 1){
    $menu .= '<a class="navbar-brand" href="index.php">営業実績登録</a>';
    $menu .= '<a class="navbar-brand" href="user.php">ユーザー登録</a>';
    $menu .= '<a class="navbar-brand" href="logout.php">ログアウト</a>';
  }else{
    $menu .= '<a class="navbar-brand" href="select.php">営業実績一覧</a>';
    $menu .= '<a class="navbar-brand" href="user_select.php">営業マン一覧</a>';
    $menu .= '<a class="navbar-brand" href="index.php">営業実績登録</a>';
    $menu .= '<a class="navbar-brand" href="user.php">ユーザー登録</a>';
    $menu .= '<a class="navbar-brand" href="logout.php">ログアウト</a>';
  }


?>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <?=$menu?>
        </div>
    </div>
</nav>