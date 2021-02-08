<?php
    require('config.php');
    try {
        $database = new PDO ('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8mb4', DB_USER, DB_PASS);
    } catch(PDOException $e) {
        echo 'DB接続に失敗しました。' . $e->getMessage();
    }
