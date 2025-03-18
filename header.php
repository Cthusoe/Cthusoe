<?php
session_start();
?>
<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ကျောင်းများစာရင်း</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            color: #333;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #007bff, #00bfff);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input, select {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #0056b3;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background: #007bff;
            color: white;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        /* Footer Styles */
        footer {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-radius: 8px;
        }
        
    </style>
</head>
<body>

<header>
    <h1>ဂျပန်စာသင်ကျောင်းများ ဘဏ်</h1>
    <nav>
        <ul>
            <li><a href="index.php">ပင်မစာမျက်နှာ</a></li>
            <li><a href="map.php">မြေပုံပေါ်တွင် ကျောင်းရှာရန်</a></li>
            <li><a href="renshulayout.php">ကျောင်းအားလုံး</a></li>
            <li><a href="reg.php">ကျောင်းစာရင်းသွင်းရန်</a></li>
            <li><a href="file_input.php">ဂျပန်စာစာအုပ်များ မျှဝေရန်</a></li>
            <li><a href="TEST/index.php">ဂျပန်စာ စမ်းသပ်မှု</a></li>
            <li><a href="file_download.php">ဂျပန်စာ လေ့လာရန်</a></li>
        </ul>
    </nav>

    <!-- User Session Info (Top Right Corner) -->
    <div class="user-info">
        <?php if (isset($_SESSION['user_id'])): ?>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username'] ?? 'User', ENT_QUOTES, 'UTF-8'); ?>!</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="login-btn">Login</a>
        <?php endif; ?>
    </div>
</header>
