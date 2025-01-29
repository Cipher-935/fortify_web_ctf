<?php

$uploadDirectory = "images/";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadFile = $uploadDirectory . basename($_FILES['file']['name']);
    
    // Check if file exists
    if (file_exists($uploadFile)) {
        echo "<h1>This file already exists on the server</h1>";
    }
    else{

	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        chmod($uploadFile, 0644); // Set permissions
        
        echo "<body style='background-color:black;'>
                <h2 style='background-color: red; color: white;'>
                    File was uploaded successfully and can be found at: 
                    <a href='$uploadFile'>" . htmlspecialchars($_FILES['file']['name']) . "</a>
                </h2>
                <br><br>
                <form action='fileShredder.html' method='post'>
                    <button type='submit'>Upload more files</button>
                </form>
              </body>";
    } else {
        echo "Failed to upload file.";
    }

    }
    
}
?>