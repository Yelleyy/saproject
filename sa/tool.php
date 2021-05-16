<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<link rel="stylesheet" href="style1.css">


<body style="background-color:rgba(251, 236, 244, 0.43);" >
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #965700 ;" aria-label="Ninth navbar example">

    <div class="container-xl">
      <a class="navbar-brand" href="index.php">DataFé Coffee</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="coffee.php">Coffee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="bakery.php"  aria-current="page">Bakery</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="soda.php"  aria-current="page">Soda</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="milktea.php"  aria-current="page">Milk Tea</a>
          </li>     
        </ul>        
        <?php if (isset($_SESSION['email'])) : ?>
            <a class="navbar-brand">ยินดีต้อนรับ</a>
            <a class="navbar-brand"href="profile.php"> <strong ><?php echo $_SESSION['email']; ?></strong></a>
            <a class="navbar-brand" href="index.php?logout='1'" >ออกจากระบบ</a>
            <a href="cart.php"><button type="submit"class="btn btn-outline-light">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
  <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
</svg>
            
                <span class="visually-hidden">Button</span>
               
              </button></a><p></p>
              <li class="nav-link">
                <a class="navbar-brand" href="status.php" >ตรวจสอบสถานะ</a>
              </li>
        <?php else: ?>
            <a class="navbar-brand" href="login.php">เข้าสู่ระบบ</a>
            <a class="navbar-brand" href="register.php">สมัครสมาชิก</a> 
        <?php endif ?>
                  
      </div>
    </div>
</nav>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
  