<?php  
    if(isset($_POST['status'])){          
        $status = $_POST['status'];            
        if($status==1){
           echo '<a class="btn btn-success btn-xs">จัดส่งเรียบร้อยแล้ว</a>';
        }
    }
?>