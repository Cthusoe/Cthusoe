<?php
session_start();
require "access_db.php"; // Database connection
?>

<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ဂျပန်စာသင်ကျောင်းများ ဘဏ်</title>
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
        .container {
    width: 90%;
    max-width: 1200px;
    margin: 0 auto;
}

.section {
    padding: 20px 0;
}

.section h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #007bff; /* Changed to match the first code's color */
}

.form-container {
    max-width: 400px;
    margin: auto;
    background: white; /* Changed to white background */
    padding: 20px;
    border-radius: 8px; /* Adjusted to match the first code's border radius */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Changed to match the first code's shadow */
}

.form-container input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd; /* Added border to match the first code's input style */
    border-radius: 4px; /* Adjusted to match the first code's border radius */
    transition: border-color 0.3s; /* Added transition for focus effect */
}

.form-container input:focus {
    border-color: #007bff; /* Added focus effect to match the first code */
    outline: none;
}

.form-container input[type="submit"] {
    background: #007bff; /* Changed to match the first code's button color */
    color: white;
    cursor: pointer;
    border: none;
    font-weight: bold; /* Added to match the first code's button style */
    transition: background 0.3s; /* Added transition for hover effect */
}

.form-container input[type="submit"]:hover {
    background: #0056b3; /* Changed to match the first code's hover color */
}

.logout {
    text-align: center;
    margin-top: 10px;
}
    </style>
</head>
<body>
    <header>
        <h1>ဂျပန်စာသင်ကျောင်းများ ဘဏ်</h1>
        <nav>
            <ul>
                <li><a href="index.php">ပင်မစာမျက်နှာ</a></li>
                <li><a href="map.php">ကျောင်းများကိုမြေပုံဖြင့်ရှာရန်</a></li>
                <li><a href="renshulayout.php">ကျောင်းအားလုံး</a></li>
                <li><a href="reg.php" target="_blank">ကျောင်းစာရင်းသွင်းရန်</a></li>
                <li><a href="file_input.php">ဂျပန်စာစာအုပ်များမျှဝေရန်</a></li>
                <li><a href="TEST/index.php" target="_blank">ဂျပန်စာစစ်ဆေးရန်</a></li>
                <li><a href="file_download.php" target="_blank">ဂျပန်စာလေ့လာရန်</a></li>
            </ul>
        </nav>
    </header>