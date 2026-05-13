
// function handleLike(blogId) {
//     // Basic check for login - if not logged in, redirect
//     <?php if(!isset($_SESSION['logged_in'])): ?>
//         window.location.href = 'login.php';
//         return;
//     <?php endif; ?>

//     fetch('api_like.php?id=' + blogId)
//         .then(response => response.json())
//         .then(data => {
//             if(data.success) {
//                 const btn = document.getElementById('like-btn');
//                 const count = document.getElementById('like-count');
                
//                 count.innerText = data.new_count;
//                 btn.classList.toggle('bg-cyan-500');
//                 btn.classList.toggle('text-black');
//                 btn.classList.toggle('text-gray-400');
//             }
//         });
// }
