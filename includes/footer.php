<footer class="bg-gray-900 border-t border-gray-800 pt-16 pb-8 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            
            <!-- Column 1: Brand & Mission -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 bg-blue-600 rounded flex items-center justify-center font-black text-white">S</div>
                    <span class="text-xl font-bold text-white tracking-tight">Syntix<span class="text-blue-500">Platform</span></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    A growth ecosystem for developers to master logic, architect scalable systems, and bridge the gap between syntax and leadership.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-500 hover:text-white transition"><i class="fab fa-github text-xl"></i></a>
                    <a href="#" class="text-gray-500 hover:text-red-500 transition"><i class="fab fa-youtube text-xl"></i></a>
                    <a href="#" class="text-gray-500 hover:text-blue-400 transition"><i class="fab fa-linkedin text-xl"></i></a>
                </div>
            </div>

            <!-- Column 2: Platform Tracks -->
            <div>
                <h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Growth Tracks</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="logic-lab.php" class="text-gray-400 hover:text-blue-500 transition">Logic Lab (DSA)</a></li>
                    <li><a href="ui-library.php" class="text-gray-400 hover:text-blue-500 transition">Syntix UI Library</a></li>
                    <li><a href="video-feed.php" class="text-gray-400 hover:text-blue-500 transition">Project Walkthroughs</a></li>
                    <li><a href="blog.php" class="text-gray-400 hover:text-blue-500 transition">Engineering Blog</a></li>
                </ul>
            </div>

            <!-- Column 3: Resources -->
            <div>
                <h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Resources</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">Drupal 10 Migration Guide</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">PHP API Checklist</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">Mentorship Program</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-blue-500 transition">OSS Contribution</a></li>
                </ul>
            </div>

            <!-- Column 4: Newsletter/CTA -->
            <div>
                <h4 class="text-white font-bold mb-6 uppercase text-xs tracking-widest">Stay Updated</h4>
                <p class="text-gray-400 text-xs mb-4">Get notified when new logic puzzles or UI components are released.</p>
                <form class="relative">
                    <input type="email" placeholder="Email Address" class="w-full bg-gray-800 border border-gray-700 rounded-xl py-3 px-4 text-sm text-white focus:outline-none focus:border-blue-500 transition">
                    <button class="absolute right-2 top-2 bg-blue-600 hover:bg-blue-700 text-white p-1.5 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-gray-500 text-xs">
                &copy; <?php echo date("Y"); ?> Syntix Growth Platform. Designed by <span class="text-gray-300">Lead Developer</span>.
            </p>
            
            <!-- Live Platform Status Indicator -->
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                    </span>
                    <span class="text-gray-500 text-xs font-mono uppercase tracking-tighter">System: Optimal</span>
                </div>
                <div class="flex items-center gap-2">
                    <i class="fas fa-bolt text-yellow-500 text-xs"></i>
                    <span class="text-gray-500 text-xs font-mono uppercase tracking-tighter">Lead: Active</span>
                </div>
            </div>
        </div>
    </div>
</footer>


    <script>
function toggleChat() {
    const container = document.getElementById('chat-container');
    // Using Tailwind's 'hidden' class to toggle
    container.classList.toggle('hidden');
    // Optional: Focus the input when opened
    if (!container.classList.contains('hidden')) {
        document.getElementById('user-input').focus();
    }
}

function handleKeyPress(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
}

async function sendMessage() {
    const input = document.getElementById('user-input');
    const chatBox = document.getElementById('chat-box');
    const userMessage = input.value.trim();

    if (!userMessage) return;

    // User Message (Tailwind Styled)
    chatBox.innerHTML += `
        <div class="self-end bg-sky-500 text-white p-3 rounded-2xl rounded-tr-none max-w-[85%] shadow-md">
            ${userMessage}
        </div>
    `;
    
    input.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;

    try {
        const formData = new FormData();
        formData.append('message', userMessage);

        const response = await fetch('api.php', {
            method: 'POST',
            body: formData
        });
        
        const data = await response.text();
        
        // AI Response (Tailwind Styled)
        chatBox.innerHTML += `
            <div class="self-start bg-zinc-800 text-zinc-200 p-3 rounded-2xl rounded-tl-none max-w-[85%] border border-zinc-700">
                ${data}
            </div>
        `;
        chatBox.scrollTop = chatBox.scrollHeight;
    } catch (error) {
        chatBox.innerHTML += `<div class="text-red-400 text-xs text-center">Connection lost...</div>`;
    }

    // Smooth scroll to top on page load if pagination was used
    if (window.location.search.includes('page=')) {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}





    window.onscroll = function() {
        let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        let scrolled = (winScroll / height) * 100;
        document.getElementById("progress-bar").style.width = scrolled + "%";
    };

</script>

</body>
</html>