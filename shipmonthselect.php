<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=corntest_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM corntest_an_table WHERE shipmonth=1");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<tr>";
    $view .= "<td>";
    $view .= $result['indate'];
    $view .= "</td>";
    $view .= "<td align='center'>";
    $view .= $result['shipmonth'];
    $view .= "</td>";
    $view .= "<td align='center'>";
    $view .= $result['duemonth'];
    $view .= "</td>";
    $view .= "<td align='center'>";
    $view .= $result['type'];
    $view .= "</td>";
    $view .= "<td align='right'>";
    $view .= $result['rate'];
    $view .= "</td>";
    $view .= "<td align='right'>";
    $view .= "$";
    $view .= $result['amount'];
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
<title>1月積オーダー履歴表示</title>
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
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <table border="1">
      <tr>
          <th width="160px" height="25px">オーダー日時</th>
          <th width="50px">積月</th>
          <th width="50px">限月</th>
          <th width="60px">種類</th>
          <th width="70px">レート</th>
          <th width="100px">金額</th>
      </tr>
      <?= $view ?>
    </table>
</div>
<!-- Main[End] -->

</body>
</html>
