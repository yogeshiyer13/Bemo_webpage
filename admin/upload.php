<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../styles/login%20style.css" />

<link rel="icon" href="../images/logo.png" />

<body>

    <div class="box">
        <h1>Upload Featured Pic</h1>
        <link rel="stylesheet" type="text/css" href="../styles/admin%20animation.css" />

        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload"  style="max-width:70%">
            <input type="submit" value="Upload Image" name="submit">
            <input type="button" value="Log Out" onclick="window.location.href='logout.php';"></form>
    </div>

    <?php
    session_start();
    if (isset($_SESSION['valid']) && $_SESSION['valid'] == true) {
    
    error_reporting(0);
    $target_dir = "../featured/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

   /* // Allow certain file formats
    if($imageFileType != "png") {
        echo "<br> Only .png files are allowed.";
        $uploadOk = 0;
    }*/
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<br> Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }
    else {
        header("Location: login.php");
}
?>

</body>

</html>