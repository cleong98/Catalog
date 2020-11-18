<?php

//config
    $host = '127.0.0.1';
    $dbname = 'catelog';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$dbname";

    try {
        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    } catch (PDOException $e) {
        
        echo 'error' . $e;

    }


?>