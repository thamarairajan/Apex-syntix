<?php
require_once 'config/db_config.php'; 
include('includes/header.php'); 

$apiKey = $_ENV['YOUTUBE_API_KEY'];
$channelId = $_ENV['YOUTUBE_CHANNEL_ID'];

// 1. Capture the page token from the URL (if it exists)
$pageToken = isset($_GET['page']) ? $_GET['page'] : '';
$pageSize = 6; // Set to 6 or 9 for a clean grid

// 2. Build the API URL with the pageToken parameter
$apiUrl = "https://www.googleapis.com/youtube/v3/search?key={$apiKey}&channelId={$channelId}&part=snippet,id&order=date&maxResults={$pageSize}&type=video";

if ($pageToken) {
    $apiUrl .= "&pageToken=" . $pageToken;
}

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// 3. Store the tokens for the buttons
$nextPageToken = isset($data['nextPageToken']) ? $data['nextPageToken'] : null;
$prevPageToken = isset($data['prevPageToken']) ? $data['prevPageToken'] : null;
?>

<!-- 1. Navigation & Breadcrumb -->
<nav class="bg-gray-900 border-b border-gray-800 px-6 py-4">
    <div class="max-w-7xl mx-auto">
        <a href="index.php" class="text-blue-400 hover:text-blue-300 transition flex items-center gap-2">
            <span>←</span> Back
        </a>
    </div>
</nav>

<!-- 2. Main Content Wrapper -->
<main class="min-h-screen bg-gray-900 py-12 px-6">
    <div class="max-w-7xl mx-auto">
        
        <!-- Header Section -->
        <header class="mb-12">
            <h1 class="text-4xl font-extrabold text-white mb-4">ObsidianApexPrime Tutorials</h1>
            <p class="text-gray-400 text-lg max-w-2xl">Deep dives into Full Stack development, logic building, and technical insights.</p>
        </header>

        <!-- 3. Video Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(!empty($data['items'])): ?>
                <?php foreach($data['items'] as $video): 
                    $videoId = $video['id']['videoId'];
                    $title = $video['snippet']['title'];
                    $thumb = $video['snippet']['thumbnails']['high']['url'];
                ?>
                    <!-- Video Card -->
                    <div class="group bg-gray-800 rounded-xl overflow-hidden border border-gray-700 hover:border-blue-500/50 transition-all duration-300 shadow-lg hover:shadow-blue-500/10">
                        
                        <!-- Thumbnail Wrapper -->
                        <a href="https://www.youtube.com/watch?v=<?php echo $videoId; ?>" target="_blank" rel="noopener" class="block relative aspect-video overflow-hidden">
                            <img src="<?php echo $thumb; ?>" alt="<?php echo $title; ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/0 transition-colors"></div>
                        </a>

                        <!-- Content -->
                        <div class="p-5">
                            <h3 class="text-white font-bold text-lg leading-tight line-clamp-2 h-14 mb-4">
                                <?php echo $title; ?>
                            </h3>
                            
                            <div class="flex items-center justify-between">
                                <a href="https://www.youtube.com/watch?v=<?php echo $videoId; ?>" 
                                   target="_blank" 
                                   rel="noopener" 
                                   class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-lg transition">
                                   Watch Now
                                </a>
                                <span class="text-gray-500 text-xs uppercase tracking-widest font-bold">YouTube</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-20 border-2 border-dashed border-gray-700 rounded-2xl">
                    <p class="text-gray-400">No videos found. Check your API credentials.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- page  -->
     <div class="mt-12 flex justify-center items-center gap-4">
    
    <?php if ($prevPageToken): ?>
        <a href="tutorials.php?page=<?php echo $prevPageToken; ?>" 
           class="px-6 py-2 bg-gray-800 border border-gray-700 text-white rounded-lg hover:bg-gray-700 transition">
           ← Previous
        </a>
    <?php else: ?>
        <span class="px-6 py-2 bg-gray-800/50 text-gray-600 rounded-lg cursor-not-allowed">← Previous</span>
    <?php endif; ?>

    <span class="text-gray-400 text-sm">More Tutorials</span>

    <?php if ($nextPageToken): ?>
        <a href="tutorials.php?page=<?php echo $nextPageToken; ?>" 
           class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition shadow-lg shadow-blue-900/20">
           Next →
        </a>
    <?php else: ?>
        <span class="px-6 py-2 bg-gray-800/50 text-gray-600 rounded-lg cursor-not-allowed">Next →</span>
    <?php endif; ?>

</div>
</main>

<?php include('includes/footer.php'); ?>