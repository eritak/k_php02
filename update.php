<?php
//insert.phpの処理を持ってくる
//1. POSTデータ取得
$shipmonth = $_POST["shipmonth"];
$duemonth = $_POST["duemonth"];
$type = $_POST["type"];
$rate = $_POST["rate"];
$amount = $_POST["amount"];
$id = $_POST["id"];


//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();


//３．データ更新SQL作成（UPDATE テーブル名 SET 更新対象1=:更新データ ,更新対象2=:更新データ2,... WHERE id = 対象ID;）
    //３．SQL文を用意(データ登録：INSERT)
    $stmt = $pdo->prepare(
        "UPDATE corntest_an_table SET 
        indate=sysdate(), shipmonth=:shipmonth, duemonth=:duemonth, type=:type, rate=:rate, amount=:amount 
        WHERE id=:id"
    );
    
    // 4. バインド変数を用意
    $stmt->bindValue(':shipmonth', $shipmonth, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':duemonth', $duemonth, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':rate', $rate, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':amount', $amount, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)


    // 5. 実行
    $status = $stmt->execute();

//４．データ登録処理後
if($status ==false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}

?>

