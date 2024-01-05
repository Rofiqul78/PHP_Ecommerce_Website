<?php
include ('../includes/connect.php');
if(isset($_POST['insert_cat'])){
  $cat_title=$_POST['cat_title'];

  // select data fron database
  $select_query ="select * from Categories where category_title='$cat_title'";
  $result_select=mysqli_query($con,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('This Category is present inside the database')</script>";
  }
  else{
  $insert_query ="insert into Categories(category_title) VALUES('$cat_title')";
  $result=mysqli_query($con,$insert_query);
  if($result){
    echo "<script>alert('Categories has been inserted successfully')</script>";
  }
}}
?>
<h3 class="text-center">Insert Categories</h3>
<form action="" method="post" class="mb-2 text-center">
  <div class="input-group w-50 mx-auto mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    </div>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Categories" aria-describedby="basic-addon1">
  </div>  
  <button type="submit" class="btn btn-info w-10" name="insert_cat">
    Insert Categories
  </button>
</form>

