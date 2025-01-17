<?php
require('../model/event_model.php');
if($_SERVER['REQUEST_METHOD'] == "GET"){


    if(isset($_GET['val'])){
        
        $req = $_GET['val'];
        if($req == "rdfxeshypoi"){
            require("../views/login.php");
            exit();
        }
        else if($req == 'signup'){
            require("../views/signup.php");
            exit();
        }
       else if($req == 'home'){
            require("../views/homepage.php");
            exit();
        }
        else if($req == 'rtyuvbgh4') {
            require("../views/admin_dashboard.php");
            exit();
        }
        else if($req == 'logout'){
            session_start();
            session_destroy();
            require("../views/homepage.php");
            exit();
        }

    }
}
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    $j_data = file_get_contents("php://input");
    $r_data = json_decode($j_data, true);
    $command = $r_data['command'];
    if($command == "login"){
        $log_user = login_user($r_data['e_id'], $r_data['user_pass']);
	echo $log_user;
        exit();
	
    }
    else if($command == "view"){
        $out = shell_exec("ls");
        echo $out;
    }
    else{
        echo 'bad';
    }
}


?>