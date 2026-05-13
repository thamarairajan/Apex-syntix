<?php include('includes/header.php'); ?>

<nav class="bg-gray-900 border-b border-gray-800 px-6 py-4">
    <div class="max-w-7xl mx-auto">
        <a href="index.php" class="text-blue-400 hover:text-blue-300 transition flex items-center gap-2">
            <span>←</span> Back
        </a>
    </div>
</nav>
  <main class="min-h-screen bg-gray-900 py-12 px-6">
    <div class="max-w-7xl mx-auto">
<!-- Main Dashboard Container -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    
    <!-- Sidebar: Personal Stats & Rank -->
    <div class="space-y-6">
        <!-- Growth Rank Card -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-gray-800">
            <h5 class="text-gray-400 text-xs uppercase tracking-widest mb-4">Platform Rank</h5>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-500/20 rounded-full flex items-center justify-center text-blue-500 border border-blue-500/30">
                    <i class="fas fa-trophy"></i>
                </div>
                <div>
                    <p class="text-white font-bold">Senior Logicist</p>
                    <p class="text-xs text-gray-500">Top 15% this month</p>
                </div>
            </div>
        </div>

        <!-- Weekly Logic Streak -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-gray-800">
            <h5 class="text-gray-400 text-xs uppercase tracking-widest mb-4">Daily Logic Streak</h5>
            <div class="flex justify-between gap-1">
                <!-- Simple dot indicator for 7 days -->
                <div class="w-full h-8 bg-blue-500 rounded-md shadow-[0_0_10px_rgba(59,130,246,0.5)]"></div>
                <div class="w-full h-8 bg-blue-500 rounded-md"></div>
                <div class="w-full h-8 bg-blue-500 rounded-md"></div>
                <div class="w-full h-8 bg-gray-700 rounded-md"></div>
                <div class="w-full h-8 bg-gray-700 rounded-md"></div>
                <div class="w-full h-8 bg-gray-700 rounded-md"></div>
                <div class="w-full h-8 bg-gray-700 rounded-md"></div>
            </div>
            <p class="text-xs text-gray-400 mt-3">3 Day Streak! Keep it up.</p>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="md:col-span-3 space-y-8">
        
        <!-- NEW: Lead's Methodology Section -->
        <div class="bg-gradient-to-r from-blue-900/20 to-transparent p-1 rounded-2xl border border-blue-500/20">
            <div class="bg-gray-900 p-8 rounded-2xl flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="max-w-md">
                    <span class="bg-blue-500/10 text-blue-400 text-[10px] uppercase font-black px-2 py-1 rounded tracking-tighter">Mentor Access</span>
                    <h5 class="text-xl font-bold text-white mt-2">Request Lead Review</h5>
                    <p class="text-sm text-gray-400 mt-2">Stuck on a logic problem? Submit your code and I'll record a 2-minute video review of your architecture.</p>
                </div>
                <button class="w-full md:w-auto bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-bold transition-all transform hover:scale-105">
                    Submit Code
                </button>
            </div>
        </div>

        <!-- NEW: Active Challenges -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-800/40 p-6 rounded-2xl border border-gray-800">
                <h6 class="text-white font-bold flex items-center gap-2 mb-4">
                    <i class="fas fa-brain text-cyan-400 text-xs"></i> Logic Lab Weekly
                </h6>
                <p class="text-sm text-gray-500 mb-4">Challenge: Optimize a PHP array filter for 10k+ records.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-cyan-400 font-mono">+250 Points</span>
                    <a href="#" class="text-xs text-white underline font-bold">Accept Challenge</a>
                </div>
            </div>

            <div class="bg-gray-800/40 p-6 rounded-2xl border border-gray-800">
                <h6 class="text-white font-bold flex items-center gap-2 mb-4">
                    <i class="fas fa-layer-group text-purple-400 text-xs"></i> Syntix UI Task
                </h6>
                <p class="text-sm text-gray-500 mb-4">Implement a "Glassmorphic" Sidebar using Tailwind CSS.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-purple-400 font-mono">+150 Points</span>
                    <a href="#" class="text-xs text-white underline font-bold">View Assets</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</main>

<?php include('includes/footer.php'); ?>