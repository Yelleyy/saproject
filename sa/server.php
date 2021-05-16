<?php 

    $conn = mysqli_connect("localhost", "root", "12345678", "data") or die("Connection failed: " . mysqli_error($conn));
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } 

?>
<link rel="stylesheet" href="style1.css">