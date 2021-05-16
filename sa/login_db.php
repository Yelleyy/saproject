<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        if (count($errors) == 0) {
            $query = "SELECT * FROM user1 WHERE email = '$email' AND password = '$password_1' ";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {  
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "";
                header("location: index.php");
                if(isset($_POST['email'])){
                    $email = $_POST['email'];
                    $sql="SELECT * FROM user1 
                    WHERE  email='".$email."' ";
                    $result = mysqli_query($conn,$sql);
                  
                    if(mysqli_num_rows($result)==1){
                        $row = mysqli_fetch_array($result);
        
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["level"] = $row["level"];
        
                        if($_SESSION["level"]=="admin"){ 
                            
                          Header("Location: admin_l.php");
                        }
                    }
                }
            } 
            else {          
                array_push($errors, "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่");
                $_SESSION['error'] = "อีเมล์หรือรหัสผ่านผิดพลาด กรุณากรอกใหม่";
                header("location: login.php");
            }
        }
    }
?>