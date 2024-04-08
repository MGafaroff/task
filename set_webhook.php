<?php

// Telegram botunuzun token'ı
define('BOT_TOKEN', '6883963224:AAEm39gVoXsL4OGHj7SJvidzKKR2yJqU1Kw');

// Webhook URL'si
define('WEBHOOK_URL', ' ');

// Telegram API'ye istek gönderme fonksiyonu
function setWebhook($webhook_url) {
    $url = "https://api.telegram.org/bot" . BOT_TOKEN . "/setWebhook?url=" . urlencode($webhook_url);
    $response = file_get_contents($url);
    return $response;
}

// Webhook URL'sini ayarla
$response = setWebhook(WEBHOOK_URL);

// Cevabı ekrana yazdır
echo $response;

?>
