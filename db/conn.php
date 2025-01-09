<?php 
    // Development Connection
    //$host = '127.0.0.1';
    //$db = 'attendance_db';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    // Remote Database Connection
    $host = 'sql5.freesqldatabase.com';
    $db = 'sql5755171';
    $user = 'sql5755171';
    $pass = 'ZerIkSMwKZ';
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
    require_once 'user.php'; 
    $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser("admin","password");
?>

