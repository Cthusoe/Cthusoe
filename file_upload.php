<?php
// connect to the database
require "access_db.php";

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf','mp4','jpg', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 9000000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            try{
                $pdo->beginTransaction();
                $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";

                $stmt = $pdo->query($sql);
                $pdo->commit();
                echo "File uploaded successfully";
                }


           catch(PDOException $Exception){
            die("エラー：".$Exception->getMessage());
          }



        } else {
            echo "Failed to upload file.";
        }
    }
}
?>