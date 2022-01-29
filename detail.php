<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();


//2.対象のIDを取得
$id = $_GET['id'];



//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare('SELECT * FROM corntest_an_table WHERE id=:id');
$stmt->bindvalue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = '';

if($status ==false) {
    sql_error($stmt);
} else {
    $result = $stmt->fetch();
}



?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>為替オーダー変更登録</legend>
                <label>積月：<input type="number" id="shipmonth" name="shipmonth" value="<?= $result['shipmonth']?>" min=1 max=12></input>月</label><br>
                <label>限月：<input type="number" id="duemonth" name="duemonth" value="<?= $result['duemonth']?>" min=1 max=12></input>月</label><br>
                <label>種類： 
                    <select id="type" name="type" value="<?= $result['type']?>">
                        <option value="SPOT">SPOT</option>
                        <option value="指値">指値</option>
                    </select>
                </label><br>
                <label>指値：￥<input type="number" id="rate" step="0.01" min="0" name="rate" value="<?= $result['rate']?>"></input></label><br>
                <label>金額：＄<input type="text" id="amount" data-type='number' name="amount" value="<?= $result['amount']?>"></input></label><br>
                
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JQuery -->

<!-- <script>
  // 積月の選択
  let shipmonthHTML = '';
    for(let i = 1; i<13; i++){
        shipmonthHTML += '<option value="'+i+'">'+i+'</option>'
    }
    $('#shipmonth').html(shipmonthHTML)

// 限月の選択
    let duemonthHTML = '';
    for(let i = 1; i<13; i++){
        duemonthHTML += '<option value="'+i+'">'+i+'</option>'
    }
    $('#duemonth').html(duemonthHTML)
</script> -->

</body>

</html>
