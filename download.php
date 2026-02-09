<?php

$public_link = "https://disk.yandex.ru/d/sC1sYZYr4qK5YQ";

$api = "https://cloud-api.yandex.net/v1/disk/public/resources/download?public_key=" . urlencode($public_link);

$response = file_get_contents($api);

if ($response === FALSE) {
    die("Ошибка скачивания");
}

$data = json_decode($response, true);

if (!isset($data['href'])) {
    die("Ошибка скачивания");
}

header("Location: " . $data['href']);
exit;

?>
