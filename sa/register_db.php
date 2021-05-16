<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        if ($password_1 != $password_2) {
            array_push($errors, "รหัสผ่านไม่ตรงกัน");
            $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
        }
        $user_check_query = "SELECT * FROM user1 WHERE email = '$email' OR phone = '$phone' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['email'] === $email) {
                array_push($errors, "อีเมลนี่มีคนใช้แล้ว");
                $_SESSION['error'] = "อีเมลนี่มีคนใช้แล้ว";
            }
            if ($result['phone'] === $phone) {
                array_push($errors, "โปรดใช้เบอร์โทรศัพท์อื่น");
                $_SESSION['error'] = "โปรดใช้เบอร์โทรศัพท์อื่น";
            }
        }

        if (count($errors) == 0) {
            $sql = "INSERT INTO user1 (fname,lname,email,password,phone,address) VALUES ('$fname','$lname','$email', '$password_1','$phone','$address')";
            mysqli_query($conn, $sql);
            
            $_SESSION['email'] = $email;          
            header('location: index.php');
        } else {
            if ($result['email'] === $email) {
                array_push($errors, "อีเมลนี่มีคนใช้แล้ว");
                $_SESSION['error'] = "อีเมลนี่มีคนใช้แล้ว";
            }
            if ($result['phone'] === $phone) {
                array_push($errors, "โปรดใช้เบอร์โทรศัพท์อื่น");
                $_SESSION['error'] = "โปรดใช้เบอร์โทรศัพท์อื่น";
            }
            header("location: register.php");
        }
    }

?>
