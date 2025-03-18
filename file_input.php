<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, show a custom popup with red letters
    echo "
    <!DOCTYPE html>
    <html lang='my'>
    <head>
        <meta charset='utf-8'>
        <title>ကျောင်းအမည်များစာရင်းသွင်းခြင်း</title>
        <style>
            /* Custom Popup Styles */
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
                color: red; /* Red color for the message */
                margin-bottom: 20px;
            }
            #custom-popup-button {
                background:rgb(15, 2, 2);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            #custom-popup-button:hover {
                background:rgba(65, 196, 32, 0.61);
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
            // Function to redirect to the login page
            function redirectToLogin() {
                window.location.href = 'index.php';
            }
        </script>
    </body>
    </html>
    ";
    exit();
}
?>


<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="utf-8">
    <title>ကျောင်းအမည်များစာရင်းသွင်းခြင်း</title>
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

        /* Form Container */
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            color: #007bff;
        }

        /* Form Styles */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
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

        .buttons {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .buttons input {
            cursor: pointer;
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 48%;
            font-weight: bold;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .buttons input:hover {
            background: #0056b3;
        }

        .buttons input[type="reset"] {
            background: #6c757d;
        }

        .buttons input[type="reset"]:hover {
            background: #5a6268;
        }

        /* Submitted Data Styles */
        .submitted-data {
            margin-top: 20px;
            padding: 15px;
            background: #e9ecef;
            border-radius: 8px;
        }

        .submitted-data h2 {
            text-align: center;
            color: #333;
            margin-bottom: 15px;
        }

        .submitted-data p {
            margin: 5px 0;
            font-size: 14px;
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

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
    <script>
        function confirmSubmission() {
            // Display a confirmation dialog
            return confirm("ဤဒေတာများကို စာရင်းသွင်းရန် သေချာပါသလား?");
        }
    </script>
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
                <li><a href="test.php" target="_blank">ဂျပန်စာစစ်ဆေးရန်</a></li>
                <li><a href="file_download.php" target="_blank">ဂျပန်စာလေ့လာရန်</a></li>
            </ul>
        </nav>
        <div class="user-info">
            <?php if (isset($_SESSION['username'])): ?>
                <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                <a href="logout.php" class="logout-btn">Logout</a>
            <?php else: ?>
                <a href="login.php" class="login-btn">Login</a>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="row">
                <form action="file_upload.php" method="post" enctype="multipart/form-data">
                    <h3>Upload File</h3>
                    <input type="file" name="myfile"> <br>
                    <button type="submit" name="save">Upload</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>
</html>
