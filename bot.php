<?php

// Telegram botunuzun token'ı
define('BOT_TOKEN', '6883963224:AAEm39gVoXsL4OGHj7SJvidzKKR2yJqU1Kw');

// Telegram API'ye istek gönderme işlevi
function sendMessage($chatId, $message) {
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message);
    file_get_contents($url);
}

// Gelen mesajları işleme fonksiyonu
function processMessage($message) {
    $chatId = $message['chat']['id'];
    $text = $message['text'];

    // Gelen mesaja göre yanıt oluşturma
    if ($text === '/start') {
        sendMessage($chatId, 'Merhaba, botunuzla etkileşime başladığınız için teşekkürler!');
    } else {
        sendMessage($chatId, 'Anlayamadım, lütfen geçerli bir komut girin.');
    }

    // Loglama
    error_log("Message processed: " . $text);
}

// Gelen webhook isteğini işleme
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (isset($update["message"])) {
    processMessage($update["message"]);
}

// Webhook isteğinin işlendiğini loglama
error_log("Webhook request processed");

?>
