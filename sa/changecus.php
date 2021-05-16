<meta charset="UTF-8">
<?php

    include('server.php'); 
    $id = $_REQUEST["ID"];
    $sql = "UPDATE `order_head` SET status='cancel' WHERE o_id='$id' ";
    $result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
    
    if($result){
        echo "<script type='text/javascript'>";
        echo "alert('ยกเลิกเสร็จสิ้น');";
        echo "window.location = 'status.php'; ";
        echo "</script>";
    }
    else{
        echo "<script type='text/javascript'>";
        echo "alert('มีบางอย่างผิดพลาดลองอีกครั้ง');";
        echo "</script>";
    }
?>