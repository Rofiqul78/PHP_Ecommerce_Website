<?php
include ('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];

  // select data fron database
  $select_query ="select * from brands where brand_title='$brand_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This Brand is present inside the database')</script>";
  }
  else{
  $insert_query ="insert into Brands(brand_title) VALUES('$brand_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Brands has been inserted successfully')</script>";
  }
}}
?>

<h3 class="text-center">Insert Brands</h3>
<form action="" method="post" class="mb-2 text-center">
  <div class="input-group w-50 mx-auto mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    </div>
    <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" 
      aria-label="Brands" aria-describedby="basic-addon1">
  </div>  
  <button type="submit" class="btn btn-info w-10" name="insert_brand">
    Insert Brands
  </button>
</form>