<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    try {
        $db_name = "corntest_db2";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード
        $db_host = "localhost"; //DBホスト
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
      } catch (PDOException $e) {
      exit('DBConnectError:'.$e->getMessage());
      }
}
// ↓上の関数を各phpにて下記2行のコードで呼び出す。
// require_once('funcs.php');
// $pdo = db_conn();


//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:" . print_r($error, true));
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: " .$file_name);
    exit();
}