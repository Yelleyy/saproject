<?php
    session_start();
    include('server.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="header">
        <h1>สำหรับลูกค้า</h1>
    </div>

    <form action="login_db.php" method="post">
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
            <label for="Email">อีเมล</label>
            <input type="email" name="email" placeholder="โปรดป้อนอีเมลของคุณ"required >
        </div>
        <div class="input-group">
            <label for="Password">รหัสผ่าน</label>
            <input type="password" name="password_1" placeholder="กรุณาระบุรหัสผ่าน" required>
        </div>
        <div class="input-group">
            <button type="submit" name="login_user" class="btn">ยืนยัน</button>
        </div>
        <a href="index.php">กลับหน้าหลัก</a>
		<p>*หากลืมรหัสผ่าน สามารถติดต่อที่หน้าแคชเชียร์เพื่อขอรหัสผ่านใหม่ได้ค่ะ* </p>
        <p>ยังไม่ได้สมัครสมาชิกหรอ? <a href="register.php">สมัครสมาชิกได้ที่นี่!</a></p>
    </form>
</body>

</html>