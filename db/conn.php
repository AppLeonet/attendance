<!--?php 
    $host = '127.0.0.1';
    $db = 'attendance_db';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'hellow world';
    } catch(PDOException $e) {
        //echo 'no';
        throw new PDOException($e->getMessage());
        
    }

    require_once 'crud.php'; 
    $crud = new crud($pdo);
?-->



<?php
// Get the DATABASE_URL environment variable from Heroku
$database_url = getenv("DATABASE_URL");

if (!$database_url) {
    die("DATABASE_URL environment variable not set. Please ensure your Heroku app is configured with the Postgres database.");
}

// Parse the DATABASE_URL
$parsed_url = parse_url($database_url);

// Extract components from the parsed URL
$host = $parsed_url["host"];
$db = ltrim($parsed_url["path"], '/'); // Remove the leading '/' from the database name
$user = $parsed_url["user"];
$pass = $parsed_url["pass"];
$port = $parsed_url["port"];
$charset = 'utf8';

// Create the DSN (Data Source Name) for PostgreSQL
$dsn = "pgsql:host=$host;port=$port;dbname=$db;user=$user;password=$pass;charset=$charset";

try {
    // Create a new PDO instance for PostgreSQL
    $pdo = new PDO($dsn);

    // Set error mode to exception for better debugging
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Uncomment the line below for debugging connection success
    // echo 'Connected successfully to Heroku PostgreSQL!';
} catch (PDOException $e) {
    // Throw the exception if the connection fails
    throw new PDOException($e->getMessage());
}

// Include your CRUD operations class
require_once 'crud.php'; 
$crud = new crud($pdo);
?>

