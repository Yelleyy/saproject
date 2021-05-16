<?php
  include('server.php');
  include('admintool.php');

  $query = "SELECT * FROM order_head ORDER BY o_id ASC" or die("Error:" . mysqli_error());
  $result = mysqli_query($conn, $query); 
  echo '<div class="table-responsive">';
  echo '<p class="display-3 fw-bold "> Order</p>';
  echo ' <table class="table table-hover">';
      echo "
        <tr class='table table-hover col'>
        <td align='left'>เลขที่ออเดอร์</td>
        <td >วันที่และเวลาได้รับออเดอร์</td>
        <td>ชื่อ นามสกุล</td>
        <td>Email</td>
        <td>เบอร์โทร</td>
        <td>ที่อยู่</td>
        <td align='center'>จำนวน</td>
        <td align='center'>รวมทั้งหมด</td>
        <td align='center'>สถานะ</td>                
      </tr>";
    while($row = mysqli_fetch_array($result)){
      echo "</tr>";
      echo "<tr >";
      echo "<td  align='center' >" .$row["o_id"]." "."<a href='admindetail.php?ID=$row[0]' >".'<svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" fill="red" class="bi bi-zoom-in" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
      <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
      <path fill-rule="evenodd" d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
    </svg>'.  "</td> ";
     echo "<td align='center'>" .$row["o_dttm"] .  "</td> ";
      echo "<td>" .$row["o_name"] .  "</td> ";
      echo "<td>" .$row["o_email"] .  "</td> ";
      echo "<td>" .$row["o_phone"] .  "</td> ";
      echo "<td>" .$row["o_addr"] .  "</td> ";
      echo "<td align='center'>" .$row["o_qty"] .  "</td> ";
      echo "<td align='center'>" .$row["o_total"] .  "</td> "; 
      echo "<td align='center'> ";
   
      if($row["status"]=="not paid"){
     echo "<a href='change.php?ID=$row[0]' onclick=\"return confirm('ยืนยันการจัดส่ง... !!!')\"><button class='btn btn-primary btn-l' type='button' >
     <span class='spinner-border spinner-border-sm' role='status' ></span>
     กำลังดำเนินการ
   </button>";
      }
      else if($row["status"]=="cancel"){
        echo "<a  class='btn btn-danger btn-xs'>ยกเลิก</a>";
         }
      else{
        echo   "<button  class='btn btn-success btn-xs'>เสร็จสิ้น</button>";
      }
  echo "</tr>";
    }
  echo "</table>";

  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé Coffee</title> 
</head>
<body>

   
</body>

