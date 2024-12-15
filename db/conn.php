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
$host = 'cat670aihdrkt1.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com';
$db = 'd194o2jdi4gg9j';
$user = 'u9rcruifdh6u3s';
$pass = 'p8a62f1bc5e652f2eff3e00573baf1561a4324b302231d3318ec14ae98d93f4b7';
$charset = 'utf8';

$dsn = "pgsql:host=$host;port=5432;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to PostgreSQL successfully!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

require_once 'crud.php'; 
    $crud = new crud($pdo);
?>
