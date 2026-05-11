<?php include('includes/header.php'); ?>

<!-- <main class="container mx-auto px-6 py-12">
    <div class="mb-12">
        <h2 class="text-4xl font-bold neon-accent mb-4">Logic Lab</h2>
        <p class="text-gray-400">Master the fundamental algorithms that power the digital world.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-1 space-y-4">
            <div class="bg-gray-900 p-6 rounded-xl border-l-4 border-cyan-500">
                <span class="text-xs text-cyan-400 uppercase tracking-widest">Level 1</span>
                <h4 class="text-xl font-bold mt-1">Array Reversal Logic</h4>
                <p class="text-sm text-gray-500 mt-2">Learn to manipulate data structures without built-in functions.</p>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl border-l-4 border-gray-700 hover:border-cyan-500 transition cursor-pointer">
                <span class="text-xs text-gray-500 uppercase tracking-widest">Level 2</span>
                <h4 class="text-xl font-bold mt-1">Prime Search Algorithm</h4>
                <p class="text-sm text-gray-500 mt-2">Efficiently identifying prime numbers in a dataset.</p>
            </div>
        </div>


        <div class="lg:col-span-2 bg-black border border-gray-800 rounded-xl p-6">
            <div class="flex justify-between items-center mb-4">
                <span class="text-sm font-mono text-gray-400">syntix_engine.php</span>
                <button class="bg-cyan-600 text-xs px-4 py-2 rounded">Run Logic</button>
            </div>
            <div class="bg-gray-900 font-mono p-4 rounded text-cyan-300 min-h-[300px]">
                <p>// Solve the logic here</p>
                <p>function reverseArray($data) {</p>
                <p class="animate-pulse">_</p>
                <p>}</p>
            </div>
        </div>
    </div>


  


</main> -->

<main class="container mx-auto px-6 py-12">
    <!-- Header Section -->
    <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div>
            <h2 class="text-4xl font-bold neon-accent mb-4">Logic Lab</h2>
            <p class="text-gray-400 max-w-2xl">Master the fundamental algorithms that power the digital world. These challenges are designed to sharpen your logic for PHP, JavaScript, and beyond.</p>
        </div>
        <div class="flex items-center space-x-4 bg-gray-900 p-4 rounded-lg border border-gray-800">
            <div class="text-right">
                <p class="text-xs text-gray-500 uppercase tracking-widest">Active Developer</p>
                <p class="font-bold text-white"><?php echo ucwords(htmlspecialchars($_SESSION['user_name'] ?? 'Guest Node')); ?></p>
            </div>
            <div class="w-10 h-10 rounded-full bg-cyan-600 flex items-center justify-center font-bold text-white">
                <?php echo strtoupper(substr($_SESSION['user_name'] ?? 'G', 0, 1)); ?>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Sidebar: Challenge Navigation -->
        <div class="lg:col-span-1 space-y-4">
            <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Available Modules</h3>
            
            <!-- Module 1 -->
            <div class="bg-gray-900 p-6 rounded-xl border-l-4 border-cyan-500 shadow-lg group cursor-pointer hover:bg-gray-800 transition">
                <div class="flex justify-between items-start">
                    <span class="text-xs text-cyan-400 font-mono">Level 01</span>
                    <span class="text-[10px] bg-cyan-900/30 text-cyan-400 px-2 py-1 rounded">ACTIVE</span>
                </div>
                <h4 class="text-xl font-bold mt-2 group-hover:text-cyan-400 transition">Array Reversal</h4>
                <p class="text-sm text-gray-500 mt-2">Learn to manipulate data structures without built-in functions.</p>
            </div>

            <!-- Module 2 -->
            <div class="bg-gray-900 p-6 rounded-xl border-l-4 border-gray-700 opacity-60 hover:opacity-100 hover:border-cyan-500 transition cursor-pointer">
                <div class="flex justify-between items-start">
                    <span class="text-xs text-gray-500 font-mono">Level 02</span>
                    <span class="text-[10px] bg-gray-800 text-gray-400 px-2 py-1 rounded">LOCKED</span>
                </div>
                <h4 class="text-xl font-bold mt-2">Prime Search</h4>
                <p class="text-sm text-gray-500 mt-2">Efficiently identifying prime numbers in a dataset.</p>
            </div>

            <!-- Module 3 -->
            <div class="bg-gray-900 p-6 rounded-xl border-l-4 border-gray-700 opacity-60 hover:opacity-100 hover:border-cyan-500 transition cursor-pointer">
                <div class="flex justify-between items-start">
                    <span class="text-xs text-gray-500 font-mono">Level 03</span>
                    <span class="text-[10px] bg-gray-800 text-gray-400 px-2 py-1 rounded">LOCKED</span>
                </div>
                <h4 class="text-xl font-bold mt-2">Logic-Based IQ</h4>
                <p class="text-sm text-gray-500 mt-2">Pattern recognition and algorithmic puzzles for beginners.</p>
            </div>
        </div>

        <!-- Main Workspace: Code Playground Simulation -->
        <div class="lg:col-span-2 flex flex-col space-y-6">
            <div class="bg-black border border-gray-800 rounded-xl overflow-hidden shadow-2xl">
                <!-- Terminal Header -->
                <div class="bg-gray-900 px-6 py-3 flex justify-between items-center border-b border-gray-800">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="ml-4 text-xs font-mono text-gray-500">logic_engine.php</span>
                    </div>
                    <!-- <button class="bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-bold px-6 py-2 rounded-md transition shadow-lg shadow-cyan-900/20">
                        Run Logic
                    </button> -->
                       <span class="px-2 py-1 rounded bg-cyan-500/10 text-cyan-400 border border-cyan-500/20">
                PHP
            </span>
                </div>
                
                <!-- Code Area -->
                <div class="p-6 font-mono text-sm leading-relaxed bg-black">
                    <!-- inner start -->
           <div class="p-6 font-mono text-sm leading-relaxed bg-black rounded-xl">

    <!-- Line 1 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">01</span>
        <p class="text-gray-500">
            // Reverse array without using array_reverse()
        </p>
    </div>

    <!-- Line 2 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">02</span>
        <p>
            <span class="text-pink-500">function</span>
            <span class="text-yellow-400">reverseArray</span>($data) {
        </p>
    </div>

    <!-- Line 3 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">03</span>
        <p class="ml-4">
            <span class="text-cyan-300">$left</span> =
            <span class="text-orange-400">0</span>;
        </p>
    </div>

    <!-- Line 4 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">04</span>
        <p class="ml-4">
            <span class="text-cyan-300">$right</span> =
            <span class="text-yellow-400">count</span>($data) -
            <span class="text-orange-400">1</span>;
        </p>
    </div>

    <!-- Line 5 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">05</span>
        <p class="ml-4">
            <span class="text-pink-500">while</span>
            (<span class="text-cyan-300">$left</span>
            &lt;
            <span class="text-cyan-300">$right</span>) {
        </p>
    </div>

    <!-- Line 6 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">06</span>
        <p class="ml-8">
            <span class="text-cyan-300">$temp</span> =
            $data[<span class="text-cyan-300">$left</span>];
        </p>
    </div>

    <!-- Line 7 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">07</span>
        <p class="ml-8">
            $data[<span class="text-cyan-300">$left</span>] =
            $data[<span class="text-cyan-300">$right</span>];
        </p>
    </div>

    <!-- Line 8 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">08</span>
        <p class="ml-8">
            $data[<span class="text-cyan-300">$right</span>] =
            <span class="text-cyan-300">$temp</span>;
        </p>
    </div>

    <!-- Line 9 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">09</span>
        <p class="ml-8">
            <span class="text-cyan-300">$left</span>++;
        </p>
    </div>

    <!-- Line 10 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">10</span>
        <p class="ml-8">
            <span class="text-cyan-300">$right</span>--;
        </p>
    </div>

    <!-- Line 11 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">11</span>
        <p class="ml-4">}</p>
    </div>

    <!-- Line 12 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">12</span>
        <p class="ml-4">
            <span class="text-pink-500">return</span> $data;
        </p>
    </div>

    <!-- Line 13 -->
    <div class="flex">
        <span class="text-gray-700 mr-4 select-none">13</span>
        <p>}</p>
    </div>

</div>
                    <!-- inner end -->

                </div>
            </div>

            <!-- Contextual Help / YouTube Integration -->
            <div class="bg-gray-900/50 border border-gray-800 p-6 rounded-xl">
                <h4 class="text-lg font-semibold mb-3 flex items-center">
                    <span class="w-2 h-2 bg-cyan-500 rounded-full mr-2"></span>
                    Logic Guide
                </h4>
                <p class="text-sm text-gray-400 mb-4">Stuck? Watch the walkthrough on <strong>ObsidianApexPrime</strong> where we break down logic-based problem solving.</p>
                <div class="aspect-video bg-black rounded-lg flex items-center justify-center border border-gray-800 hover:border-red-600/50 transition group cursor-pointer">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition">
                            <div class="w-0 h-0 border-t-8 border-t-transparent border-l-12 border-l-white border-b-8 border-b-transparent ml-1"></div>
                        </div>
                        <p class="text-xs text-gray-500">Tutorial: Advanced Array Manipulation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>