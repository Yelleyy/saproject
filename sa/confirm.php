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
    date_default_timezone_set("Asia/Bangkok");
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé Coffee</title> 
</head>
<div class="container">
      <div class="row align-items-start">         
          <div class="col-8"><img src="img/datafe.png" width="700"; height="250"; ></div>
          <div class="col"><img src="img/logo.png" width="300"; height="250"; ></div>
      </div>
  </div>  
 <style>
table, th, td {
  border: 1px solid black;
}
</style>

<body>
<!-- <form id="frmcart" name="frmcart" method="post" action="saveorder.php"> -->
<div class="container">
		<div class="col col-mb">
<table class="table table-hover style='background-color: FFFFFF;">
<tr>
    <h3 class="text fw-bold " style="background-color: FCD647  ;">รายการสินค้า</h3>
</tr>
<tr class="text fw-bold fs-5" style="background-color: FFFFFF;">
    <td  align="center" >สินค้า</td>
    <td align="right">ราคา</td>
    <td align="right">จำนวน (ชิ้น)</td>
    <td align="right" >รวม (บาท)</td>
    </tr>
<?php
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from stock where id=$p_id";
		$query	= mysqli_query($conn, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['price']*$qty;
        $sum2   = $qty;
		$total	+= $sum;
        $total_qty +=$sum2;

    echo "<tr class='table table-hover'style='background-color: FFFFFF  ;'>";
    echo "<td align='center'>" . $row["name"] . "</td>";
    echo "<td align='right'>" .number_format($row['price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr style='background-color: FFFFFF  ;'>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม : ".number_format($total_qty)."</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";

?>
</table>
<?php
    $email=$_SESSION['email'];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];


    $q1 = "SELECT * from user1 where email= '$email' " or die("Error:" . mysqli_error());
    $result1 = mysqli_query($conn, $q1);
    $r	= mysqli_fetch_array($result1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = test_input($_POST["name"]);
        $email = test_input($_POST["email"]);
        $phone = test_input($_POST["phone"]);
        $address = test_input($_POST["address"]);       

      }
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

?>
</br>
<h2 class="fw-bold">กรุณากรอกรายละเอียด</h2></p>
<form method="post" class="fw-bold" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <p>ชื่อ</p><input class="form-control"  type="text" name ="name" value='<?php echo $r["fname"]." ".$r['lname']; ?>'></p>
  <p>Email</p> <fieldset disabled><input class="form-control" name="email" type="email" value='<?php echo $r["email"]; $email=$r["email"];?>'></fieldset></p>
  <p>Phone</p> <input class="form-control" type="text" name="phone" pattern="[0]{1}[0-9]{9}" required value='<?php echo $r["phone"];?>'></p>
  <p>Address</p><textarea class="form-control" name="address"  rows="3" required  cols="40"><?php echo $r["address"];?></textarea></p>
  <button type="submit" class="btn btn-success " name="submit" >สั่งซื้อ</button>
</form>

<?php

    if(array_key_exists('submit', $_POST)) {
        include("server.php");  
        
        $dttm = Date("Y-m-d H:i:s");
        $status='not paid';
        mysqli_query($conn, "BEGIN"); 

	
        $sql1	= "INSERT into order_head (o_name,o_email,o_phone,o_addr,o_dttm,o_qty,o_total,status) values ('$name', '$email', '$phone', '$address', '$dttm', '$total_qty', '$total', '$status')";
        $query1	= mysqli_query($conn, $sql1);
        $sql2 = "SELECT max(o_id) as o_id from order_head where o_name='$name' and o_email='$email' and o_dttm='$dttm' ";
        $query2	= mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($query2);
        $o_id = $row2['o_id'];
        
        foreach($_SESSION['cart'] as $p_id=>$qty)
        {
            $sql3	= "select * from stock where id=$p_id";
            $query3	= mysqli_query($conn, $sql3);
            $row3	= mysqli_fetch_array($query3);
            $total	= $row3['price']*$qty;
            
            $sql4	= "INSERT into order_detail (o_id,p_id,d_qty,d_subtotal) values ('$o_id', '$p_id', '$qty', '$total')";
            $query4	= mysqli_query($conn, $sql4);
            
        }
        echo "<script type='text/javascript'>";
        echo "alert('สั่งซื้อเรียบร้อย!!');";
        echo "window.location = 'status.php'; ";
        echo "</script>";
    }
?>
</body>
<footer class="footer mt-auto py-3 bg-light">
   
      <span class="text-muted fw-bold">Copyright © 2021 - <a href="index.php" style="color: black;">DataFé</a> by Yelley <br>Phone : 099-989-0909<br> Location : 91/9 บ้าน E404 วงศ์สว่างซอย 7 ถนนวงศ์สว่าง แขวงบางซื่อ เขตบางซื่อ กรุงเทพมหานคร 10800 </span>
    
  </footer>

</html>