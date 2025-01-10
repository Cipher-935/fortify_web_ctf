<?php

if($_SERVER['REQUEST_METHOD'] == "GET"){


    if(isset($_GET['val'])){
        
        $req = $_GET['val'];
        if($req == "login"){
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

    }
}
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "No post yet";
}


?>