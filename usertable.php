<?php
session_start();

//1.  DB接続します
require_once('funcs.php');
kanriCheck();

$user_name = $_SESSION['name'];
$kanri_flg = $_SESSION['kanri_flg']; //0が一般、1が管理者→if分で、0か1でhtml内容を変えることができる。

$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM corntest_user_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    sql_error($stmt);
}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr>";
    $view .= "<td>";
    $view .= $result['company_name'];
    $view .= "</td>";
    $view .= "<td align='center'>";
    $view .= $result['name'];
    $view .= "</td>";
    $view .= "<td align='center'>";
    $view .= $result['lid'];
    $view .= "</td>";
    $view .= "</tr>";;
  }
}



?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>オーダー履歴表示</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/option.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">オーダー登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      <p><?= $user_name?>様</p>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <table border="1">
      <tr>
          <th width="160px" height="25px">会社名</th>
          <th width="160px">名前</th>
          <th width="160px">ID</th>

      </tr>
      
      <?= $view ?>
    </table>
</div>
<!-- Main[End] -->

</body>
</html>
