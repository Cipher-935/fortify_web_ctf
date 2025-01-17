<?php
// Directory where files will be uploaded
$uploadDirectory = "uploads/";

// Check if the upload directory exists; if not, create it
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadFile = $uploadDirectory . basename($_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "<body style = 'background-color:black;'><h2 style = 'background-color: red; color: white;'>Dolly loved that one, see it here: 
        <a href='$uploadFile'>" . htmlspecialchars($_FILES['file']['name']) . "</h2></p><br><br><form action = 'fileShredder.html' method = 'post'><button type = 'submit'>Feed Dolly More</button></form></body>";
    } else {
        echo "Failed to upload file.";
    }
}
?>