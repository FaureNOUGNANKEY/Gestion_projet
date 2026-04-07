<?php 
    include_once __DIR__ . '/../config.php';
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "/views/auth/login.php");
        exit();
    }