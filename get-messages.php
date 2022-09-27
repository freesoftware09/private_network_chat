<?php
require_once "functions.php";
checkMessagesTime();
if(isset($_POST['username'])) {
    $username = str_replace("\"", "", $_POST['username']);
    $username = str_replace("'", "", $username);
    $users = json_decode(trim(file_get_contents("usernames.json")), true);
    if(in_array($username, $users)) {
        $messages = json_decode(trim(file_get_contents("messages.json")), true);
        response(array_reverse($messages));
    }
    else {
        response([]);
    }
}