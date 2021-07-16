<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書承認システム：ログイン画面</title>
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
      text-decoration: none;
      border-bottom: 1px solid blue;
    }

    a:active:visited {
      text-decoration: none;
      border-bottom: 1px solid blue;
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
  <form action="login_act.php" method="POST">
    <fieldset>
      <legend>文書承認システム：ログイン画面</legend>
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
              パスワード:
            </td>
            <td>
              <input type="text" name="password">
            </td>
          </tr>
        </table>
      </div>
      <div>
        <button>ログイン</button>
      </div>
      <div class="link">
        <a href="register.php">>> ID登録画面</a>
      </div>
    </fieldset>
  </form>

</body>

</html>