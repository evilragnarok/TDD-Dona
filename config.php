<?php
$pdo = new PDO("mysql:host=localhost;dbname=YOUR_DB;charset=utf8mb4","DB_USER","DB_PASS");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
