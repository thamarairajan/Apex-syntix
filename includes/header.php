<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apex Syntix | Digital Leadership</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Apex Syntix Favicon -->
        <link rel="icon" type="image/png" href="img/favicon.png">
        <!-- For Apple Devices -->
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <style>
        body { background-color: #0B0B0B; color: #E5E7EB; }
        .neon-accent { color: #00F2FF; } 
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- The 'sticky' and 'top-0' fix it to the top. 
     'backdrop-blur-md' and 'bg-black/70' create the iPhone-style transparency. 
     'z-50' ensures it stays above all other content. -->
<header class="sticky top-0 z-50 p-6 border-b border-gray-800 bg-black/70 backdrop-blur-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo Section -->
        <div class="text-2xl font-bold tracking-tighter">
            <a href="index.php" class="flex items-center space-x-2">
                <span class="text-cyan-400">APEX</span>
                <span class="text-white">SYNTIX</span>
            </a>
        </div>

        <!-- Navigation Section -->
        <div class="flex items-center space-x-6">
            <nav class="hidden md:flex space-x-6 text-sm font-medium text-gray-400">
                <a href="index.php" class="hover:text-cyan-400 transition">Home</a>
                <a href="dashboard.php" class="hover:text-cyan-400 transition">Dashboard</a>
                <a href="logic-lab.php" class="hover:text-cyan-400 transition">Logic Lab</a>
            </nav>

            <div class="flex items-center space-x-4 border-l border-gray-800 pl-6">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="logout.php" class="bg-red-600/20 text-red-400 border border-red-600/50 hover:bg-red-600 hover:text-white px-5 py-2 rounded-full text-sm font-bold transition">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="login.php" class="bg-cyan-600 hover:bg-cyan-500 text-white px-5 py-2 rounded-full text-sm font-bold transition shadow-lg shadow-cyan-900/20">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>