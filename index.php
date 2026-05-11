<?php include('includes/header.php'); ?>


<section class="flex-grow flex flex-col items-center justify-center text-center px-4 py-20 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-4xl">
        <h2 class="text-5xl md:text-7xl font-extrabold mb-6 tracking-tighter">
            THE FUTURE IS <span class="neon-accent">SYNTHESIZED</span>
        </h2>
        <p class="text-xl text-gray-400 mb-10 leading-relaxed">
            Leading the digital world through advanced logic, clean code, and scalable architecture. 
            Built by developers, for the next generation of digital leaders.
        </p>
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="register.php" class="bg-cyan-600 hover:bg-cyan-500 text-white px-10 py-4 rounded-full font-bold transition shadow-lg shadow-cyan-900/30">
                Join the Network
            </a>
            <a href="#explore" class="border border-gray-700 hover:border-cyan-500 px-10 py-4 rounded-full font-bold transition">
                Explore Tools
            </a>
        </div>
    </div>
</section>

<!-- Feature Grid: The Core Ports -->
<section id="explore" class="py-20 bg-black">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Logic Lab (Based on your YouTube focus) -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-800 hover:border-cyan-500/50 transition group">
                <div class="w-12 h-12 bg-cyan-900/20 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <span class="neon-accent text-2xl font-bold">{ }</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Logic Lab</h3>
                <p class="text-gray-400 mb-6">Master algorithmic puzzles and logic-based problem solving designed for beginners and pros alike.</p>
                <a href="#" class="text-cyan-400 font-semibold hover:underline">Access Engine &rarr;</a>
            </div>

            <!-- Component Library (Based on your Tailwind/Bootstrap skills) -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-800 hover:border-cyan-500/50 transition group">
                <div class="w-12 h-12 bg-cyan-900/20 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <span class="neon-accent text-2xl font-bold">[]</span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Syntix UI</h3>
                <p class="text-gray-400 mb-6">A library of responsive, high-performance UI components built with Tailwind CSS and clean code.</p>
                <a href="#" class="text-cyan-400 font-semibold hover:underline">Browse Library &rarr;</a>
            </div>

            <!-- YouTube Hub (ObsidianApexPrime integration) -->
            <div class="bg-gray-900 p-8 rounded-2xl border border-gray-800 hover:border-cyan-500/50 transition group">
                <div class="w-12 h-12 bg-cyan-900/20 rounded-lg flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <span class="neon-accent text-2xl font-bold">>></span>
                </div>
                <h3 class="text-2xl font-bold mb-4">Video Feed</h3>
                <p class="text-gray-400 mb-6">Direct access to the ObsidianApexPrime channel for live coding tutorials and tech insights.</p>
                <a href="tutorials.php" class="text-cyan-400 font-semibold hover:underline">Watch Tutorials &rarr;</a>
            </div>

        </div>
    </div>
</section>

<!-- Stats / Credibility Section -->
<!-- <section class="py-20 border-t border-gray-900">
    <div class="container mx-auto px-6 text-center">
        <h4 class="text-gray-500 uppercase tracking-widest text-sm mb-12">Built on Expertise</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div>
                <p class="text-3xl font-bold neon-accent">2.5+</p>
                <p class="text-gray-500">Years Experience</p>
            </div>
            <div>
                <p class="text-3xl font-bold neon-accent">Full Stack</p>
                <p class="text-gray-500">Architecture</p>
            </div>
            <div>
                <p class="text-3xl font-bold neon-accent">Clean</p>
                <p class="text-gray-500">Code Standards</p>
            </div>
            <div>
                <p class="text-3xl font-bold neon-accent">Global</p>
                <p class="text-gray-500">Vision</p>
            </div>
        </div>
    </div>
</section> -->
<!-- ai  -->
 <!-- Floating Chat Trigger -->
<!-- <div id="chat-circle" class="chat-circle" onclick="toggleChat()">
    <img src="https://cdn-icons-png.flaticon.com/512/8149/8149171.png" alt="AI Icon" width="30">
</div> -->

<!-- The Actual Chat Window (Hidden by default) -->
<div id="chat-circle" 
     onclick="toggleChat()" 
     class="fixed bottom-5 right-5 w-16 h-16 bg-sky-500 rounded-full flex items-center justify-center cursor-pointer shadow-lg hover:scale-110 transition-transform z-50">
    <img src="https://cdn-icons-png.flaticon.com/512/8149/8149171.png" class="w-8 h-8 invert" alt="AI">
</div>

<!-- Chat Window -->
<div id="chat-container" 
     class="hidden fixed bottom-24 right-5 w-80 md:w-96 h-[500px] bg-zinc-900 border border-zinc-800 rounded-2xl flex flex-col shadow-2xl z-50 overflow-hidden transition-all duration-300">
    
    <!-- Header -->
    <div class="p-4 bg-zinc-800/50 flex justify-between items-center border-b border-zinc-700">
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
            <h3 class="text-white font-bold tracking-wide">Apex AI</h3>
        </div>
        <button onclick="toggleChat()" class="text-zinc-400 hover:text-white text-2xl leading-none">&times;</button>
    </div>
    
    <!-- Chat Box -->
    <div id="chat-box" class="flex-1 p-4 overflow-y-auto flex flex-col gap-3 text-sm">
        <div class="self-start bg-zinc-800 text-zinc-200 p-3 rounded-2xl rounded-tl-none max-w-[85%]">
            Hello! I am the Apex Syntax assistant. How can I help you today?
        </div>
    </div>
    
    <!-- Input Area -->
    <div class="p-3 bg-zinc-800/30 border-t border-zinc-800 flex gap-2">
        <input type="text" 
               id="user-input" 
               onkeydown="handleKeyPress(event)"
               placeholder="Ask anything..." 
               class="flex-1 bg-zinc-800 border border-zinc-700 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-sky-500 transition-colors">
        <button onclick="sendMessage()" 
                class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg font-semibold text-sm transition-colors">
            Send
        </button>
    </div>
</div>
<!-- ai end  -->

<?php include('includes/footer.php'); ?>