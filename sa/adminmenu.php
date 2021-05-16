<?php
  session_start();
  include('server.php');
  include('admintool.php');
  echo '<div class="container">';
  $query = "SELECT * from stock where type='coffee' ORDER BY id ASC" or die("Error:" . mysqli_error());
  $result = mysqli_query($conn, $query); 
  echo '<div class="col col-mb">';
  
  echo '<h2 class="display-5 fw-normal ">Coffee</h2>';
  echo ' <table class="table table-hover">';
      echo "
        <tr>
        <td>No.</td>
        <td>รายการ</td>
        <td>ราคา</td>
        <td></td>                 
      </tr>";
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
      echo "<td>" .$row["id"] .  "</td> ";
      echo "<td>" .$row["name"] .  "</td> ";
      echo "<td>" .$row["price"] .  "</td> ";

      echo "<td><a href='delmenu.php?ID=$row[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
    echo "</tr>";
    }
  echo "</table>";
  

  $query1 = "SELECT * from stock where type='cake' ORDER BY id ASC" or die("Error:" . mysqli_error());
  $result1 = mysqli_query($conn, $query1); 
  echo '<div class="container">';
  
  echo '<h2 class="display-5 fw-normal ">Bakery</h2>';
  echo ' <table class="table table-hover">';
      echo "
        <tr>
        <td>No.</td>
        <td>รายการ</td>
        <td>ราคา</td>
        <td></td>                 
      </tr>";
    while($row1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
      echo "<td>" .$row1["id"] .  "</td> ";
      echo "<td>" .$row1["name"] .  "</td> ";
      echo "<td>" .$row1["price"] .  "</td> ";

      echo "<td><a href='delmenu.php?ID=$row1[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
    echo "</tr>";
    }
  echo "</table>";

  $query2 = "SELECT * from stock where type='tea' ORDER BY id ASC" or die("Error:" . mysqli_error());
  $result2 = mysqli_query($conn, $query2); 
  echo '<div class="container">';
  
  echo '<h2 class="display-5 fw-normal ">Milk Tea</h2>';
  echo ' <table class="table table-hover">';
      echo "
        <tr>
        <td>No.</td>
        <td>รายการ</td>
        <td>ราคา</td>
        <td></td>                 
      </tr>";
    while($row2 = mysqli_fetch_array($result2)) {
    echo "<tr>";
      echo "<td>" .$row2["id"] .  "</td> ";
      echo "<td>" .$row2["name"] .  "</td> ";
      echo "<td>" .$row2["price"] .  "</td> ";

      echo "<td><a href='delmenu.php?ID=$row2[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
    echo "</tr>";
    }
  echo "</table>";
   
  $query3 = "SELECT * from stock where type='soda' ORDER BY id ASC"or die("Error:" . mysqli_error());
  $result3 = mysqli_query($conn, $query3); 
  echo '<div class="container">';
  
  echo '<h2 class="display-5 fw-normal ">Soda</h2>';
  echo ' <table class="table table-hover">';
      echo "
        <tr>
        <td>No.</td>
        <td>รายการ</td>
        <td>ราคา</td>
        <td></td>                 
      </tr>";
    while($row3 = mysqli_fetch_array($result3)) {
    echo "<tr>";
      echo "<td>" .$row3["id"] .  "</td> ";
      echo "<td>" .$row3["name"] .  "</td> ";
      echo "<td>" .$row3["price"] .  "</td> ";

      echo "<td><a href='delmenu.php?ID=$row3[0]' onclick=\"return confirm('คุณแน่ใจแล้วหรอที่จะลบ !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
    echo "</tr>";
    }
  echo "</table>";
   
  mysqli_close($conn);
?>
