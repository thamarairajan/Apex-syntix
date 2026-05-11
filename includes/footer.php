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
    const chatWindow = document.getElementById('chat-window');
    const userInput = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');

    async function sendMessage() {
        const message = userInput.value.trim();
        if (!message) return;

        // Append User Message to UI
        appendMessage(message, 'user');
        userInput.value = '';

        // Add Loading Indicator
        const loadingDiv = appendMessage('...', 'ai-loading');

        try {
            const response = await fetch('api.php', {
                method: 'POST',
                headers: { 'Content-Type: application/json' },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();
            loadingDiv.remove(); // Remove loading dots
            appendMessage(data.response, 'ai');
        } catch (error) {
            loadingDiv.remove();
            appendMessage("Error: Could not connect to the server.", 'ai');
        }
    }

    function appendMessage(text, sender) {
        const msgDiv = document.createElement('div');
        msgDiv.className = sender === 'user' 
            ? "bg-gray-800 text-white self-end p-3 rounded-lg max-w-[80%] text-sm"
            : "bg-blue-50 text-blue-800 self-start p-3 rounded-lg max-w-[80%] text-sm";
        
        msgDiv.innerText = text;
        chatWindow.appendChild(msgDiv);
        chatWindow.scrollTop = chatWindow.scrollHeight;
        return msgDiv;
    }

    sendBtn.addEventListener('click', sendMessage);
    userInput.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });
</script>

</body>
</html>