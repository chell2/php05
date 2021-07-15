<?php
// ini_set('display_errors', 1);
// ini_set('error_reporting', E_ALL);
session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['doc_title']) || $_POST['doc_title'] == '' ||
  !isset($_POST['doc_contents']) || $_POST['doc_contents'] == '' ||
  !isset($_POST['created_by']) || $_POST['created_by'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$doc_title = $_POST['doc_title'];
$doc_contents = $_POST['doc_contents'];
$created_by = $_POST['created_by'];

$pdo = connect_to_db();

$sql = 'INSERT INTO document_table(id, doc_title, doc_contents, created_at, updated_at, created_by, updated_by) VALUES(NULL, :doc_title, :doc_contents, sysdate(), sysdate(), :created_by, :updated_by)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':doc_title', $doc_title, PDO::PARAM_STR);
$stmt->bindValue(':doc_contents', $doc_contents, PDO::PARAM_STR);
$stmt->bindValue(':created_by', $created_by, PDO::PARAM_STR);
$stmt->bindValue(':updated_by', $created_by, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
  $error = $stmt->errorInfo();
  echo json_encode(["error_msg" => "{$error[2]}"]);
  exit();
} else {
  header("Location:doc_input.php");
  exit();
}
