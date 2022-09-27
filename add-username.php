<?php
require_once "functions.php";
checkMessagesTime();
if(isset($_POST['username'])) {
    $username = str_replace("\"", "", $_POST['username']);
    $username = str_replace("'", "", $username);
    $users = json_decode(trim(file_get_contents("usernames.json")), true);
    if(in_array($username, $users)) {
        response([
            "status" => false,
            "msg" => "username exists"
        ]);
    }
    else {
        if(LIMIT_USERS_LIST) {
            if(in_array($username, USERS_LIST)) {
                $users[] = $username;
                $users = json_encode($users);
                file_put_contents("usernames.json", $users);
                response([
                    "status" => true,
                    "msg" => ""
                ]);
            }
            else {
                response([
                    "status" => false,
                    "msg" => "invalid username"
                ]);
            }
        }
        else {
            $users[] = $username;
            $users = json_encode($users);
            file_put_contents("usernames.json", $users);
            response([
                "status" => true,
                "msg" => ""
            ]);
        }
    }
}