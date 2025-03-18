

  
<?php
// Database Connection 
require "access_db.php";
//Check for connection error


if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    $pdo->beginTransaction();
      // fetch file to download from database
$sql = "SELECT * FROM files WHERE id=$id";
$result =  $pdo->query($sql);
$file =($result->fetch(PDO::FETCH_ASSOC));
    $filepath = 'uploads/' . $file['name'];
    //$pdf =$row['id'];
    
        
}
?>
<br/><br/>
<iframe src="<?php echo $filepath; ?>" width="90%" height="500px">
</iframe>

    



    