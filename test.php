<?php

$token = '6883963224:AAEm39gVoXsL4OGHj7SJvidzKKR2yJqU1Kw';

$data = array(
    'text' => 'message test 123',
    'chat_id' => '-4187696396'
);

$url = "https://api.telegram.org/bot{$token}/sendMessage?" . http_build_query($data);

$response = file_get_contents($url);

if ($response === false) {
    echo "HTTP isteği başarısız oldu.";
} else {
    echo "Mesaj gönderildi!";
}
?>
