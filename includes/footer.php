<footer class="p-8 border-t border-gray-800 text-center text-gray-600 text-sm">
        <div class="mb-4">
            <p>&copy; <?php echo date("Y"); ?> Apex Syntix. All Rights Reserved.</p>
            <p class="mt-1">Built for the Digital World by ObsidianApexPrime</p>
        </div>
        <div class="flex justify-center space-x-4">
            <a href="#" class="hover:text-cyan-400">GitHub</a>
            <a href="#" class="hover:text-cyan-400">YouTube</a>
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
</script>

</body>
</html>