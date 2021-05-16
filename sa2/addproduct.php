<?php
  session_start();
  include('server.php');
  include('admintool.php');
?>


<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 fw-bold fs-5" > <br />
      <h3 align="center" class="fw-bold"> ฟอร์มเพิ่มสินค้า </h3>
      <hr />
      <form action="addproduct_db.php" method="POST" enctype="multipart/form-data"  name="addprd" class="form-horizontal" id="addprd">
        <div class="form-group">
          <div class="col-sm-12">
            <p> ชื่อสินค้า</p>
            <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
            <textarea name="p_detail" class="form-control"  rows="3"  required placeholder="รายละเอียดสินค้า"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p> ประเภทสินค้า </p>
              <select class="form-select form-select-lg mb-3 fs-6" aria-label=".form-select-sm example"name="c_id" require>
                <option selected>เลือกประเภทสินค้า</option>
                <option value="1" >Coffee</option>
                <option value="2" >Bakery</option>
                <option value="3" >Milk Tea</option>
                <option value="4" >Soda</option>
              </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-3">
            <p> ราคา (บาท) </p>
            <input type="number"  name="p_price" class="form-control" required placeholder="ราคา" />
          </div>
          </p>
          <div class="col-sm-8 ">
            <p> ภาพสินค้า </p>
            <input type="file" name="p_img"  class="form-control" required />
          </div>
        </div>
        </p>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary" name="btnadd"> + เพิ่มสินค้า </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>