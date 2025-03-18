<?php
session_start();
?>
<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>မြေပုံပေါ်တွင် ကျောင်းရှာရန်</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #333;
            text-align: center;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #007bff, #00bfff);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 10px 0 0;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        nav ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* User Info (Top Right Corner) */
        .user-info {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
        }

        .user-info a {
            color: white;
            text-decoration: none;
            margin-left: 10px;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .user-info a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Main Content Styles */
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-top: 50px;
        }

        .notice {
            font-size: 18px;
            color: #ff4500;
            margin-top: 20px;
        }

        .search-link {
            color: white;
            background: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .search-link:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<header>
    <h1>ဂျပန်စာသင်ကျောင်းများ</h1>
    <nav>
        <ul>
            <li><a href="index.php">ပင်မစာမျက်နှာ</a></li>
            <li><a href="map.php">မြေပုံပေါ်တွင် ကျောင်းရှာရန်</a></li>
            <li><a href="renshulayout.php">ကျောင်းအားလုံး</a></li>
            <li><a href="reg.php">ကျောင်းစာရင်းသွင်းရန်</a></li>
            <li><a href="file_input.php">ဂျပန်စာစာအုပ်များ မျှဝေရန်</a></li>
            <li><a href="test.php">ဂျပန်စာ စမ်းသပ်မှု</a></li>
            <li><a href="file_download.php">ဂျပန်စာ လေ့လာရန်</a></li>
        </ul>
    </nav>

    <!-- User Session Info -->
    <div class="user-info">
        <?php if (isset($_SESSION['user_id'])): ?>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?>!</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="login-btn">Login</a>
        <?php endif; ?>
    </div>
</header>

<main>
    <div class="container">
        <h2>Service Availability</h2>
        <p class="notice">This service will be available soon.</p>
        <a href="search.php" target="_blank" class="search-link">Search manually here</a>
    </div>
</main>

</body>
</html>
