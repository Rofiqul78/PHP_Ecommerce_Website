<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

 <!-- bootstrap css link  -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
 integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
 crossorigin="anonymous">

<!-- font awsome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
 integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
 crossorigin="anonymous" referrerpolicy="no-referrer" />

 <!-- css files -->
 <link rel="stylesheet" href="../style.css">
   
</head>

<body>
<!-- 1st Child -->
<div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-info mx-0">
    <div class="container-fluid p-0">
      <img src="../images/logo.jpg" alt="" class="logo">
      <nav class="navbar navbar-expand-lg">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="">Welcome Guest</a>
          </li>
        </ul>
      </nav>
    </div>
  </nav>

  <!-- 2nd Child -->
  <div class="bg-light">
    <h3 class="text-center">Admin Panel</h3>
    <!-- <h3 class="text-center">Manage Details</h3> -->
  </div>

  <!-- 3rd Child -->
  <div class="row">
    <div class="col-md-12 bg-secondary p-3 d-flex align-items-center">
      <div class="px-5">
        <a href="#"><img src="../images/rofiq.jpg" class="admin_image mr-3" alt="Admin Image"></a>
        <p class="text-light text-center mb-0">Admin Name</p>
      </div>
      <div class="button text-center" my-3>
        <a href="insert_products.php" class="btn btn-info my-1">Insert Products</a>
        <a href="" class="btn btn-info my-1">View Products</a>
        <a href="index.php?insert_category" class="btn btn-info my-1">Insert Categories</a>
        <a href="" class="btn btn-info my-1">View Categories</a>
        <a href="index.php?insert_brands" class="btn btn-info my-1">Insert Brands</a>
        <a href="" class="btn btn-info my-1">View Brands</a>
        <a href="" class="btn btn-info my-1">All Orders</a>
        <a href="" class="btn btn-info my-1">All Payments</a>
        <a href="" class="btn btn-info my-1">List Users</a>
        <a href="" class="btn btn-info my-1">Logout</a>
      </div>
    </div>
  </div>
</div>

 <!-- 4th Child -->
 <div class="container my-3">
    <?php
    if(isset($_GET['insert_category'])){
      include('insert_categories.php');
    }
    if(isset($_GET['insert_brands'])){
      include('insert_brands.php');
    }
    ?>
 </div>

<!-- footer -->

<!-- <div class="bg-info p-3 text-center">
<footer>
  <p>&copy; 2023 Excel corporation. All rights reserved. | 
    <a href="https://www.excelcorporation.com/terms">Terms of Service</a> | 
    <a href="https://www.excelcorporation.com/privacy">Privacy Policy</a></p>
</footer>  -->

</div>
<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>

</html>