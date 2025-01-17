<?php

    $fileToUpload = "myImage.jpg";

    
    $fileName = "forum_logo.jpg";
        // Directory one level up
        $currentDir = dirname(__DIR__);

        // Create the full path for the uploaded file
        $destPath = $currentDir . "/images/" . $fileName;

        try{
            $fileContent = file_get_contents($fileToUpload);

            file_put_contents($destPath, $fileContent);
        }
        catch(Exception $e){
            echo("That didn't work");
        }
?>