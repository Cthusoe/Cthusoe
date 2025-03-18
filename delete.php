

<!DOCTYPE html>
<html lang="jp">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<title>削除</title>
</head>
<body>
    <div>
     <?php 
     require "access_db.php";



    
   




require "access_db.php";

$rowno=$_GET['id'];




try{
    $pdo->beginTransaction();
$sql ="SELECT * FROM language_school_info WHERE id='$rowno'";     
    $stmt = $pdo->query($sql);
                    $pdo->commit();
                    
    echo "データを削除出来ました。<br>".PHP_EOL;
    } catch(PDOException $Exception){
    $pdo->rollBack();
    die("エラー:".$Exception->getMessage());
    }
?>

    <div class="container mt-3">
    <table class="table">
      <thead  class="table-dark">
         <tr>
     
           
         <th scope="col"> ကျောင်းအမည်</th>
         <th scope="col">တာဝန်ခံအမည်</th>
         <th  scope="col">လိပ်စာ</th>
         <th scope="col">Facebook Address</th>
         <th scope="col">Phone Number</th>
         <th scope="col">Division</th>
         <th scope="col">city</th>
         <th scope="col">Edit</th>
         <th scope="col">DELETE</th>
         
         
         
         </tr>
     </thead>
     
     
     <?php
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
<td><?php echo $row['school_name']; ?></td>
<td><?php echo $row['teacher_name']; ?></td>
<td><?php echo $row['addr']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo'<a href='.$row['fb_link'].'>'."FACEBOOK".'</a>' ?></td>

<td><?php echo $row['region_name']; ?></td>
<td><?php echo $row['city_name']; ?></td>

<td><a href="edit.php?id=<?php echo $row['id']; ?>">EDIT</a></td>
<td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>

<?php

}
?>
    
     
    

     
     </tr> 
      </thead>
    </tbody>
    

  

</table>


    
    



<div><p>このデータを削除してもよろしいでしょうか</p>
<form name="SearchForm" method="POST">
<input  class="a_button" type="submit" name="<?php echo $rowno; ?>" value=" DELETE"></form>

<?php
require "access_db.php";

if(isset($_POST['DELETE'])){
   
try{
    $pdo->beginTransaction();
    $sql ="DELETE FROM language_school_info WHERE id='$rowno'"; +
    $stmt = $pdo->query($sql);
                    $pdo->commit();
                    
    echo "データを削除出来ました。<br>".PHP_EOL;
    } catch(PDOException $Exception){
    $pdo->rollBack();
    die("エラー:".$Exception->getMessage());
    }
}

    
?>



</div>

</div>

</body>
</html>