<?php 

$conn = mysqli_connect("localhost", "os_jmistry", "os_jmistry136", "PROJECT_os_jmistry");
if(!$conn){

    echo "Database connection failure";
}
else{
    function login_user($e, $user_p){
        global $conn;

        $patterns = '/\b(DROP|UPDATE|DELETE|INSERT|ALTER|TRUNCATE|CREATE|EXEC|MERGE)\b/i';
        if(preg_match($patterns, $e) === 1){
            return "This command is not permitted";
        }
        if(strpos($e, '@')){
            $e = "'" . addslashes($e) . "'";
        }
        $dql = "SELECT username, password FROM users where email = $e";
        $result = mysqli_query($conn, $dql);

        if (!$result) {
            // If the query fails, return or echo the error, more verbose output
            return "SQL Error: " . mysqli_error($conn);
        }
        if(mysqli_num_rows($result) > 0){
            $output = "";
            $h_pass = md5($user_p);
            while($row = mysqli_fetch_assoc($result)){
                if($h_pass === $row['password'] && $row['username'] === 'anthony'){
                   $output = "YWRtaW4/Pz8="; 
                   break;
                }
                else{
                    $output .= "Password for ". $row['username']. " is wrong" ."\n";
                }
            }
            return $output;
        }
        else{
            return "<h3>No user found with this email or password<h3>";
        }
    }


function save_message($msg_str) {
    global $conn;

    if (strpos($msg_str, 'https') !== false) {
        return "HTTPS requests to external sources not allowed";
    }

    // Modify the regular expression to capture the alert string
    $pattern = '/^<img src=".*?" onerror=alert\("([^"]*)"\)>$/';
    
    // Validate the message
    if (preg_match($pattern, $msg_str, $matches)) {
        // Replace spaces with underscores in the captured alert message
        $alert_msg = str_replace(' ', '_', $matches[1]);
        
        // Insert the message with the modified alert string
        $ins_sql = "INSERT INTO messages VALUES('<img src=\"\" onerror=alert(\"$alert_msg\")>')";
        $res = mysqli_query($conn, $ins_sql);
        
        if ($res) {
            return "bWVzc2FnZXMgcHJvYmFibHk=";
        } else {
            return mysqli_error($conn);
        }
    } else {
        // Reject the input if it doesn't match
        return "Backend blocks injections, can you find a way to bypass it!, [HINT: Unusaul tag]";
    }
}
 
function get_messages(){
        global $conn;
        $get_mess = "SELECT * from messages";
        $res =  mysqli_query($conn, $get_mess);
        $res_arr = [];
        $counter = 0;
        while($row = mysqli_fetch_assoc($res)){
            $res_arr[$counter] = $row['msg'];
            $counter += 1;
        }
            return $res_arr;
        }   
}

?>