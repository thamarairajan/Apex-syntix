<?php include('includes/header.php'); ?>

<main class="flex-grow flex items-center justify-center p-4">
    <!-- Centered Registration Card -->
    <div class="w-full max-w-lg bg-gray-900 border border-gray-800 p-8 rounded-lg shadow-2xl my-10">
        <h2 class="text-3xl font-semibold mb-2 text-center">Join <span class="neon-accent">Apex Syntix</span></h2>
        <p class="text-gray-500 text-center mb-8 text-sm">Start your journey in the Digital World.</p>
        
        <form action="register_process.php" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <!-- Full Name -->
            <div class="md:col-span-2">
                <label class="block text-sm mb-1 text-gray-400">Full Name</label>
                <input type="text" name="fullname" placeholder="apexsyntix" required 
                    class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
            </div>

            <!-- Email Address -->
            <div class="md:col-span-2">
                <label class="block text-sm mb-1 text-gray-400">Email Address</label>
                <input type="email" name="email" placeholder="dev@apexsyntix.com" required 
                    class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm mb-1 text-gray-400">Password</label>
                <input type="password" name="password" required 
                    class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm mb-1 text-gray-400">Confirm Password</label>
                <input type="password" name="confirm_password" required 
                    class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
            </div>

            <!-- Professional Role (Optional) -->
            <div class="md:col-span-2">
                <label class="block text-sm mb-1 text-gray-400">What is your current role?</label>
                <select name="role" class="w-full bg-black border border-gray-700 p-3 rounded focus:border-cyan-500 outline-none transition text-white">
                    <option value="student">Student / Aspiring Developer</option>
    <option value="developer">Professional Developer</option>
    <option value="career_shifter">Career Pivot / Tech Transitioner</option>
    <option value="lead">Team Lead / Project Architect</option>
    <option value="other">Digital Innovator / Other</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="md:col-span-2 pt-4">
                <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-500 text-white font-bold py-3 rounded transition shadow-lg shadow-cyan-900/20">
                    Create Digital Identity
                </button>
            </div>
        </form>
        
        <p class="mt-6 text-center text-sm text-gray-500">
            Already a member? <a href="login.php" class="neon-accent hover:underline">Initialize Session</a>
        </p>
    </div>
</main>

<script>
const password = document.getElementsByName('password')[0];
const confirm = document.getElementsByName('confirm_password')[0];

function validatePassword(){
  if(password.value != confirm.value) {
    confirm.setCustomValidity("Passwords Don't Match");
  } else {
    confirm.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm.onkeyup = validatePassword;
</script>

<?php include('includes/footer.php'); ?>