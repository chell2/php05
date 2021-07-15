<?php
session_start();
include("functions.php");
check_session_id();

$pdo = connect_to_db();
$user_id = $_SESSION["id"];
// $sql = "SELECT * FROM document_table";
$sql = "SELECT * FROM document_table
        LEFT OUTER JOIN (SELECT doc_id, COUNT(id) AS cnt
        FROM approval_table GROUP BY doc_id) AS appr
        ON document_table.id = appr.doc_id";
// ASは置き換え

$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["doc_title"]}</td>";
    $output .= "<td>{$record["doc_contents"]}</td>";
    // $output .= "<td><a href='approval_create.php?user_id={$user_id}&doc_id={$record["id"]}'>承認</a></td>";
    $output .= "<td><a href='approval_create.php?user_id={$user_id}&doc_id={$record["id"]}'>承認 :{$record["cnt"]}</a></td>";
    $output .= "<td><a href='doc_edit.php?id={$record["id"]}'>編集</a></td>";
    $output .= "<td><a href='doc_delete.php?id={$record["id"]}'>削除</a></td>";
    $output .= "</tr>";
  }
  unset($value);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書一覧</title>
</head>

<body>
  <fieldset>
    <p><?= $user_id ?>:<?= $_SESSION["position"] ?>:<?= $_SESSION["username"] ?></p>
    <legend>文書一覧</legend>
    <a href="doc_input.php">入力画面</a>
    <a href="logout.php">logout</a>
    <table>
      <thead>
        <tr>
          <th>件名</th>
          <th>内容</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>