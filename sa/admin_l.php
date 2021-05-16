<?php
  session_start();
    if (!isset($_SESSION['email'])) {
        echo "<script type='text/javascript'>";
        echo "alert('คุณไม่ใช่แอดมินนี่');"; 
        echo "window.location = 'index.php'; ";
        echo "</script>";
      
     
  }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }

   
  include('server.php');
  include('admintool.php');
  $query = "SELECT * FROM user1 ORDER BY id ASC" or die("Error:" . mysqli_error());
  $result = mysqli_query($conn, $query);
  echo '<div class="container">';
  echo '<h3 class="display-6 fw-bold ">User information</h3>';
  echo ' <table class="table table-hover">';
      echo "
        <tr>
        <td>No.</td>
        <td>ชื่อ</td>
        <td>นามสกุล</td>
        <td>Email</td>
        <td>Password</td>
        <td>Phone</td>
        <td>Address</td>
        <td></td>
        <td></td>                 
      </tr>";
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
      echo "<td>" .$row["id"] .  "</td> ";
      echo "<td>" .$row["fname"] .  "</td> ";
      echo "<td>" .$row["lname"] .  "</td> ";
      echo "<td>" .$row["email"] .  "</td> ";
      echo "<td>" .$row["password"] .  "</td> ";
      echo "<td>" .$row["phone"] .  "</td> ";
      echo "<td>" .$row["address"] .  "</td> "; 

      echo "<td><a href='del_data.php?ID=$row[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
    echo "</tr>";
    }
  echo "</table>";

  mysqli_close($conn);
?>

