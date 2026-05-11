<?php include('includes/header.php'); ?>

<main class="container mx-auto px-6 py-12">
    <div class="flex flex-col md:flex-row justify-between items-end mb-12">
        <div>
          <div class="mb-12">
   <h2 class="text-3xl font-bold">
    Welcome, <span class="neon-accent">
        <?php echo isset($_SESSION['user_name']) ? ucwords(htmlspecialchars($_SESSION['user_name'])) : 'Digital Leader'; ?>
    </span>
</h2>
</div>
        </div>
        <div class="bg-gray-900 px-6 py-3 rounded-lg border border-gray-800">
            <span class="text-sm text-gray-400">Total Logic Points:</span>
            <span class="text-xl font-bold neon-accent ml-2">1,250</span>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Stats Sidebar -->
        <div class="space-y-6">
            <div class="bg-gray-900 p-6 rounded-xl">
                <h5 class="text-gray-400 text-sm mb-4">Course Progress</h5>
                <div class="w-full bg-black h-2 rounded-full overflow-hidden">
                    <div class="bg-cyan-500 h-full w-3/4"></div>
                </div>
                <p class="text-right text-xs mt-2">75% Complete</p>
            </div>
        </div>

        <!-- Main Feed -->
        <div class="md:col-span-3 space-y-6">
            <h4 class="text-xl font-bold">Your Learning Path</h4>
            <div class="bg-gray-900 p-6 rounded-xl flex justify-between items-center">
                <div>
                    <h5 class="font-bold">Next Lesson: PHP API Integration</h5>
                    <p class="text-sm text-gray-500">Based on your work with RCB and ITD projects.</p>
                </div>
                <button class="bg-white text-black px-6 py-2 rounded-full text-sm font-bold">Resume</button>
            </div>
        </div>
    </div>
</main>

<?php include('includes/footer.php'); ?>