<?php
require('../model/event_model.php');
if ($_SERVER['REQUEST_METHOD'] == "GET") {


    if (isset($_GET['val'])) {

        $req = $_GET['val'];
        if ($req == "bG9naW4gcGVyaGFwcz8/Pw==") {
            require("../views/papaertf.php"); // Login.php
            exit();
        } else if ($req == 'home') {
            require("../views/homepage.php");
            exit();
        } else if ($req == 'YWRtaW4/Pz8=') {
            require("../views/lalaefc.php");   // Admin Panel
            exit();
        } else if ($req == 'bWVzc2FnZXMgcHJvYmFibHk=') {
            require("../views/mboard.php");
            exit();
        } else if ($req == 'eajmpu') {
            require("../views/fileShredder.html");
            exit();
        } else if ($req == 'logo') {
            require("../views/images/forum_logo.jpg");
            exit();
        }

    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $j_data = file_get_contents("php://input");
    $r_data = json_decode($j_data, true);
    $command = $r_data['command'];
    if ($command == "login") {
        $log_user = login_user($r_data['e_id'], $r_data['user_pass']);
        echo $log_user;
        exit();

    } else if ($command == 'broadcast') {
        $res = save_message($r_data['msg']);
        echo $res;
    } else if ($command == 'get_mess') {
        $all_mess = get_messages();
        if (empty($all_mess)) {
            echo json_encode("No messages found yet");
        } else {
            echo json_encode($all_mess);
        }
    }
    else {
        echo 'Bad Request';
    }
}


?>