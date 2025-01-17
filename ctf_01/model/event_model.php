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

        $dql = "SELECT username, pass FROM users where email = $e";
        $result = mysqli_query($conn, $dql);

        if (!$result) {
            // If the query fails, return or echo the error, more verbose output
            return "SQL Error: " . mysqli_error($conn);
        }
        if(mysqli_num_rows($result) > 0){
            $output = "";
            while($row = mysqli_fetch_assoc($result)){
                if($user_p == $row['pass'] && ($row['username'] === 'anthony' || $e === "anthony_admin@cybersecclub.com")){
                   $output = "Admin_Panel can be found at val=rtyuvbgh4"; 
                   break;
                }
		else if($user_p == $row['pass']){
			$output = "Nice try but I am not the admin";
			break;
		}
                else{
                    $output .= "Password for " . $row['username'] . " is wrong" ."\n";
                }
            }
            // if($output != ''){
            //     $output .= "Flag: FTW{sOme_pRivacyplEase}";
            // }
            return $output;
        }
        else{
            return "<h3>No user found with this email or password<h3>";
        }
}
}

?>