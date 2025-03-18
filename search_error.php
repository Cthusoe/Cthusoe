
<?php include"header.php" ?>


<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-2 col-lg-5 col-md-2 col-sm-2 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.html">日本語学校バング</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
              <div class="header_information">
               <div class="menu-area">
                <div class="limit-box">
                <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="index.html">ホーム  </a> </li>
                      <li> <a href="map.php">マープで学校探す </a> </li>
                      <li> <a href="renshulayout.php">全学校</a> </li>
                      <li> <a href="reg.php">学校登録一覧</a> </li>
                      <li> <a href="file_input.php">日本語の本を共有</a> </li>
                      <li> <a href="TEST/index.php">日本語テスト</a> </li>
                      <li> <a href="file_download.php">日本語を学ぶ</a> </li>
                     </ul>
                   </nav>
                 </div>
               </div> 
               <div class="mean-last">
                       <a href="renshulayout.php"><img src="images/search_icon.png" alt="#" /></a> <a href="login.php">login/sing up</a></div>              
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->

     <!-- end header -->
     <section class="slider_section">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">


                    <div class="text-bg">
                      <h1>日本語学校 <strong class="yellow">バンッグ</strong></h1>
                      <p>HELP YOURSELF BY HELPING OTHERS</p>
                      <a href="#">マープで見たい</a> <a href="#">地域から探す</a>
                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="images_box">
                      <figure><img src="images/header.png"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption">

                <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="text-bg">
                      <h1>LEARN WITH <strong class="yellow">CTHUPSYCHE</strong></h1>
                      <p>HELP YOURSELF BY HELPING OTHERS</p>
                      <a href="#">Read more</a><a href="#">get a qoute</a>
                    </div>
                  </div>

                  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="images_box">
                      <figure><img src="images/header.png"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="carousel-item">

            <div class="container-fluid padding_dd">
              <div class="carousel-caption ">
                <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="text-bg">
                      <h1>LEARN WITH <strong class="yellow">CTHUPSYCHE</strong></h1>
                      <p>HELP YOURSELF BY HELPING OTHERS</p>
                      <a href="#">Read more</a> <a href="#">get a qoute</a>
                    </div>
                  </div>
                  <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
                    <div class="images_box">
                      <figure><img src="images/header.png"></figure>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</section>
</div>
</header>









<!-- our -->
<div id="important" class="important">
  

<?php
require "access_db.php";




$message = "学校の数は";


  

   try{
     $sql = "SELECT * FROM language_school_info ";
     $stmt = $pdo->query($sql);
     $count = $stmt->rowCount();
    
     } catch(PDOException $Exception){
     die("エラー:".$Exception->getMessage());}
     
       ?>
     
     
    
    <div>


    <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                    <div class="text-bg">
                      <h1><?php echo "$message".$count."<br>".PHP_EOL;?> <strong class="yellow">件です</strong></h1>
                      <p>HELP YOURSELF BY HELPING OTHERS</p>
                      <a href="map.php">マープで見たい</a><a href="search.php">地域で探す</a>
                    </div>
        
    
    </div>
   
     <table border="10" class="table">
     <thead  class="table-dark">
    <tr>

     
           
         <th scope="col"> 学校名</th>
         
         <th  scope="col">住所</th>
         <th scope="col">電話番号</th>
         
         <th scope="col">学校の</th>
         <th scope="col">地域</th>
       
         
         
         
         
         
         </tr>
     </thead>
     
     
     <?php
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
<tr>
<td><?php echo'<a href='.$row['web_link'].'>'. $row['name'].'</a>' ?><br><?php echo $row['name_eng']; ?>

</td>

<td><?php echo $row['addr']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td><?php echo'<a href='.$row['link'].'>'."FACEBOOK".'</a>' ?></td>
<td><?php echo $row['region_name']; ?></td>




</tr>

<?php

}
?>
    
     
    

     
     </tr> 
      </thead>
    </tbody>
    

  

</table>






<!-- end our -->
<!-- Courses -->
<div id="courses" class="Courses">
 
<form name="SearchForm" method="POST">
<p>

<td><select name="sub_code"  required  >
<option  value="pick">REGION NAME<br>地域を選ぶ</option>
<?php
require "access_db.php";
$sql = "SELECT DISTINCT region_name FROM language_school_info";
 $stmt = $pdo->query($sql);
 $count = $stmt->rowCount();
 
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
echo "<option value='". $row['region_name']."'>" .$row['region_name']."</option>" ;
}
?>
</select>  </td>




<input  class="a_button" type="submit" name="search" value="search">
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
        echo "接続しました<br>".PHP_EOL;
        } catch(PDOException $Exception){
        die("エラー:".$Exception->getMessage());
    }
    try{
        $sql = "SELECT * FROM language_school_info WHERE region_name='$unum'";
        $stmt = $pdo->query($sql);
        $count = $stmt->rowCount();
        echo "データ件数:".$count."件<br>".PHP_EOL;
        } catch(PDOException $Exception){
        die("エラー:".$Exception->getMessage());
    }

}else{
    $count=0;
}

?>

<table class="table">

      <thead  class="table-dark">
         <tr>
     
         
         <th scope="col"> 学校名</th>
         
         <th  scope="col">住所</th>
         <th scope="col">電話番号</th>
         
         <th scope="col">学校の</th>
         <th scope="col">地域</th>
       
         
         
         
         
         </tr>
     </thead>
     
     
     <?php
     while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
       ?>
     
  
<td><?php echo'<a href='.$row['web_link'].'>'. $row['name'].'</a>' ?><br><?php echo $row['name_eng']; ?>

</td>

<td><?php echo $row['addr']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td><?php echo'<a href='.$row['link'].'>'."FACEBOOK".'</a>' ?></td>
<td><?php echo $row['region_name']; ?></td>
     
     
    
<?php
     }  
     
  

  ?>


</table>









  </div>
</div>
<!-- end Courses -->

<!-- learn -->




<!-- contact -->
<div id="contact" class="contact">
  <div class="container-fluid padding_left2">
    <div class="white_color">
      <div class="row">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div id="map">
          </div>

        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

          <form class="contact_bg">
            <div class="row">
              <div class="col-md-12">
                <div class="titlepage">
                  <h2>Contact <strong class="yellow">us</strong></h2>
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Name" type="text" name="Your Name">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Email" type="text" name="Your Email">
                </div>
                <div class="col-md-12">
                  <input class="contactus" placeholder="Your Phone" type="text" name="Your Phone">
                </div>
                <div class="col-md-12">
                  <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <button class="send">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

    <!-- end contact -->

 <?php include"footer.php"?>
          <!-- Javascript files-->
          <script src="js/jquery.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.0.0.min.js"></script>
          <script src="js/plugin.js"></script>
          <!-- sidebar -->
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
          <script src="js/custom.js"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


          <script>
// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {
      lat:37.92330027196903,
      lng:  139.06233488538285
    },
  });

  var image = 'JP_LANG_SCH_INFO/images/maps-and-flags.png';
  var beachMarker = new google.maps.Marker({
    position: {
      lat: 37.92330027196903,
      lng:  139.06233488538285
    },
    map: map,
    icon: image
  });
}
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->



</body>

</html>


