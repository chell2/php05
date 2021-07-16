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
    if ($user_id == $record["created_by"]) {
      $output .= "<tr>";
      $output .= "<td>{$record["doc_title"]}</td>";
      $output .= "<td>{$record["doc_contents"]}</td>";
      $output .= "<td><span><i class='fas fa-thumbs-up'></i> :{$record["cnt"]}</span></td>";
      $output .= "<td><a href='doc_edit.php?id={$record["id"]}' class='icon'><i class='fas fa-pencil-alt'></i></a></td>";
      $output .= "<td><a href='doc_delete.php?id={$record["id"]}' class='icon' onclick='return confirm_del();'><i class='fas fa-eraser'></i></a></td>";
      $output .= "</tr>";
    } else {
      $output .= "<tr>";
      $output .= "<td>{$record["doc_title"]}</td>";
      $output .= "<td>{$record["doc_contents"]}</td>";
      // $output .= "<td><a href='approval_create.php?user_id={$user_id}&doc_id={$record["id"]}'>承認</a></td>"; 
      $output .= "<td><div class='tooltip'>
      <span class='tooltip-text'>承認者を表示</span>
      <a href='approval_create.php?user_id={$user_id}&doc_id={$record["id"]}' class='icon'><i class='far fa-thumbs-up'></i></a>
      <span> :{$record["cnt"]}</span>
      </div></td>";
      $output .= "<td><a href='doc_edit.php?id={$record["id"]}' class='icon'><i class='fas fa-pencil-alt'></i></a></td>";
      $output .= "<td></td></tr>";
    }
  }
  unset($value);
}

// $sql = "SELECT * FROM approval_table LEFT OUTER JOIN users_table ON approval_table.user_id = users_table.id";
// で文書（doc_id）の承認者（username）の値はとれるけれど、どう表示すればよいかわからない

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>文書一覧</title>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <style>
    fieldset {
      width: 1200px;
      margin: 3em auto;
      text-align: center;
      border-radius: 5px;
      border: solid 2px #999;
    }

    table {
      width: 1100px;
      margin: auto auto 1em;
      text-align: left;
      border-collapse: collapse;
      border: 1px;
    }

    th {
      text-align: center;
      padding: 10px;
      letter-spacing: 1em;
      border-bottom: .5px solid #999;
    }

    td {
      padding: 10px;
      border-bottom: .5px solid #999;
    }

    div {
      margin-top: 1em;
    }

    a.link {
      color: blue;
      text-decoration: none;
      border-bottom: 1px solid blue;
    }

    a.link:hover {
      text-decoration: none;
      border-bottom: 3px solid blue;
    }

    a.icon {
      text-decoration: none;
      color: blue;
    }

    a.icon:hover {
      text-decoration: none;
      color: #CC66FF;
    }

    span {
      color: #6699FF;
    }

    /* カーソルを重ねる要素 */
    div.tooltip {
      margin: auto;
      position: relative;
      /* ツールチップの位置の基準に */
      cursor: pointer;
      /* カーソルを当てたときにポインターに */
    }

    /* ツールチップのテキスト */
    span.tooltip-text {
      opacity: 0;
      /* はじめは隠しておく */
      visibility: hidden;
      /* はじめは隠しておく */
      position: absolute;
      /* 絶対配置 */
      left: 50%;
      /* 親に対して中央配置 */
      transform: translateX(-50%);
      /* 親に対して中央配置 */
      bottom: -30px;
      /* 親要素下からの位置 */
      display: inline-block;
      padding: 5px;
      /* 余白 */
      white-space: nowrap;
      /* テキストを折り返さない */
      font-size: 0.8rem;
      /* フォントサイズ */
      line-height: 1.3;
      /* 行間 */
      background: #333;
      /* 背景色 */
      color: #fff;
      /* 文字色 */
      border-radius: 3px;
      /* 角丸 */
      transition: 0.3s ease-in;
      /* アニメーション */
    }

    /* ホバー時にツールチップの非表示を解除 */
    div.tooltip:hover .tooltip-text {
      opacity: 1;
      visibility: visible;
    }

    span.tooltip-text:before {
      content: '';
      position: absolute;
      top: -13px;
      left: 50%;
      margin-left: -7px;
      border: 7px solid transparent;
      border-bottom: 7px solid #333;
    }
  </style>
</head>

<body>
  <script>
    function confirm_del() {
      var select = confirm("本当に削除しますか？ \n「OK」で削除 \n「キャンセル」で中止");
      return select;
    }
  </script>
  <fieldset>
    <p hidden><?= $user_id ?>:<?= $_SESSION["position"] ?>:<?= $_SESSION["username"] ?></p>
    <legend>文書一覧</legend>
    <div>
      <a href="doc_input.php" class="link">文書登録</a> / <a href="logout.php" class="link">ログアウト</a>
    </div>
    <div>
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
    </div>
  </fieldset>
</body>

</html>