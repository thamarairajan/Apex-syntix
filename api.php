<?php
function callGemini($userInput) {
    $apiKey = "AIzaSyCIUaH413y3HQU1ub23yxqnOqUzg12IsLw"; // Replace with your actual key
// Change this:
// $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . $apiKey;

// To this (Current Stable Version):
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;
    $data = ["contents" => [["parts" => [["text" => $userInput]]]]];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Keep this false for local testing

    $response = curl_exec($ch);
    
    // Check for cURL errors
    if (curl_errno($ch)) {
        return 'cURL Error: ' . curl_error($ch);
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $result = json_decode($response, true);

    // If Google returns an error (like 400 or 403), show it!
    if ($httpCode !== 200) {
        return "Google API Error ($httpCode): " . ($result['error']['message'] ?? 'Unknown Error');
    }

    return $result['candidates'][0]['content']['parts'][0]['text'] ?? "No text found in response.";
}

// Temporary test line
// --- Keep your callGemini function exactly as it is ---

// Replace the test line with this:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $userText = $input['message'] ?? '';

    if (!empty($userText)) {
        $aiResponse = callGemini($userText);
        echo json_encode(['response' => $aiResponse]);
    } else {
        echo json_encode(['response' => 'Please enter a message.']);
    }
    exit;
}

?>
