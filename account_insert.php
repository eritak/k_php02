<?php
// 1. POSTデータ取得
$company_name = $_POST["company_name"];
$name = $_POST["name"];
$lid = $_POST["lid"];
// $lpw = password_hash('lpw', PASSWORD_DEFAULT);
$lpw = $_POST["lpw"];

// 2. DB接続
require_once('funcs.php');
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO corntest_user_table(id,company_name,name,lid,lpw,kanri_flg,life_flg )
  VALUES( NULL, :company_name, :name, :lid, :lpw, 0, 0 )"
);

// 4. バインド変数を用意
$stmt->bindValue(':company_name', $company_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
}else{
  redirect('login.php');//ヘッダーロケーション（リダイレクト）
}
