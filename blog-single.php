<?php
include 'config/db_config.php';

$blog_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$query = "SELECT * FROM blogs WHERE id = $blog_id LIMIT 1";
$result = mysqli_query($conn, $query);
$blog = mysqli_fetch_assoc($result);

if (!$blog) {
    header("Location: index.php");
    exit();
}

$date = date("F d, Y", strtotime($blog['created_at']));

// DEFINING PAGE DATA FOR HEADER
$pageTitle = htmlspecialchars($blog['title']) . " | Syntix Blog";
$pageDesc = substr(strip_tags($blog['content']), 0, 160); // First 160 chars for SEO
$pageImg = $blog['image_url'];

include('includes/header.php'); // Now we include the header
?>
    <!-- Simple Nav -->
<nav class="bg-gray-900 border-b border-gray-800 px-6 py-4">
    <div class="max-w-7xl mx-auto">
        <a href="index.php" class="text-blue-400 hover:text-blue-300 transition flex items-center gap-2">
            <span>←</span> Back
        </a>
    </div>
</nav>

    <!-- Main Content -->
<!-- Main Content Wrapper -->
<main class="max-w-7xl mx-auto px-6 py-12">
    <!-- Hero Header: Unique centered design for social sharing -->
    <header class="max-w-4xl mx-auto text-center mb-16">
        <div class="flex justify-center items-center gap-3 mb-6">
            <span class="bg-blue-600/10 text-blue-400 text-xs font-bold px-3 py-1 rounded-full border border-blue-500/20 uppercase tracking-widest">Tutorial</span>
            <span class="h-1 w-1 bg-gray-700 rounded-full"></span>
            <span class="text-gray-500 text-sm font-medium"><?php echo $date; ?></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-8 leading-tight tracking-tight">
            <?php echo htmlspecialchars($blog['title']); ?>
        </h1>
        <div class="flex items-center justify-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-tr from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">T</div>
            <span class="text-gray-300 font-medium">Thamarairajan</span>
        </div>
    </header>

    <!-- Main Grid: Content (Left) + Sidebar (Right) -->
    <div class="flex flex-col lg:flex-row gap-16">
        
        <!-- Left Side: Blog Content -->
        <div class="lg:w-2/3">
            <!-- Featured Image with Glassmorphism shadow -->
            <?php if (!empty($blog['image_url'])): ?>
            <div class="relative group rounded-3xl overflow-hidden mb-12 shadow-[0_20px_50px_rgba(8,_112,_184,_0.2)] border border-gray-800">
                <img src="<?php echo $blog['image_url']; ?>" alt="Featured" class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700">
            </div>
            <?php endif; ?>

            <!-- Body Text -->
            <div class="prose prose-invert prose-blue max-w-none">
                <div class="text-gray-300 text-lg leading-relaxed space-y-8 font-light">
                    <?php echo nl2br(htmlspecialchars($blog['content'])); ?>
                </div>
            </div>

        

            <!-- Interaction Bar: Like & Stats -->
            <div class="mt-12 flex items-center gap-6 border-y border-gray-800 py-6">
                <?php
                // Get Like Count
                $like_query = "SELECT COUNT(*) as total FROM blog_likes WHERE blog_id = $blog_id";
                $like_res = mysqli_query($conn, $like_query);
                $likes = mysqli_fetch_assoc($like_res)['total'];

                // Check if logged-in user liked it
                $user_liked = false;
                if (isset($_SESSION['user_id'])) {
                    $u_id = $_SESSION['user_id'];
                    $check_like = mysqli_query($conn, "SELECT * FROM blog_likes WHERE blog_id = $blog_id AND user_id = $u_id");
                    if (mysqli_num_rows($check_like) > 0) $user_liked = true;
                }
                ?>
                
                <button onclick="handleLike(<?php echo $blog_id; ?>)" id="like-btn" 
                        class="flex items-center gap-2 px-6 py-2 rounded-full border <?php echo $user_liked ? 'bg-cyan-500 border-cyan-500 text-black' : 'border-gray-700 text-gray-400 hover:border-cyan-500 hover:text-cyan-400'; ?> transition-all font-bold">
                    <i class="fas fa-thumbs-up"></i>
                    <span id="like-count"><?php echo $likes; ?></span> Likes
                </button>

                <div class="text-gray-500 text-sm italic">
                    <?php if($user_liked): ?>
                        <span class="text-cyan-400">You and others liked this insight.</span>
                    <?php else: ?>
                        Join the discussion by liking this post.
                    <?php endif; ?>
                </div>
            </div>

            <!-- Developer Discussion (Comments) -->
            <section class="mt-16">
                <h3 class="text-2xl font-bold text-white mb-8 flex items-center gap-3">
                    <i class="fas fa-comments text-cyan-500"></i> Developer Reviews
                </h3>

                <!-- Comment Form -->
                <?php if (isset($_SESSION['logged_in'])): ?>
                    <form action="process_comment.php" method="POST" class="mb-12 bg-gray-800/30 p-6 rounded-2xl border border-gray-800">
                        <input type="hidden" name="blog_id" value="<?php echo $blog_id; ?>">
                        <textarea name="comment" required placeholder="Add a technical review or ask a question..." 
                                  class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-white text-sm focus:outline-none focus:border-cyan-500 transition mb-4"></textarea>
                        <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white px-8 py-3 rounded-xl font-bold text-sm transition">
                            Post Review
                        </button>
                    </form>
                <?php else: ?>
                    <div class="bg-gray-800/20 border border-dashed border-gray-700 p-8 rounded-2xl text-center mb-12">
                        <p class="text-gray-400 mb-4 text-sm">You must be part of the community to participate in the discussion.</p>
                        <a href="login.php" class="text-cyan-400 font-bold hover:underline">Login to Post a Review →</a>
                    </div>
                <?php endif; ?>

                <!-- Display Comments -->
                <div class="space-y-6">
                    <?php
                    $comments = mysqli_query($conn, "SELECT * FROM blog_comments WHERE blog_id = $blog_id ORDER BY created_at DESC");
                    while ($c = mysqli_fetch_assoc($comments)): ?>
                        <div class="flex gap-4 p-6 bg-gray-800/10 border border-gray-800 rounded-2xl hover:bg-gray-800/30 transition">
                            <div class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center text-xs font-bold text-white">
                                <?php echo strtoupper(substr($c['user_name'], 0, 1)); ?>
                            </div>
                            <div>
                                <div class="flex items-center gap-3 mb-1">
                                    <span class="text-white font-bold text-sm"><?php echo htmlspecialchars($c['user_name']); ?></span>
                                    <span class="text-gray-600 text-xs"><?php echo date("M d, Y", strtotime($c['created_at'])); ?></span>
                                </div>
                                <p class="text-gray-400 text-sm leading-relaxed"><?php echo nl2br(htmlspecialchars($c['comment'])); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </section>


                <!-- Social Share Bar -->
            <div class="mt-16 py-8 border-t border-gray-800 flex flex-wrap items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <span class="text-xs font-bold text-gray-500 uppercase tracking-widest">Share knowledge:</span>
                    <div class="flex gap-3">
                      
                        <!-- // Twitter -->
                        <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode($blog['title']); ?>&url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" 
       target="_blank" class="w-10 h-10 flex items-center justify-center bg-gray-900 hover:bg-blue-400/20 hover:text-blue-400 border border-gray-800 rounded-xl transition-all" title="Share on X">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
    </a>
  <!-- LinkedIn -->
<a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" 
   target="_blank" 
   class="w-10 h-10 flex items-center justify-center bg-gray-900 hover:bg-blue-700/20 hover:text-blue-500 border border-gray-800 rounded-xl transition-all" 
   title="Share on LinkedIn">
    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
    </svg>
</a>
      <!-- //  WhatsApp -->
                    
                        <a href="https://api.whatsapp.com/send?text=<?php echo urlencode($blog['title'] . ' - https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); ?>" 
       target="_blank" class="w-10 h-10 flex items-center justify-center bg-gray-900 hover:bg-green-500/20 hover:text-green-500 border border-gray-800 rounded-xl transition-all" title="Share on WhatsApp">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.438 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.438-9.889 9.886-.001 2.15.636 4.143 1.739 5.913l-1.013 3.705 3.763-.989z"/></svg>
    </a>
                        <!-- Copy Link Button -->
<button onclick="copyToClipboard()" id="copy-btn" 
        class="relative w-10 h-10 flex items-center justify-center bg-gray-900 hover:bg-cyan-500/20 hover:text-cyan-400 border border-gray-800 rounded-xl transition-all" 
        title="Copy Link">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
        <path d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
    </svg>
    <!-- Tooltip for "Copied" message -->
    <span id="copy-tooltip" class="absolute -top-10 left-1/2 -translate-x-1/2 bg-cyan-600 text-white text-[10px] px-2 py-1 rounded opacity-0 transition-opacity">
        Copied!
    </span>
</button>
                    </div>
                </div>
            </div>



        </div>

        <!-- Right Side: Sticky Sidebar -->
        <aside class="lg:w-1/3">
            <div class="sticky top-28 space-y-8">
                
                <!-- YouTube Highlight Card -->
                <div class="relative overflow-hidden bg-gray-800 border border-gray-700 rounded-3xl p-8 group">
                    <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-600/10 rounded-full blur-2xl group-hover:bg-red-600/20 transition"></div>
                    <h4 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 bg-red-600 rounded-full animate-pulse"></span>
                        Watch & Learn
                    </h4>
                    <p class="text-gray-400 text-sm mb-6 leading-relaxed">I break down the technical architecture of this project on ObsidianApexPrime. Join our community of developers.</p>
                    <a href="https://youtube.com/@ObsidianApexPrime" target="_blank" class="flex items-center justify-center gap-2 w-full py-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-2xl transition shadow-lg shadow-red-600/20">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        Subscribe on YouTube
                    </a>
                </div>

                <!-- Newsletter / CTA Card -->
                <div class="bg-gradient-to-br from-blue-600 to-indigo-900 rounded-3xl p-8 shadow-xl">
                    <h4 class="text-white font-bold text-xl mb-2">Syntix UI Library</h4>
                    <p class="text-blue-100 text-sm mb-6">Stop building from scratch. Use my production-ready components.</p>
                    <a href="library.php" class="block w-full text-center bg-white text-blue-900 py-4 rounded-2xl font-black hover:bg-blue-50 transition">Get Started Free</a>
                </div>

            </div>
        </aside>

    </div>
</main>


<script>
function handleLike(blogId) {
    // Basic check for login - if not logged in, redirect
    <?php if(!isset($_SESSION['logged_in'])): ?>
        window.location.href = 'login.php';
        return;
    <?php endif; ?>

    fetch('api_like.php?id=' + blogId)
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                const btn = document.getElementById('like-btn');
                const count = document.getElementById('like-count');
                
                count.innerText = data.new_count;
                btn.classList.toggle('bg-cyan-500');
                btn.classList.toggle('text-black');
                btn.classList.toggle('text-gray-400');
            }
        });
}
btn.classList.toggle('border-cyan-500');
btn.classList.toggle('border-gray-700');

function copyToClipboard() {
    // Get the current URL
    const url = window.location.href;
    const tooltip = document.getElementById('copy-tooltip');

    // Use the Clipboard API
    navigator.clipboard.writeText(url).then(() => {
        // Show the "Copied!" tooltip
        tooltip.classList.remove('opacity-0');
        tooltip.classList.add('opacity-100');

        // Hide it again after 2 seconds
        setTimeout(() => {
            tooltip.classList.remove('opacity-100');
            tooltip.classList.add('opacity-0');
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}

</script>
    <!-- Footer -->
<?php include('includes/footer.php'); ?>
  