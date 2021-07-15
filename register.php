<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書承認システム：ID登録画面</title>
</head>

<body>
  <form action="register_act.php" method="POST">
    <fieldset>
      <legend>文書承認システム：ID登録画面</legend>
      <div>
        職員ID: <input type="text" name="username">
      </div>
      <div>
        役職: <input type="text" name="position">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>登録</button>
      </div>
      <a href="login.php">or ログイン</a>
    </fieldset>
  </form>

</body>

</html>