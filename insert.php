<?php
// 1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$shipmonth = $_POST["shipmonth"];
$duemonth = $_POST["duemonth"];
$type = $_POST["type"];
$rate = number_format($_POST["rate"],2);
$amount = $_POST["amount"];


// 2. DB接続
require_once('funcs.php');
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO corntest_an_table(id,indate,shipmonth,duemonth,type,rate,amount)
  VALUES( NULL, sysdate(), :shipmonth, :duemonth, :type, :rate, :amount )"
);

// 4. バインド変数を用意
$stmt->bindValue(':shipmonth', $shipmonth, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':duemonth', $duemonth, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':type', $type, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':rate', $rate, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':amount', $amount, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  redirect('index.php');//ヘッダーロケーション（リダイレクト）
}
