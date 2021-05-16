<meta charset="UTF-8">
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
  include('server.php');
  include('tool.php');
    $id = $_REQUEST["ID"];
    $query = "SELECT * FROM order_detail WHERE o_id = '$id'" or die("Error:" . mysqli_error());
    $result = mysqli_query($conn, $query); 
    $query1 = "SELECT * FROM stock where id ='$p_id'";
    $result1 = mysqli_query($conn, $query1); 
    $i = 1;
    echo '<div class="container">';
    echo '<p class="display-3 fw-bold">Order detail</p>';
    echo ' <table class="table table-hover">';
        echo "
          <tr>
          <td align='left'>ลำดับ</td>
          <td>รายการ</td>
          <td>จำนวนที่ซื้อ</td>
          <td>รวมทั้งหมด</td>               
        </tr>";
      while($row = mysqli_fetch_array($result)){
        $p_id=$row["p_id"];
        $query1 = "SELECT * FROM stock where id ='$p_id'";
        $result1 = mysqli_query($conn, $query1); 
        echo "<tr>";
        echo "<td >" .$i.  "</td> ";
        echo "<td>"; 
        while( $row1 = mysqli_fetch_array($result1)){ 
          echo $row1["name"];
        }
        echo  "</td> ";
        echo "<td>" .$row["d_qty"] .  "</td> ";
        echo "<td>" .$row["d_subtotal"] .  "</td> ";
        echo "<td align='center'> ";
        echo "</tr>";
        $i++;
        
      }
      mysqli_close($conn);
?>
     <table class="container" align="right">
    <tr>
    <td align="right">
    <a href='status.php'><button class='btn btn-success'align="right" type='button' > กลับหน้าเดิม </button>
    </td>
    </tr>
   