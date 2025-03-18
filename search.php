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
        <title>ကျောင်းရှာခြင်း</title>
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


    <?php include "header.php"; ?>


<main class="container">
    <section>
        <h2>ဒေသအလိုက်ရှာဖွေရန်</h2>
        <form name="SearchForm" method="POST">
            <label for="region">ဒေသရွေးချယ်ရန်</label>
            <select name="sub_code" id="region" required>
                <option value="">ဒေသရွေးချယ်ရန်</option>
                <?php
                require "access_db.php";
                $stmt = $pdo->query("SELECT DISTINCT region_name FROM language_school_info");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . htmlspecialchars($row['region_name']) . "'>" . htmlspecialchars($row['region_name']) . "</option>";
                }
                ?>
            </select>
            <button type="submit" name="search">ရှာဖွေရန်</button>
        </form>
    </section>

    <section>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
            require "access_db.php";
            $unum = $_POST['sub_code'];
            try {
                $stmt = $pdo->prepare("SELECT * FROM language_school_info WHERE region_name = :region");
                $stmt->bindParam(':region', $unum, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                echo "<p>ကျောင်းအရေအတွက်: " . $count . " ကျောင်း</p>";
            } catch (PDOException $Exception) {
                echo "<p class='error'>အမှားအယွင်း: " . htmlspecialchars($Exception->getMessage()) . "</p>";
            }
        }
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>ကျောင်းအမည်</th>
                    <th>လိပ်စာ</th>
                    <th>ဖုန်းနံပါတ်</th>
                    <th>ကျောင်း၏</th>
                    <th>ဒေသ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($stmt)) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td><a href='" . htmlspecialchars($row['web_link']) . "' target='_blank' rel='noopener noreferrer'>" . htmlspecialchars($row['name']) . "</a><br>" . htmlspecialchars($row['name_eng']) . "</td>
                                <td>" . htmlspecialchars($row['addr']) . "</td>
                                <td>" . htmlspecialchars($row['phone']) . "</td>
                                <td><a href='" . htmlspecialchars($row['link']) . "' target='_blank' rel='noopener noreferrer'>FACEBOOK</a></td>
                                <td>" . htmlspecialchars($row['region_name']) . "</td>
                              </tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </section>
</main>

<footer>
    <?php include "footer.php"; ?>
</footer>

</body>
</html>