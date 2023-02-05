<?php
require("../dbconnect.php");

$email=$_POST['email'];

$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":email", $email);
$stmt->execute();
$user = $stmt->fetch();

// memo:password_verifyの第二引数にはhash値をおく
if (password_verify($_POST['password'], $user["password"])) {
  $_SESSION['id'] = $user["id"];
  $_SESSION['name'] = $user["name"];
  header('Location: http://' . $_SERVER['HTTP_HOST'] . '/admin/index.php');
  exit;
} else {
  echo '認証情報が正しくありません' . '<br/><a href="/admin/auth/signin.php">ログイン画面に戻る</a>';
  exit;
}
