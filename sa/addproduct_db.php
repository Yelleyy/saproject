<meta charset="UTF-8" />
<?php 
	include('admintool.php');
	include('server.php');

	$p_name = $_POST['p_name'];
	$p_detail = $_POST['p_detail'];
	$p_price = $_POST['p_price'];
    $p_type = $_POST['c_id'];
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');

	$upload=$_FILES['p_img'];

	if($upload <> '') { 
		$path="img/";
		$newname = $_FILES['p_img']['name'];
		$path_copy=$path.$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  		
	}
    if($p_type=='1'){
        $typee='coffee';
    }
    else if($p_type==2){
        $typee='cake';
    }
    else if($p_type==3){
        $typee='tea';
    }
    else if($p_type==4){
        $typee='soda';
    }
	$sql = "INSERT INTO stock (name,detail,price,pic,type) VALUES ('$p_name','$p_detail','$p_price','$newname','$typee')"
	or die ("Error in query: $sql " . mysql_error());
		                                                             
	$result=mysqli_query($conn, $sql)or die ("Error in query: $sql " . mysql_error());

	if($result){
   
			echo "<script type='text/javascript'>";
			echo  "alert('เพิ่มสินค้าเรียบร้อย');";
			echo "window.location='addproduct.php';";
			echo "</script>";
	  }
	  else{
		    echo "<script type='text/javascript'>";
				echo "window.location='addproduct.php';";
			echo "</script>";
	  }
	  mysql_close();
	
 ?>