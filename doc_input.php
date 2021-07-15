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
</head>

<body>
  <form action="doc_create.php" method="POST">
    <fieldset>
      <p><?= $user_id ?>:<?= $_SESSION["position"] ?>:<?= $_SESSION["username"] ?></p>
      <legend>文書登録</legend>
      <a href="doc_read.php">一覧画面</a>
      <a href="logout.php">logout</a>
      <div>
        件名: <textarea rows="2" cols="100" name="doc_title"></textarea>
      </div>
      <div>
        内容: <textarea rows="4" cols="100" name="doc_contents"></textarea>
      </div>
      <div>
        <button>登録</button>
      </div>
      <input type="hidden" name="created_by" value="<?= $user_id ?>">
    </fieldset>
  </form>

</body>

</html>