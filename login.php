<?php include('includes/header.php'); ?>
<?php
// session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: dashboard.php"); // Send them away if they are already logged in
    exit;
}
?>
<main class="flex-grow flex items-center justify-center p-4">
    <div class="w-full max-auto max-w-md bg-gray-900 border border-gray-800 p-8 rounded-lg shadow-2xl">
        <h2 class="text-3xl font-semibold mb-6 text-center">Login to <span class="neon-accent">Core</span></h2>
        
        <!-- Display errors if they exist in the URL -->
        <?php if(isset($_GET['error'])): ?>
            <p class="text-red-500 text-sm mb-4 text-center">Invalid email or password.</p>
        <?php endif; ?>

        <form action="login_process.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm mb-1 text-gray-400">Email Address</label>
                <input type="email" name="email" required 
                    class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
            </div>
            <div>
                <label class="block text-sm mb-1 text-gray-400">Password</label>
                <input type="password" name="password" required 
                    class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
            </div>
            <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-500 text-white font-bold py-3 rounded mt-4 transition">
                Initialize Session
            </button>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-500">
            New to the Digital World? <a href="register.php" class="neon-accent hover:underline">Create Account</a>
        </p>
    </div>
</main>

<?php include('includes/footer.php'); ?>