<?php
require_once "functions.php";
checkMessagesTime();
if(isset($_POST['username']) and USERS_CAN_REMOVE_ALL_CHAT) {
    $username = str_replace("\"", "", $_POST['username']);
    $username = str_replace("'", "", $username);
    $users = json_decode(trim(file_get_contents("usernames.json")), true);
    if(in_array($username, $users)) {
        file_put_contents("messages.json", json_encode([]));
    }
    response([]);
}