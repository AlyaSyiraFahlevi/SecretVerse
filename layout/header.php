<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$current_page = basename($_SERVER['PHP_SELF']);

$public_pages = ['index.php', 'signin.php', 'signup.php'];
$authenticated_pages = ['dashboard.php'];

// Cek akses ke halaman send.php dengan parameter user_id
if ($current_page == 'send.php' && isset($_GET['user_id'])) {
    $public_pages[] = 'send.php';
}

// Kontrol akses untuk pengguna yang belum login
if (!isset($_SESSION['user_id']) && !in_array($current_page, $public_pages)) {
    header("Location: signin.php");
    exit();
}

// Kontrol akses untuk pengguna yang sudah login
if (isset($_SESSION['user_id']) && !in_array($current_page, $authenticated_pages)) {
    header("Location: dashboard.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecretVerse</title>
    
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poetsen+One&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">


</head>

<body class="h-full">