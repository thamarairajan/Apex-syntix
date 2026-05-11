<?php
// --- 1. THE BRAIN (Gemini Function) ---
function callGemini($userInput) {
    $apiKey = "AIz-qVmsivEFNLpgr01o"; 
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

    // We add a "System Instruction" here to give your AI its name!
    $data = [
        "contents" => [[
            "parts" => [["text" => "You are the Apex Syntax AI. Help the user with logic and code. User says: " . $userInput]]
        ]]
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        $err = json_decode($response, true);
        return "Error: " . ($err['error']['message'] ?? 'API Connection Failed');
    }

    $result = json_decode($response, true);
    return $result['candidates'][0]['content']['parts'][0]['text'] ?? "I'm not sure how to answer that.";
}

// --- 2. THE HANDLER (Communication) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // This looks for standard POST data sent by your JavaScript
    $question = $_POST['message'] ?? null;

    if ($question) {
        $aiResponse = callGemini($question);
        // Send back JUST the text so it displays nicely in your chat box
        echo $aiResponse;
    } else {
        echo "Please enter a message.";
    }
    exit;
}
?>

<!-- --- 3. THE FRONTEND SCRIPT --- -->
<script>
async function sendMessage() {
    const input = document.getElementById('user-input');
    const chatBox = document.getElementById('chat-box');
    const userMessage = input.value.trim();

    if (!userMessage) return;

    // Show User Message
    chatBox.innerHTML += `<div class="message user"><b>You:</b> ${userMessage}</div>`;
    input.value = '';
    chatBox.scrollTop = chatBox.scrollHeight;

    try {
        // We use FormData to match the PHP $_POST expectation
        const formData = new FormData();
        formData.append('message', userMessage);

        const response = await fetch('api.php', {
            method: 'POST',
            body: formData // This sends it as a standard POST request
        });
        
        const data = await response.text();
        
        // Show AI Response
        chatBox.innerHTML += `<div class="message bot"><b>Apex AI:</b> ${data}</div>`;
        chatBox.scrollTop = chatBox.scrollHeight;
    } catch (error) {
        chatBox.innerHTML += `<div class="message bot">Error: Could not connect to server.</div>`;
    }
}
</script>