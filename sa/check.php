<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php  
    session_start();
        include('server.php');
       if(isset($_POST['id'])){          
            $id = $_POST['id'];            
            $sql="SELECT * FROM stock ORDER BY id ASC" or die("Error:" . mysqli_error());
            $result = mysqli_query($conn,$sql);             
             while($row = mysqli_fetch_array($result))
             {
                if($id==$row["id"]){          
                echo  '<script>  setTimeout(function() {
                            swal({
                                title: "คุณต้องการที่จะซื้อ",
                                text: "'; echo $row["name"]; echo ' ราคา ';echo $row["price"]; echo ' บาท",
                                type: "warning",
                                showCancelButton: true,
                            }, function() {
                                setTimeout(function() {
                                    swal({
                                        title: "ทำรายการสำเร็จ",
                                        text: "อยู่ในระหว่างการจัดส่ง...",
                                        type: "success",
                                        showCancelButton: false,
                                    }, function() {;'   ;   
                echo "                 window.location='cart.php?p_id=$row[id]&act=add';  
                                                             
                                                     
                                                    });
                                                },1000);
                                            });
                                        }, 1000);
                                        </script>";  
                }
            }
        }
           
?>
