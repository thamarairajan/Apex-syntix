<?php
// 1. DATABASE CONNECTION (Update with your InfinityFree details)
$host = 'localhost'; // Found in your Control Panel
$user = 'root';     // Found in your Control Panel
$pass = '';      // Your account password
$db   = 'apex_syntix_db';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. FETCH COMPONENTS
$query = "SELECT * FROM ui_components WHERE is_active = 1 ORDER BY category ASC";
$result = mysqli_query($conn, $query);
?>
<?php include('includes/header.php'); ?>
<nav class="bg-gray-900 border-b border-gray-800 px-6 py-4">
    <div class="max-w-7xl mx-auto">
        <a href="index.php" class="text-blue-400 hover:text-blue-300 transition flex items-center gap-2">
            <span>←</span> Back
        </a>
    </div>
</nav>

    <!-- Main Content -->
    <main class="min-h-screen bg-gray-900 py-12 px-6">
    <div class="max-w-7xl mx-auto">

        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <div class="grid grid-cols-1 gap-12">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    
                    <!-- Component Card -->
                    <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden shadow-2xl">
                        
                        <!-- Info Header -->
                        <div class="px-6 py-4 border-b border-gray-800 flex justify-between items-center bg-gray-800/30">
                            <div>
                                <h3 class="text-xl font-bold text-white"><?php echo htmlspecialchars($row['title']); ?></h3>
                                <p class="text-sm text-gray-500"><?php echo htmlspecialchars($row['description']); ?></p>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold text-blue-400 bg-blue-400/10 rounded-full border border-blue-400/20">
                                <?php echo htmlspecialchars($row['category']); ?>
                            </span>
                        </div>

                        <!-- Live Preview Area -->
                        <div class="p-12 flex justify-center items-center bg-[radial-gradient(#1f2937_1px,transparent_1px)] [background-size:20px_20px]">
                            <!-- The actual rendered HTML from DB -->
                            <div class="w-full flex justify-center">
                                <?php echo $row['html_code']; ?>
                            </div>
                        </div>

                        <!-- Code Section -->
                        <div class="bg-black/50 border-t border-gray-800">
                            <div class="flex justify-between items-center px-6 py-2 bg-gray-800/50">
                                <span class="text-xs font-mono text-gray-400 uppercase tracking-widest">HTML Code Snippet</span>
                                <button onclick="copyToClipboard('code-<?php echo $row['id']; ?>')" class="text-xs bg-gray-700 hover:bg-blue-600 text-white px-3 py-1 rounded transition">
                                    Copy Code
                                </button>
                            </div>
                            <pre class="p-6 overflow-x-auto text-sm text-blue-300 font-mono"><code id="code-<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['html_code']); ?></code></pre>
                        </div>

                    </div>

                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-20">
                <p class="text-gray-500 text-xl">No components found. Time to add some to the database!</p>
            </div>
        <?php endif; ?>
        </div>
    </main>

 
    <!-- JavaScript for Copy Functionality -->
    <script>
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('Code copied to clipboard!');
            }).catch(err => {
                console.error('Error in copying text: ', err);
            });
        }
    </script>

</body>
</html>

<?php mysqli_close($conn); ?>
<?php include('includes/footer.php'); ?>
