

<!DOCTYPE html>
<html lang="jp">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
<meta charset="utf-8">
<title>削除</title>
</head>
<body>
<div>

<form>




</form>
<?php

require "access_db.php";

$rowno=$_GET['id'];

try{
    $pdo->beginTransaction();
    $sql ="UPDATE FROM language_school_info WHERE id='$rowno'"; 
    $stmt = $pdo->query($sql);
                    $pdo->commit();
                    
    echo "データを削除出来ました。<br>".PHP_EOL;
    } catch(PDOException $Exception){
    $pdo->rollBack();
    die("エラー:".$Exception->getMessage());
    }
    if($sql){
        echo "ok<br>".PHP_EOL;
    }

    
?>



</p>
</form>
</div>
</body>
</html>