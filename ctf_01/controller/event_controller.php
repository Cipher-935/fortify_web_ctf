<?php

if($_SERVER['REQUEST_METHOD'] == "GET"){

    // Val parameter passed in the get request will be used to access different web pages
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
// All post request handling should be done in this block
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "No post yet";
}


?>
