<?php 

$conn = mysqli_connect("localhost", "os_jmistry", "os_jmistry136", "PROJECT_os_jmistry");
if(!$conn){

    echo "Database connection failure";
}
else{
    function login_user($e, $user_p){
        global $conn;
        $dql = "SELECT username, pass FROM forum_users where email = '$e'";
        $result = mysqli_query($conn, $dql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $user_nn = $row['username'];
            $pass = $row['password'];
            if(password_verify($user_p,$pass)){
             $_SESSION['curr_user'] = $user_nn;
             $_SESSION['curr_id'] = $id;
                return "You have logged in";
            }
            else{
                 return "Wrong credentials";
            }
        }
        else{
              return "No user found with this id";
        }
}
}


?>