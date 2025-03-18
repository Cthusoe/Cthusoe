<?php
require "access_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $name)) {
        die("エラー: ユーザー名は英数字のみ使用可能です。");
    }
    if (strlen($password) < 6) {
        die("エラー: パスワードは6文字以上にしてください。");
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user_tbl (name, password) VALUES (:name, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $name, ':password' => $password]);

    // Redirect to the welcome page
    header("Location: welcome.php");
    exit();
}
?>
