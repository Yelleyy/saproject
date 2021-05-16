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
<?php $email=$_SESSION['email']; ?>
   <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-69 fw-bold fs-5" > </p>
<div class="container">
		<div class="col col-mb">
<table class="table table-hover style='background-color: FFFFFF;">

<tr>
    <h3 class="text fw-bold " style="background-color: FCD647  ;">ประวัติการสั่งซื้อ</h3>
</tr>
<tr class="text fw-bold fs-5">
    <td align="center" >ลำดับ</td>
    <td align="center">วัน เดือน ปี</td>
    <td align="center">ที่จัดส่ง</td>
    <td align="center" >เบอร์</td>
    <td align="center">รายละเอียดสินค้า</td>
    <td align="center" >ราคา</td>
    <td align="center" >สถานะ</td>
    </tr>
<?php
  $sql	= " SELECT * from order_head where o_email = '$email' ";
  $query2 = mysqli_query($conn, $sql);
  $i = 1;
while ($row2 = mysqli_fetch_array($query2)) {
  echo "<tr class='table table-hover'>";
  echo "<td align='center'>" .$i . "</td>";
  echo "<td align='center'>" .$row2['o_dttm'] ."</td>";
  echo "<td align='center'> ".$row2['o_addr']."</td>";
  echo "<td align='center'>".$row2['o_phone']."</td>";
  echo "<td  align='center' >" ."<a href='orderdetail.php?ID=$row2[0]' >"
  .'<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="purple" class="bi bi-zoom-in" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
  <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
  <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
</svg>'.  "</td> ";
  echo "<td align='center'>".$row2['o_total']."</td>";
  echo "<td align='center'>";
  if($row2["status"]=="not paid"){
    echo "<a href='changecus.php?ID=$row2[0]' onclick=\"return confirm('ยืนยันการยกเลิก... !!!')\" class='btn btn-primary' type='button' >
    <span class='spinner-border spinner-border-sm' role='status' ></span>
    กำลังดำเนินการ
  </a>";
     }
     else if($row2["status"]=="cancel"){
      echo "<a  class='btn btn-danger btn-xs'>ยกเลิก</a>";
       }
     else{
       echo   "<a  class='btn btn-success btn-xs'>เสร็จสิ้น</a>";
     }
  echo "</td>";
  echo "</tr>";
  $i++;
}
?>
</div>
</body>
</html>
