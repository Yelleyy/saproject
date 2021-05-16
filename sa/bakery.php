<?php 
    session_start();
    if (!isset($_SESSION['email'])) {
      echo "<script type='text/javascript'>";
      echo "alert('กรุณาเข้าสู่ระบบ');"; 
      echo "window.location = 'login.php'; ";
      echo "</script>";
    }
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['email']);
      header('location: login.php');
    }
    include("tool.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé Coffee</title> 
</head>
<body>
    
<div class="container">
      <div class="row align-items-start">         
          <div class="col-8"><img src="img/datafe.png" width="700"; height="250"; ></div>
          <div class="col"><img src="img/logo.png" width="300"; height="250"; ></div>
      </div>
  </div>   
    <div class="container">
        <!--  notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="success">
                <h3>
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
    </div>
<?php   
  include("server.php");
  $sql = "select * from stock where type='cake' order by id";
  $result = mysqli_query($conn, $sql);
    echo '<div class="album py-5 " style="background-color: FCD647 ;">';
    echo '    <div class="container">';
    echo '      <div style="background-color: FFECB5 ;" > ';
    echo '       <h1 align ="center" class="display-5" style="color: brown;"> Bakery </h1>';
    echo '        </div>';
                  
    echo '        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

    while($row = mysqli_fetch_array($result))
    {
    echo '          <div class="col">';
    echo '            <div class="card shadow align-items-center">';
             echo " <img src='img/" . $row["pic"] ." '  width='300'height='300'>"; 

             echo '             <div class="card-body">';
             echo '              <p class="card-text fw-bold">'.$row["detail"] .'  </p>';
             echo '   <div class="d-flex justify-content-between col align-items-center">';
             echo '       <div class="btn-group">';
             echo '               <form action="check.php" method="post">
                            <div class="btn-group">';
              echo "              <button type='submit' class='btn btn-outline-danger'name='id' value=$row[id]>สั่งซื้อ</button>
                            </div>
                          </form>";
             echo '       </div>';                
             echo '           <small class="text fw-bold">'.$row["price"].' บาท</small>';
             echo '   </div>';
             echo ' </div>';
             echo ' </div>';
             echo ' </div>';
}
    
?>
</div>
    </div> 
     </div>
  </div> 
  </div>
</body>
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted fw-bold">Copyright © 2021 - <a href="index.php" style="color: black;">DataFé</a> by Yelley <br>Phone : 099-989-0909 <br>Location : 91/9 บ้าน E404 วงศ์สว่างซอย 7 ถนนวงศ์สว่าง แขวงบางซื่อ เขตบางซื่อ กรุงเทพมหานคร 10800 </span>
    </div>
  </footer>
</html>

