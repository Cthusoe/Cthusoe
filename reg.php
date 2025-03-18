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
            <li><a href="map.php">မြေပုံပေါ်တွင် ကျောင်းရှာရန်</a></li>
            <li><a href="renshulayout.php">ကျောင်းအားလုံး</a></li>
            <li><a href="reg.php">ကျောင်းစာရင်းသွင်းရန်</a></li>
            <li><a href="file_input.php">ဂျပန်စာစာအုပ်များ မျှဝေရန်</a></li>
            <li><a href="test.php">ဂျပန်စာ စမ်းသပ်မှု</a></li>
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

<div class="form-container">
    <h1>ကျောင်းအမည်များစာရင်းသွင်းခြင်း</h1>
    <form name="Sub_add_FORM" method="post" onsubmit="return confirmSubmission()">
        <input type="text" name="sh_name" placeholder="ကျောင်းအမည် (လိုအပ်သည်)" required>
        <input type="text" name="en_name" placeholder="အင်္ဂလိပ်ကျောင်းအမည် (လိုအပ်သည်)" required>
        <input type="text" name="teach_name" placeholder="ကျောင်းအုပ်ဆရာကြီး၏အမည်">
        <input type="text" name="addr" placeholder="လိပ်စာ (လိုအပ်သည်)" required>
        <input type="text" name="ph" placeholder="ဖုန်းနံပါတ်">
        <input type="text" name="fb_link" placeholder="Facebook လင့်ခ်">
        <input type="text" name="web_link" placeholder="ဝက်ဘ်ဆိုက်လင့်ခ်">

        <!-- ပြည်နယ်/တိုင်းရွေးချယ်ရန် -->
        <select name="regn_name" required>
            <option value="">ပြည်နယ်/တိုင်းရွေးချယ်ပါ</option>
            <?php
            require "access_db.php";
            $sql = "SELECT * FROM jp_region_tbl";
            $stmt = $pdo->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . htmlspecialchars($row['name_eng'], ENT_QUOTES, 'UTF-8') . "'>" . 
                     htmlspecialchars($row['name_jp'], ENT_QUOTES, 'UTF-8') . "</option>";
            }
            ?>
        </select>

        <input type="text" name="city_name" placeholder="မြို့အမည်">
        <input type="number" step="0.000001" name="lat" placeholder="လတ္တီတွဒ် (lat)">
        <input type="number" step="0.000001" name="lng" placeholder="လောင်ဂျီတွဒ် (lng)">

        <div class="buttons">
            <input type="reset" value="ပြန်လည်သတ်မှတ်ရန်">
            <input type="submit" name="school_add" value="စာရင်းသွင်းရန်">
        </div>
    </form>

    <?php
    if (isset($_POST['school_add'])) {
        require "access_db.php";

        $s1  = $_POST['sh_name'];
        $s12 = $_POST['en_name'];
        $s2  = $_POST['teach_name'] ?? NULL;
        $s3  = $_POST['addr'];
        $s10 = $_POST['ph'] ?? NULL;
        $s4  = $_POST['fb_link'] ?? NULL;
        $s5  = $_POST['regn_name'];
        $s6  = $_POST['city_name'] ?? NULL;
        $s7  = isset($_POST['lat']) && is_numeric($_POST['lat']) ? $_POST['lat'] : NULL;
        $s8  = isset($_POST['lng']) && is_numeric($_POST['lng']) ? $_POST['lng'] : NULL;
        $s9  = $_POST['web_link'] ?? NULL;
        $cnty_id = 1;

        try {
            $pdo->beginTransaction();

            $sql = "INSERT INTO language_school_info 
                (name, name_eng, teacher_name, addr, phone, link, region_name, city_name, lat, lng, web_link, cnty_id)
                VALUES (:name, :name_eng, :teacher_name, :addr, :phone, :link, :region_name, :city_name, :lat, :lng, :web_link, :cnty_id)";

            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':name'         => $s1,
                ':name_eng'     => $s12,
                ':teacher_name' => $s2,
                ':addr'         => $s3,
                ':phone'        => $s10,
                ':link'         => $s4,
                ':region_name'  => $s5,
                ':city_name'    => $s6,
                ':lat'          => $s7,
                ':lng'          => $s8,
                ':web_link'     => $s9,
                ':cnty_id'      => $cnty_id
            ]);

            $pdo->commit();
            echo "<p style='color: green; text-align: center;'>ဒေတာများအောင်မြင်စွာသိမ်းဆည်းပြီး!</p>";

            // Display the submitted data
            echo "<div class='submitted-data'>";
            echo "<h2>Submitted Data</h2>";
            echo "<p><strong>ကျောင်းအမည်:</strong> " . htmlspecialchars($s1, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>အင်္ဂလိပ်ကျောင်းအမည်:</strong> " . htmlspecialchars($s12, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>ကျောင်းအုပ်ဆရာကြီး၏အမည်:</strong> " . htmlspecialchars($s2, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>လိပ်စာ:</strong> " . htmlspecialchars($s3, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>ဖုန်းနံပါတ်:</strong> " . htmlspecialchars($s10, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>Facebook လင့်ခ်:</strong> " . htmlspecialchars($s4, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>ပြည်နယ်/တိုင်း:</strong> " . htmlspecialchars($s5, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>မြို့အမည်:</strong> " . htmlspecialchars($s6, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>လတ္တီတွဒ် (lat):</strong> " . htmlspecialchars($s7, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>လောင်ဂျီတွဒ် (lng):</strong> " . htmlspecialchars($s8, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "<p><strong>ဝက်ဘ်ဆိုက်လင့်ခ်:</strong> " . htmlspecialchars($s9, ENT_QUOTES, 'UTF-8') . "</p>";
            echo "</div>";

        } catch (PDOException $Exception) {
            $pdo->rollBack();
            echo "<p style='color: red; text-align: center;'>အမှားအယွင်း: " . $Exception->getMessage() . "</p>";
        }
    }
    ?>
</div>

<footer>
    <?php include "footer.php"; ?>
</footer>

</body>
</html>