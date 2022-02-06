<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>アカウント登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
  </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="account_insert.php">
  <div class="jumbotron">
   <fieldset>
      <legend>アカウント登録</legend>
      <label>会社名：<input type="text" name="company_name"></input></label><br>
      <label>お名前：<input type="text" name="name"></input></label><br>
      <label>ログインID： <input type="text" name="lid"></input></label><br>
      <label>ログインPW： <input type="text" name="lpw"></input></label><br>
      <input type="submit" value="登録">
    </fieldset>
  </div>
</form>

</body>
</html>
