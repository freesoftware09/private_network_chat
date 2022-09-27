<?php
require_once 'config.php';
//document.write('Loading...');
function response($data) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}

function checkMessagesTime() {
    $time = filectime("messages.json");
    $now = time();
    $diff = $now - $time;
    if($diff > 0) {
        $diff = ceil($diff / 60);
        if($diff >= MESSAGES_FILE_TIME_MINUTES) {
            unlink("messages.json");
            $fp = fopen("messages.json", "w");
            fwrite($fp, json_encode([]));
            fclose($fp);
        }
    }
}