<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書承認システム：ID登録画面</title>
  <style>
    fieldset {
      width: 500px;
      margin: 3em auto;
      text-align: center;
      border-radius: 5px;
      border: solid 2px #999;
    }

    table {
      width: 300px;
      margin: auto;
    }

    td {
      padding: 5px 2px;
    }

    div {
      margin-top: 1em;
    }

    div.link {
      width: 90%;
      margin-top: .5em;
      text-align: right;
    }

    a {
      color: blue;
    }

    a:active:visited {
      text-decoration: none;
      color: blue;
    }

    a:hover {
      text-decoration: none;
      border-bottom: 3px solid blue;
    }

    button {
      width: 80px;
    }
  </style>
</head>

<body>
  <form action="register_act.php" method="POST">
    <fieldset>
      <legend>文書承認システム：ID登録画面</legend>
      <div>
        <table>
          <tr>
            <td>
              職員ID:
            </td>
            <td>
              <input type="text" name="username">
            </td>
          </tr>
          <tr>
            <td>
              役職:
            </td>
            <td>
              <input type="text" name="position">
            </td>
          </tr>
          <tr>
            <td>
              パスワード:
            </td>
            <td>
              <input type="text" name="password">
            </td>
          </tr>
        </table>
      </div>
      <div>
        <button>登 録</button>
      </div>
      <div class="link">
        <a href="login.php">>> ログイン画面</a>
      </div>
    </fieldset>
  </form>

</body>

</html>