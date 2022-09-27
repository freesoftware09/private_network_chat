<?php
require_once "functions.php";
checkMessagesTime();
if(isset($_POST['username']) and isset($_POST["message"])) {
    $message = addslashes($_POST["message"]);
    $username = str_replace("\"", "", $_POST['username']);
    $username = str_replace("'", "", $username);
    $users = json_decode(trim(file_get_contents("usernames.json")), true);
    if(in_array($username, $users)) {
        $message = [
            "author" => [
                "firstName" => $username,
                "id" => $username,
                "lastName" => ""
            ],
            "createdAt" => time(),
            "id" => (string) time(),
            "status" => "seen",
            "text" => $message,
            "type" => "text"
        ];
        $messages = json_decode(trim(file_get_contents("messages.json")), true);
        $messages[] = $message;
        file_put_contents("messages.json", json_encode($messages));
        response(array_reverse($messages));
    }
}