<?php
session_start(); // Start the session

// Include the header file
#include "header.php";
?>

<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ဂျပန်စာသင်ကျောင်းများ ဘဏ်</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="index-body">
    <header class="index-header">
        <h1>ဂျပန်စာသင်ကျောင်းများ ဘဏ်</h1>
        <nav class="index-nav">
            <ul>
                <li><a href="index.php">ပင်မစာမျက်နှာ</a></li>
                <li><a href="map.php">ကျောင်းများကိုမြေပုံဖြင့်ရှာရန်</a></li>
                <li><a href="renshulayout.php">ကျောင်းအားလုံး</a></li>
                <li><a href="reg.php" target="_blank">ကျောင်းစာရင်းသွင်းရန်</a></li>
                <li><a href="file_input.php">ဂျပန်စာစာအုပ်များမျှဝေရန်</a></li>
                <li><a href="test.php" target="_blank">ဂျပန်စာစစ်ဆေးရန်</a></li>
                <li><a href="file_download.php" target="_blank">ဂျပန်စာလေ့လာရန်</a></li>
            </ul>
        </nav>
    </header>

    <div class="index-container">
        <h2>အသုံးပြုသူအကောင့်</h2>

        <?php if ($is_logged_in): ?>
            <p>ကြိုဆိုပါသည်၊ <?= htmlspecialchars($_SESSION['name']); ?> ရှင်။</p>
            <div class="index-form-container">
                <form method="post" action="logout.php">
                    <input type="submit" name="logout" value="အကောင့်မှထွက်ရန်">
                </form>
            </div>
        <?php else: ?>
            <div class="index-form-container">
                <h3>အကောင့်ဝင်ရန်</h3>
                <form method="post" action="login.php">
                    <input type="text" name="name" placeholder="အသုံးပြုသူအမည်" required>
                    <input type="password" name="password" placeholder="လျှို့ဝှက်နံပါတ်" required>
                    <input type="submit" name="login" value="ဝင်ရန်">
                </form>

                <h3>အကောင့်အသစ်ဖွင့်ရန်</h3>
                <form method="post" action="signup.php">
                    <input type="text" name="name" placeholder="အသုံးပြုသူအမည် (အင်္ဂလိပ်စာလုံးများသာ)" required>
                    <input type="password" name="password" placeholder="လျှို့ဝှက်နံပါတ် (၆ လုံးအထက်)" required>
                    <input type="submit" name="register" value="အကောင့်ဖွင့်ရန်">
                </form>
            </div>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <footer class="index-footer">
        <p>© 2025 ဂျပန်စာသင်ကျောင်းများ ဘဏ် | All Rights Reserved</p>
    </footer>
</body>
</html>
