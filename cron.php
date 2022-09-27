<?php
require_once 'functions.php';
if(isset($_GET['passwd']) and $_GET['passwd'] != '') {
    if($_GET['passwd'] == CRON_JOB_PASS) {
        checkMessagesTime();
    }
}