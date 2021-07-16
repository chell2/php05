<?php
session_start();
include("functions.php");
check_session_id();
$user_id = $_SESSION["id"];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書登録</title>
  <style>
    fieldset {
      width: 1200px;
      margin: 3em auto;
      text-align: center;
      border-radius: 5px;
      border: solid 2px #999;
    }

    table {
      width: auto;
      margin: auto;
      text-align: left;
    }

    th {
      letter-spacing: .5em;
    }

    td {
      padding: 5px 2px;
    }

    div {
      margin-top: 1em;
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

    div.btn {
      margin-bottom: 2em;
    }

    button {
      width: 80px;
    }
  </style>
</head>

<body>
  <form action="doc_create.php" method="POST">
    <fieldset>
      <p hidden><?= $user_id ?>:<?= $_SESSION["position"] ?>:<?= $_SESSION["username"] ?></p>
      <legend>文書登録</legend>
      <div>
        <a href="doc_read.php">文書一覧</a> / <a href="logout.php">ログアウト</a>
      </div>
      <div>
        <table>
          <tr>
            <th>
              件名:
            </th>
            <td>
              <textarea rows="2" cols="100" name="doc_title"></textarea>
            </td>
          </tr>
          <tr>
            <th>
              内容:
            </th>
            <td>
              <textarea rows="4" cols="100" name="doc_contents"></textarea>
            </td>
        </table>
      </div>
      <div class="btn">
        <button>登 録</button>
      </div>
      <input type="hidden" name="created_by" value="<?= $user_id ?>">
    </fieldset>
  </form>

</body>

</html>