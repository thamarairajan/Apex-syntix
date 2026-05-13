
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Apex Syntix | Digital Leadership</title> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Apex Syntix Favicon -->
        <link rel="icon" type="image/png" href="img/favicon.png">
        <!-- For Apple Devices -->
        <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

  <title><?php echo isset($pageTitle) ? $pageTitle : "Lead Developer | Full Stack Developer"; ?></title>

    <!-- Essential Meta Tags for Social Media -->
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'LLead Developer Blog'; ?>">
    <meta property="og:description" content="<?php echo isset($pageDesc) ? $pageDesc : 'Technical tutorials and web development insights.'; ?>">
    <meta property="og:image" content="<?php echo isset($pageImg) ? $pageImg : 'https://yourdomain.com/default-preview.jpg'; ?>">
    <meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
    
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'LLead Developer Blog'; ?>">
    <style>
        body { background-color: #0B0B0B; color: #E5E7EB; }
        :root { --primary: #00d2ff; --bg: #121212; --card: #1e1e1e; }
   /* body { background: var(--bg); font-family: 'Inter', sans-serif; } */

.chat-container {
    width: 380px; height: 500px;
    background: var(--card);
    border-radius: 15px;
    display: flex; flex-direction: column;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    position: fixed; bottom: 20px; right: 20px;
}

.chat-header {
    padding: 15px; background: rgba(255,255,255,0.05);
    border-bottom: 1px solid #333; display: flex; align-items: center;
}

.status-dot { width: 8px; height: 8px; background: #00ff88; border-radius: 50%; margin-left: 10px; }

.chat-box { flex: 1; padding: 15px; overflow-y: auto; color: white; }

.message { margin-bottom: 15px; padding: 10px; border-radius: 10px; max-width: 80%; line-height: 1.4; }
.bot { background: #333; align-self: flex-start; }
.user { background: var(--primary); color: black; align-self: flex-end; margin-left: auto; }

.chat-input-area { display: flex; padding: 15px; border-top: 1px solid #333; }
input { flex: 1; background: #2a2a2a; border: none; padding: 10px; color: white; border-radius: 5px; outline: none; }
button { background: var(--primary); border: none; padding: 10px 15px; margin-left: 10px; border-radius: 5px; cursor: pointer; font-weight: bold; }
        .neon-accent { color: #00F2FF; } 
        .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
}
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <div id="progress-bar" class="fixed top-0 left-0 h-1 bg-blue-500 z-[60] transition-all duration-150" style="width: 0%"></div>

    <!-- The 'sticky' and 'top-0' fix it to the top. 
     'backdrop-blur-md' and 'bg-black/70' create the iPhone-style transparency. 
     'z-50' ensures it stays above all other content. -->
<header class="sticky top-0 z-50 p-4 md:p-6 border-b border-gray-800 bg-black/70 backdrop-blur-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo Section -->
        <div class="text-xl md:text-2xl font-bold tracking-tighter">
            <a href="index.php" class="flex items-center space-x-2">
                <span class="text-cyan-400 font-black">APEX</span>
                <span class="text-white">SYNTIX</span>
            </a>
        </div>

        <!-- Desktop Navigation & Auth -->
        <div class="flex items-center space-x-6">
            <nav class="hidden md:flex space-x-8 text-sm font-medium text-gray-400">
                <a href="index.php" class="hover:text-cyan-400 transition">Home</a>
                <a href="dashboard.php" class="hover:text-cyan-400 transition">Dashboard</a>
                <a href="logic-lab.php" class="hover:text-cyan-400 transition">Logic Lab</a>
            </nav>

            <div class="hidden md:flex items-center space-x-4 border-l border-gray-800 pl-6">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="logout.php" class="bg-red-600/10 text-red-400 border border-red-600/30 hover:bg-red-600 hover:text-white px-5 py-2 rounded-full text-xs font-bold transition">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="login.php" class="bg-cyan-600 hover:bg-cyan-500 text-white px-6 py-2 rounded-full text-xs font-bold transition shadow-lg shadow-cyan-900/20">
                        Login
                    </a>
                <?php endif; ?>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button id="mobile-menu-button" class="md:hidden text-gray-400 hover:text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-black border-b border-gray-800 p-6 space-y-4 animate-in slide-in-from-top duration-300">
        <nav class="flex flex-col space-y-4 text-gray-400 font-medium">
            <a href="index.php" class="hover:text-cyan-400 py-2 border-b border-gray-900">Home</a>
            <a href="dashboard.php" class="hover:text-cyan-400 py-2 border-b border-gray-900">Dashboard</a>
            <a href="logic-lab.php" class="hover:text-cyan-400 py-2 border-b border-gray-900">Logic Lab</a>
            
            <div class="pt-4">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <a href="logout.php" class="block w-full text-center bg-red-600/20 text-red-400 border border-red-600/50 py-3 rounded-xl font-bold text-sm">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="login.php" class="block w-full text-center bg-cyan-600 text-white py-3 rounded-xl font-bold text-sm">
                        Login
                    </a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>

<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    const icon = document.getElementById('menu-icon');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        // Simple icon toggle between hamburger and X
        if (menu.classList.contains('hidden')) {
            icon.setAttribute('d', 'M4 6h16M4 12h16m-7 6h7');
        } else {
            icon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
        }
    });
</script>