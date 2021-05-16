<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé Coffee</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h1>สมัครสมาชิก</h1>
    </div>

    <form action="register_db.php" method="post">
        <?php include('errors.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <label for="fname">ชื่อ</label>
            <input type="text" name="fname"placeholder="โปรดกรอกชื่อจริงของท่าน"required>
        </div>
        <div class="input-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="lname"placeholder="โปรดกรอกนามสกุลของท่าน"required>
        </div>
        <div class="input-group">
            <label for="email">กรอกอีเมล*</label>
            <input type="email" name="email"placeholder="โปรดกรอกอีเมล" required>
        </div>
        <div class="input-group">
            <label for="password_1">รหัสผ่าน*</label>
            <input type="password" name="password_1"placeholder="โปรดใส่รหัสผ่าน" required>
        </div>
        <div class="input-group">
            <label for="password_2">ยืนยันรหัสผ่าน*</label>
            <input type="password" name="password_2"placeholder="โปรดยืนยันรหัสผ่าน" required>
        </div> 
        <div class="input-group">
            <label for="phone">กรอกเบอร์โทรศัพท์</label>
            <input type="tel" name="phone"pattern="[0]{1}[0-9]{9}" placeholder="08XXXXXXXX" title="กรุณาใส่เบอร์โทรศัพท์ให้ถูกต้อง"> 
        </div>      
        <div class="input-group">
            <label for="address">กรอกที่อยู่</label>
            <input type="text" name="address"placeholder="โปรดกรอกที่อยู่สำหรับจัดส่งอาหาร"required>
        </div>     
        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">ยืนยันการสมัคร</button>
        </div>
        <p>เป็นสมาชิกแล้วหรอ? <a href="login.php">ล็อกอินได้ที่นี่!</a></p>
    </form>
</body>
</html>