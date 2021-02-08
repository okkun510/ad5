<?php
    try {
        $database = new PDO ('mysql:dbname=ad5;host=mysql;charset=utf8mb4', 'root', 'password');
    } catch(PDOException $e) {
        echo 'DB接続に失敗しました。' . $e->getMessage();
    }
