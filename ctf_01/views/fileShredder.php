<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/css/admin_dashboard.css">
    <title>Upload</title>
</head>
<body>
    <div class="navbar">
        <a href="./admin_dashboard.php">Home</a>
        <a href="./fileShredder.php">Upload</a>
        <!-- <a href="#">Server Status</a>
        <a href="#">Logout</a> -->
    </div>
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
            echo "<div style='text-align:center; color:white; background-color:black;'>
                    <h2 style='background-color:red;'>Dolly loved that one, see it here:</h2>
                    <p><a href='$uploadFile' style='color:white;'>" . htmlspecialchars($_FILES['file']['name']) . "</a></p>
                    <br><br>
                    <form action='' method='post'>
                        <button type='submit' style='background-color:red; color:white; padding:10px; border:none; border-radius:5px;'>Feed Dolly More</button>
                    </form>
                </div>";
        } else {
            echo "<p style='color:red;'>Failed to upload file.</p>";
        }
    } else {
    ?>
    <div class="image-container">
        <form action="" method="post" id="fileSub" enctype="multipart/form-data">
            <input type="file" id="fileInput" name="file">
        </form>
    </div>
    <script>
        $("#fileInput").change(munch);
        let sheepEatingAudio = new Audio('nomnom.mp3');

        function munch() {
            $("#dolly").attr("src", "sheep2.jpg");
            sheepEatingAudio.play();
            setTimeout(cleanup, 2000);
        }

        function cleanup() {
            $("#fileSub").submit();
            $("#dolly").attr("src", "Sheep1.jpg");
            $("input[type='file']").val(null);
        }
    </script>
    <?php
    }
    ?>
</body>
</html>
