<?php
session_start();
require "access_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_tbl WHERE name = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':name' => $name]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Store user ID and username in session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['name'];

        // Redirect to renshulayout.php or index.php
        header("Location: renshulayout.php");
        exit();
    } else {
        echo "ログイン失敗: ユーザー名またはパスワードが正しくありません。<a href='index.php'>再試行</a>";
    }
}
?>