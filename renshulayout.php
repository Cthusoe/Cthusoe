<?php
session_start();
require "access_db.php";

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
                background:rgb(17, 21, 25);
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
            #custom-popup-button:hover {
                background:rgb(38, 188, 61);
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

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']);

// Pagination settings
$limit = 20; // Number of schools per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure the page is at least 1
$offset = ($page - 1) * $limit;

try {
    // Get total count of schools
    $countQuery = "SELECT COUNT(*) FROM language_school_info";
    $countStmt = $pdo->query($countQuery);
    $totalSchools = $countStmt->fetchColumn();

    // Get schools for current page
    $sql = "SELECT * FROM language_school_info LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
} catch (PDOException $Exception) {
    die("အမှား: " . $Exception->getMessage());
}

$totalPages = ceil($totalSchools / $limit); // Calculate total pages
?>

<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ဂျပန်စာသင်ကျောင်းများ</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to external CSS -->
</head>
<body>
<header>
    <h1>ဂျပန်စာသင်ကျောင်းများ ဘဏ်</h1>
    <div class="user-info">
        <?php if ($is_logged_in): ?>
            <span>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="login-btn">Login</a>
        <?php endif; ?>
    </div>

    <!-- Mobile Menu Button -->
    <button class="mobile-menu-button">☰ Menu</button>

    <!-- Desktop Menu -->
    <nav class="desktop-menu">
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

    <!-- Mobile Menu -->
    <nav class="mobile-menu">
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
    
<main>
    <h2>ကျောင်းအရေအတွက် <?php echo $totalSchools; ?> ကျောင်း ရှိပါသည်။</h2>
    
    <table>
        <tr>
            <th>ကျောင်းအမည်</th>
            <th>လိပ်စာ</th>
            <th>ဖုန်းနံပါတ်</th>
            <th>ကျောင်း၏ ဖေ့စ်ဘုတ်</th>
            <th>ဒေသ</th>
            <th>ကျောင်းအုပ်ကြီး၏ အမည်</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><a href="<?php echo htmlspecialchars($row['web_link']); ?>" target="_blank"> <?php echo htmlspecialchars($row['name']); ?></a></td>
                <td><?php echo htmlspecialchars($row['addr']); ?></td>
                <td><?php echo htmlspecialchars($row['phone']); ?></td>
                <td><a href="<?php echo htmlspecialchars($row['link']); ?>" target="_blank">FACEBOOK</a></td>
                <td><?php echo htmlspecialchars($row['region_name']); ?></td>
                <td><?php echo htmlspecialchars($row['teacher_name']); ?></td>
            </tr>
        <?php } ?>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo ($page - 1); ?>">← Previous</a>
        <?php else: ?>
            <a class="disabled">← Previous</a>
        <?php endif; ?>

        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo ($page + 1); ?>">Next →</a>
        <?php else: ?>
            <a class="disabled">Next →</a>
        <?php endif; ?>
    </div>
</main>

<footer>
    <?php include "footer.php"; ?>
</footer>

<script src="js/script.js"></script> <!-- Link to external JavaScript -->
</body>
</html>