<?php include('includes/header.php'); ?>
<div class="max-w-4xl mx-auto p-4">
    <header class="py-6">
        <h1 class="text-2xl font-bold text-gray-800">AI Assistant</h1>
        <p class="text-sm text-gray-500">Powered by Gemini 1.5 Flash</p>
    </header>

    <!-- Chat Window -->
    <div id="chat-window" class="chat-container overflow-y-auto bg-white border border-gray-200 rounded-xl p-4 mb-4 shadow-sm flex flex-col gap-4">
        <!-- AI Welcome Message -->
        <div class="bg-blue-50 text-blue-800 self-start p-3 rounded-lg max-w-[80%] text-sm">
            Hello! How can I help you today?
        </div>
    </div>

    <!-- Input Area -->
    <div class="relative">
        <input type="text" id="user-input" 
               class="w-full p-4 pr-24 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:outline-none shadow-sm" 
               placeholder="Type your message here...">
        <button id="send-btn" 
                class="absolute right-2 top-2 bottom-2 px-6 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
            Send
        </button>
    </div>
</div>


<?php include('includes/footer.php'); ?>