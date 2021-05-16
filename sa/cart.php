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
	include("server.php");
	include("tool.php");
	$p_id = $_GET['p_id']; 
	$act = $_GET['act'];	
	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DataFé Cart</title>
</head>

<body>
<form id="frmcart" name="frmcart" method="post" action="?act=update">
<div class="container">
		<div class="col col-mb">
		<table class="table table-hover">
    <tr>
      
      <h3 class="text fw-bold " style="background-color: FCD647 ;">ตะกร้าสินค้า</h3>
    </tr>
    <tr class="text fw-bold fs-5 ">
      <td >สินค้า</td>
      <td >ราคา</td>
      <td >จำนวน</td>
      <td >รวม(บาท)</td>
      <td ></td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("server.php");
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
	foreach($_SESSION['cart'] as $id=>$qty)
	{
		$sql = "select * from stock where id=$id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['price'] * $qty;
		$total += $sum;
		
		echo "<tr >";
		
		echo "<td >" . $row["name"] . "</td>";
		echo "<td >" .number_format($row["price"],2) . "</td>";
		echo "<td >";  
		echo "<input type='text' name='amount[$id]' value='$qty' size='2'/></td>";
		echo "<td >".number_format($sum,2)."</td>";
		//remove product
		echo "<td ><a href='cart.php?p_id=$id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr class='text fw-bold fs-5 '>";
    echo "<td ><b>ราคารวม</b></td>";
    echo "<td ></td>";
    echo "<td ></td>";
  	echo "<td >"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td ></td>";
	echo "</tr>";
	
}
?>
<tr>
<td><a href="coffee.php"class='btn btn-warning btn-xs'>กลับหน้ารายการสินค้า</a></td>
<td colspan="4" align="right">
    <input type="submit" name="button" id="button" value="คำนวณสินค้าใหม่" class='btn btn-primary btn-xs'/>
    <input type="button" name="Submit2" value="สั่งซื้อ" onclick="window.location='confirm.php';"class='btn btn-success btn-xs' />
</td>
</tr>
</table>
</div>
</form>
</body>
</html>