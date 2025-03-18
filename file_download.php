<?php
session_start(); // Start the session
include 'access_db.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, show a custom popup with red letters
    echo "
    <!DOCTYPE html>
    <html lang='my'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>ဂျပန်စာသင်ကျောင်းများ</title>
        <link rel='stylesheet' href='css/styles.css'> <!-- Link to external CSS -->
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
                background: rgb(17, 21, 25);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            #custom-popup-button:hover {
                background: rgb(38, 188, 61);
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
    exit(); // Stop further execution of the script
}
?>

<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ဂျပန်စာလေ့လာရန်</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Additional styles for pop-up and user info */
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
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 1000;
        }
    </style>
</head>
<body>
    <header class="bg-light p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">ပင်မစာမျက်နှာ</a></li>
                    <li class="nav-item"><a class="nav-link" href="map.php">ကျောင်းများရှာရန်</a></li>
                    <li class="nav-item"><a class="nav-link" href="renshulayout.php">ကျောင်းအားလုံး</a></li>
                    <li class="nav-item"><a class="nav-link" href="reg.php" target="_blank">ကျောင်းများစာရင်း</a></li>
                    <li class="nav-item"><a class="nav-link" href="file_input.php" target="_blank">ဂျပန်စာစာအုပ်များမျှဝေရန်</a></li>
                    <li class="nav-item"><a class="nav-link" href="test.php" target="_blank">ဂျပန်စာစစ်ဆေးမှု</a></li>
                    <li class="nav-item"><a class="nav-link" href="file_download.php" target="_blank">ဂျပန်စာလေ့လာရန်</a></li>
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
        </div>
    </header>

    <div class="container mt-4">
        <h2>ဖိုင်များစာရင်း</h2>
        <!-- Manual Search Bar -->
        <form method="POST" class="mb-3">
            <input type="text" name="search_query" class="form-control" placeholder="ဖိုင်အမည်ဖြင့်ရှာဖွေရန်..." value="<?php echo isset($_POST['search_query']) ? htmlspecialchars($_POST['search_query']) : ''; ?>">
            <button type="submit" name="search" class="btn btn-primary mt-2">ရှာဖွေရန်</button>
        </form>

        <?php
            try {
                $searchQuery = isset($_POST['search_query']) ? $_POST['search_query'] : '';
                if ($searchQuery) {
                    $sql = "SELECT * FROM files WHERE name LIKE :search_query";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['search_query' => "%" . $searchQuery . "%"]);
                } else {
                    $sql = "SELECT * FROM files";
                    $stmt = $pdo->query($sql);
                }

                $count = $stmt->rowCount();
                echo "<p>စုစုပေါင်း ဖိုင် $count ခု ရှိပါသည်။</p>";
            } catch (PDOException $e) {
                die("အမှားအယွင်း: " . $e->getMessage());
            }
        ?>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>ဖိုင်အမည်</th>
                    <th>ဖိုင်အရွယ်အစား (KB)</th>
                    <th>ဒေါင်းလုပ်ဆွဲမှုအရေအတွက်</th>
                    <th>လုပ်ဆောင်ချက်</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo floor($row['size'] / 1000); ?></td>
                        <td><?php echo htmlspecialchars($row['downloads']); ?></td>
                        <td>
                            <a href="downloads.php?file_id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">ဒေါင်းလုပ်ဆွဲရန်</a>
                            <a href="read_file.php?file_id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm">ဖတ်ရန်</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Pop-up Example -->
    <div id="popup" class="popup">
        <p>This is a pop-up!</p>
        <button onclick="document.getElementById('popup').style.display='none';">Close</button>
    </div>

    <script>
        // Example function to show pop-up
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
        }
    </script>
</body>
</html>