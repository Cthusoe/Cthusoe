<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "
    <!DOCTYPE html>
    <html lang='my'>
    <head>
        <meta charset='utf-8'>
        <title>ကျောင်းအမည်များစာရင်းသွင်းခြင်း</title>
        <style>
            #custom-popup {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1000;
            }
            #custom-popup-content {
                background: white;
                padding: 20px;
                border-radius: 8px;
                text-align: center;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            #custom-popup-message {
                font-size: 18px;
                color: red;
                margin-bottom: 20px;
            }
            #custom-popup-button {
                background: rgb(15, 2, 2);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            #custom-popup-button:hover {
                background: rgba(65, 196, 32, 0.61);
            }
        </style>
    </head>
    <body>
        <div id='custom-popup'>
            <div id='custom-popup-content'>
                <div id='custom-popup-message'>
                    ကျေးဇူးပြု၍ ဝင်ရောက်ပါ။ ဝန်ဆောင်မှုကို အသုံးပြုရန် အကောင့်ဝင်ရန် လိုအပ်ပါသည်။
                </div>
                <button id='custom-popup-button' onclick='redirectToLogin()'>OK</button>
            </div>
        </div>
        <script>
            function redirectToLogin() {
                window.location.href = 'index.php';
            }
        </script>
    </body>
    </html>";
    exit();
}

require "access_db.php"; // Include database connection

if (isset($_GET['file_id'])) {
    $id = intval($_GET['file_id']); // Convert to integer to prevent SQL injection

    try {
        $pdo = new PDO($dsn, $db_user, $db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        // Begin Transaction
        $pdo->beginTransaction();

        // Fetch file information using a prepared statement
        $stmt = $pdo->prepare("SELECT * FROM files WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $file = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$file) {
            throw new Exception("File not found.");
        }

        $filepath = 'uploads/' . $file['name'];

        echo "データを取得しました<br>";

        echo '<form name="ReloadForm" method="post">
                <p><input type="submit" name="Reload" value="再読み込み"></p>
              </form>';

        // Commit transaction
        $pdo->commit();

        // File download logic
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($filepath));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);

            // Update downloads count securely using prepared statement
            $newCount = $file['downloads'] + 1;
            $updateStmt = $pdo->prepare("UPDATE files SET downloads = :newCount WHERE id = :id");
            $updateStmt->execute(['newCount' => $newCount, 'id' => $id]);

            exit;
        } else {
            echo "ファイルが見つかりませんでした。";
        }
    } catch (PDOException $Exception) {
        $pdo->rollBack();
        die("エラー：" . $Exception->getMessage());
    } catch (Exception $e) {
        echo "エラー：" . $e->getMessage();
    }
}
?>
