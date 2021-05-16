<?php
  session_start();
    if (!isset($_SESSION['email'])) {
        echo "<script type='text/javascript'>";
        echo "alert('คุณไม่ใช่แอดมินนี่');"; 
        echo "window.location = 'index.php'; ";
        echo "</script>";
      
     
  }
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['email']);
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataFé Coffee</title> 
    
</head>
<nav class="navbar navbar-expand-lg navbar-dark "style="background-color: 965700" aria-label="Ninth navbar example">
    <div class="container-xl">
      <a class="navbar-brand" href="admin_l.php">DataFé Coffee</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="admin_l.php">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminmenu.php"  aria-current="page">Manage</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="adminorder.php"  aria-current="page">Order</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="addproduct.php"  aria-current="page">Add Product</a>
          </li>     
        </ul>        
            <a class="navbar-brand" href="#">Admin Menu</a>
            <a class="navbar-brand"href="index.php?logout='1'" style="color: white;">ออกจากระบบ</a>  
       </div>
    </div>
</nav>
<link rel="stylesheet" href="style1.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

