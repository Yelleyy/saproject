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
    include("server.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé Coffee</title> 
</head>
<body>
<div>
<?php
    $email=$_SESSION['email'];
    $query = "SELECT * from user1 where email= '$email' " or die("Error:" . mysqli_error());
    $result = mysqli_query($conn, $query); ?>
  
   <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-69 fw-bold fs-5" > </p>
  <h3 class="display-6 fw-bold ">User information</h3> </p>

    <?php while($row = mysqli_fetch_array($result)) {?>

        <form action="profile_db.php" method="post">
    
        <p>ชื่อ</p><input class="form-control"  type="text" name ="newfname" value='<?php echo $row["fname"]; ?>'></p>
        <p>นามสกุล</p><input class="form-control" type="text" name="newlname" value='<?php echo $row["lname"];?>'></p>
        <p>Email</p> <fieldset disabled><input class="form-control" type="email" value='<?php echo $row["email"];?>'></fieldset></p>
        <p>Password</p> <input class="form-control"type="password"name="newpass" value='<?php echo $row["password"];?>'></p>
        <p>Phone</p> <input class="form-control" type="text" name="newphone" value='<?php echo $row["phone"];?>'></p>
        <p>Address</p><textarea class="form-control" name="newaddress"><?php echo $row["address"];?></textarea></p>
   <?php }
?>
</p>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> + แก้ไข </button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold fs-3"  align="center" id="exampleModalLabel">คุณแน่ใจที่จะแก้ไขข้อมูลหรือไม่?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" align="center">
      <div class="col p-lg mx-auto"><img src="img/warning.png" align="center" width="250"; height="200"; ></div>
      
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-danger col-md-4 p-lg mx-auto" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-success col-md-4 p-lg mx-auto" name="btnadd">ยืนยัน </button>
      </div>
    </div>
  </div>
</div>
</p>
</div>
</body>
<footer class="footer mt-auto py-3 bg-light">
   
      <span class="text-muted fw-bold">Copyright © 2021 - <a href="index.php" style="color: black;">DataFé</a> by Yelley <br>Phone : 099-989-0909<br> Location : 91/9 บ้าน E404 วงศ์สว่างซอย 7 ถนนวงศ์สว่าง แขวงบางซื่อ เขตบางซื่อ กรุงเทพมหานคร 10800 </span>
    
  </footer>
</html>
