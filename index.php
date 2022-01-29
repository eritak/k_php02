<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">オーダー履歴一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="shipmonthselect.php">1月積オーダー履歴一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
      <legend>為替オーダー</legend>
      <label>積月：<input type="number" id="shipmonth" name="shipmonth" min=1 max=12></input>月</label><br>
      <label>限月：<input type="number" id="duemonth" name="duemonth" min=1 max=12></input>月</label><br>
      <label>種類： 
          <select id="type" name="type">
            <option value="SPOT">SPOT</option>
            <option value="指値">指値</option>
          </select>
      </label><br>
      <label>指値：￥<input type="number" id="rate" step="0.01" min="0" name="rate"></input></label><br>
      <label>金額：＄<input type="text" id="amount" data-type='number' name="amount"></input></label><br>
      <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- JQuery -->

<script>
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
</script>


</body>
</html>
