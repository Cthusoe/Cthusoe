<?php
session_start();
require "access_db.php";

?>
<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>အသစ်မှတ်ပုံတင်ခြင်း အောင်မြင်ပါသည်</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f9;
            text-align: center;
        }
        main {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
        }
        p {
            font-size: 18px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <?php include "header.php"; ?>
    
    <main>
        <h2>မှတ်ပုံတင်မှု အောင်မြင်ပါသည်!</h2>
        <p>သင်၏အကောင့်ကို အောင်မြင်စွာဖန်တီးနိုင်ပါပြီ။</p>
        <a href="index.php">လော့ဂ်အင်သို့သွားရန်</a>
    </main>
    
    <?php include "footer.php"; ?>
</body>
</html>
