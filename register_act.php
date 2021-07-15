<?php
// ini_set('display_errors', 1);
// ini_set('error_reporting', E_ALL);
include('functions.php');

if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['position']) || $_POST['position'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$username = $_POST["username"];
$position = $_POST["position"];
$password = $_POST["password"];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM users_table WHERE username=:username';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo "<p>すでに登録されているユーザです．</p>";
  echo '<a href="login.php">login</a>';
  exit();
}

$sql = 'INSERT INTO users_table(id, username, position, password, is_admin, is_deleted, created_at) VALUES(NULL, :username, :position, :password, 0, 0, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':position', $position, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:login.php");
  exit();
}
