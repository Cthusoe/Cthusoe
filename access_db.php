<?php

// Database credentials
$db_user = "root";  // Your MariaDB username
$db_pass = "";  // Your MariaDB password
$db_host = "localhost"; // RDS endpoint
$db_name = "language_school"; // Database name
$db_type = "mysql"; // Database type (MariaDB uses the MySQL driver in PDO)

// Data Source Name (DSN)
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8mb4";

// Connection options
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Enable exceptions for errors
    PDO::ATTR_EMULATE_PREPARES => false, // Use native prepared statements
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Fetch results as associative arrays
    #PDO::MYSQL_ATTR_SSL_CA => '/etc/ssl/certs/rds-ca-2019-root.pem', // Path to the SSL certificate
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false, // Disable server certificate verification (optional)
];

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $db_user, $db_pass, $options);

    // Optional: Test the connection
   # echo "Connected to the database successfully!<br>";

    // Run the query to fetch the database version
    $stmt = $pdo->query("SELECT VERSION()");
    $version = $stmt->fetchColumn();
    #echo "Database version: " . $version;
} catch (PDOException $e) {
    // Log the error and display a user-friendly message
    error_log("Database Error: " . $e->getMessage());
    die("Database connection error: " . $e->getMessage()); // Display the actual error message
}
?>
    
