<?php
session_start();
include("functions.php");
check_session_id();
$user_id = $_SESSION["id"];

$id = $_GET["id"];
$pdo = connect_to_db();

$sql = 'SELECT * FROM document_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>個別文書編集</title>
</head>

<body>
  <form action="doc_update.php" method="POST">
    <fieldset>
      <p><?= $user_id ?>:<?= $_SESSION["position"] ?>:<?= $_SESSION["username"] ?></p>
      <legend>個別文書編集</legend>
      <a href="doc_read.php">一覧画面</a>
      <div>
        件名: <textarea rows="2" cols="100" name="doc_title"><?= $record["doc_title"] ?></textarea>
      </div>
      <div>
        内容: <textarea rows="4" cols="100" name="doc_contents"><?= $record["doc_contents"] ?></textarea>
      </div>
      <div>
        <button>更新</button>
      </div>
      <input type="hidden" name="id" value="<?= $record["id"] ?>">
      <input type="hidden" name="updated_by" value="<?= $user_id ?>">
    </fieldset>
  </form>

</body>

</html>