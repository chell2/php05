<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書承認システム：ログイン画面</title>
</head>

<body>
  <form action="login_act.php" method="POST">
    <fieldset>
      <legend>文書承認システム：ログイン画面</legend>
      <div>
        職員ID: <input type="text" name="username">
      </div>
      <div>
        パスワード: <input type="text" name="password">
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <a href="register.php">>> ID登録</a>
    </fieldset>
  </form>

</body>

</html>