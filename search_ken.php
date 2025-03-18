<div>

<ul>
                      <li class="active"> <a href="index.html">ホーム  </a> </li>
                      <li> <a href="map.php">マップで学校探す </a> </li>
                      <li> <a href="renshulayout.php">全学校</a> </li>
                      <li> <a href="reg.php"target="_blank" rel="noopener noreferrer">学校登録一覧</a> </li>
                      <li> <a href="file_input.php"target="_blank" rel="noopener noreferrer">日本語の本を共有</a> </li>
                      <li> <a href="TEST/index.php"target="_blank" rel="noopener noreferrer">日本語テスト</a> </li>
                      <li> <a href="file_download.php"target="_blank" rel="noopener noreferrer">日本語を学ぶ</a> </li>
                      
                     </ul>
</div>



<div  >

     

    <div class="text-bg">
                    <center>  <h1><strong class="yellow">キーワードで探す</h1></center>
                     
                    </div>
          
  
      
<form name="SearchForm" method="POST">
<p>


<center><input type= "text"  name="sub_code" ></center>



<center><input  class="a_button" type="submit" name="search" value="search"></center>
</p>
</form>
<?php
require "access_db.php";
if(isset($_POST['search'])){
    $unum= $_POST['sub_code'];
    try{
        $pdo = new PDO($dsn,$db_user,$db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        
        } catch(PDOException $Exception){
        die("エラー:".$Exception->getMessage());
    }
    try{
        $sql = "SELECT * FROM language_school_info where region_name like '%$unum%' or name like '%$unum%'or addr like '%$unum%'";
        $stmt = $pdo->query($sql);
        $count = $stmt->rowCount();
        echo "学校数:".$count."件<br>".PHP_EOL;
        } catch(PDOException $Exception){
        die("エラー:".$Exception->getMessage());
    }

}else{
    $count=0;
}

?>

<table border="10" class="table">
     
    

     
           
    <th scope="col"> 学校名</th>
    <th  scope="col">住所</th>
    <th scope="col">電話番号</th>
    <th scope="col">学校の</th>
    <th scope="col">地域</th>
 
     
     
     
     <?php
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
<td><?php echo'<a href='.$row['web_link'].' target="blank" rel="noopener noreferrer">'. $row['name'].'</a>' ?><br><?php echo $row['name_eng']; ?>

</td>

<td><?php echo $row['addr']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td><?php echo'<a href='.$row['link'].' target="blank" rel="noopener noreferrer">'."FACEBOOK".'</a>' ?></td>

</td>
<td><?php echo $row['region_name']; ?></td>




</tr>

<?php

}
?>
    
     
    

   
      
   
    

  

</table>





</div>


