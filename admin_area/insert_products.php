<?php
include ('../includes/connect.php');
if(isset($_POST['insert_product'])){
  $product_title=$_POST['product_title'];
  $product_description=$_POST['product_description'];
  $product_keywords=$_POST['product_keywords'];
  $product_category=$_POST['product_category'];
  $product_brand=$_POST['product_brand'];
  $product_price=$_POST['product_price'];
  $product_status='true';


  //accessing images

  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  $product_image3=$_FILES['product_image3']['name'];

  //accessing images temp name

  $temp_image1=$_FILES['product_image1']['tmp_name'];
  $temp_image2=$_FILES['product_image2']['tmp_name'];
  $temp_image3=$_FILES['product_image3']['tmp_name'];

  //checking empty condition
  if($product_title=='' or  $product_description=='' or $product_keywords=='' or $product_category==''
    or $product_brand=='' or $product_price=='' or  $product_image1=='' or $product_image2=='' 
    or $product_image3==''){
    echo "<script>alert('Please input all the fields')</script>";
    exit();
  }else{
    move_uploaded_file($temp_image1, "./product_images/$product_image1");
    move_uploaded_file($temp_image2, "./product_images/$product_image2");
    move_uploaded_file($temp_image3, "./product_images/$product_image3");
    // insert query
    $insert_products = "INSERT INTO `products` (product_title, product_description, product_keyword, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
    VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

    // $insert_products= "Insert into `products` (product_title,product_description,product_keyword,category_id,
    // brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('product_title','description','product_keyword','category_id',
    // 'brand_id','product_image1','product_image2','product_image3','product_price','NOW(),'$product_status')"; 
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
    echo "<script>alert('Products inserted successfully')</script>";
  }
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert Products-Admin Dashboard</title>

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

<body class="bg-light">
  <div class="container mt-3">                                       
    <h3 class="text-center">Insert Products</h3>
    <!-- form -->
    <form action="" method="POST" enctype="multipart/form-data">

      <!-- product title -->

      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 20px">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text" class="form-control" name="product_title" id="product_title" placeholder="Enter Product Title" autocomplete="off" required>
      </div>

      <!-- description --> 

      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 20px">
        <label for="product_description" class="form-label">Description</label>
        <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Enter Product description" autocomplete="off" required>
      </div> 

      <!-- keywords --> 

      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 2px">
        <label for="product_keywords" class="form-label">Keywords</label>
        <input type="text" class="form-control" name="product_keywords" id="product_keywords" placeholder="Enter Product keywords" autocomplete="off" required>
      </div> <br>

      <!-- select categories --> 

      <div class="form-outline mb-8 m-auto" style="margin-bottom: 20px; width: 50%;">
        <label for="product_category" class="form-label">Select Product Category</label>
        <select name="product_category" id="" class="form-control" style="width: 100%;">
            <option value="">Select a Category</option>
            <?php
              $select_query ="select * from categories";
              $result_query=mysqli_query($con,$select_query);
              while ($row= mysqli_fetch_assoc($result_query)){
                $category_title = $row['category_title'];
                $category_id = $row['category_id'];
                echo "<option value='$category_id'>$category_title</option>";
              }
            ?>
        </select>
      </div> <br>

      <!-- select brands -->

      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 20px; width: 50%;">
        <label for="brand_category" class="form-label">Select Brand Category</label>
        <select name="product_brand" id="" class="form-control" style="width: 100%;">
          <option value="">Select a brand</option>
          <?php
              $select_query ="select * from brands";
              $result_query=mysqli_query($con,$select_query);
              while ($row_data= mysqli_fetch_assoc($result_query)) {
                $brand_title = $row_data['brand_title'];
                $brand_id = $row_data['brand_id'];
                echo "<option value='$brand_id'> $brand_title</option>";
              }
            ?>
        </select>
      </div> <br> 

      <!-- images --> 

      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 20px; width: 50%;">
        <label for="brand_image1" class="form-label">Product Image 1</label>
        <input type="file" class="form-control" name="product_image1" id="product_image1" required>
      </div> <br> 
      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 20px; width: 50%;">
        <label for="brand_image2" class="form-label">Product Image 2</label>
        <input type="file" class="form-control" name="product_image2" id="product_image2" required>
      </div> <br> 
      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 20px; width: 50%;">
        <label for="brand_image3" class="form-label">Product Image 3</label>
        <input type="file" class="form-control" name="product_image3" id="product_image3" required>
      </div> <br> 

      <!-- Price --> 
      <div class="form-outline mb-8 w-50 m-auto" style="margin-bottom: 2px">
        <label for="product_price" class="form-label">Product Price</label>
        <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" autocomplete="off" required>
      </div> <br> 
      
      <!-- submit button -->
      <div class="form-outline mb-8 w-50 m-auto mb-3 px-3" style="margin-bottom: 2px">
        <input type="submit" name="insert_product" class="btn btn-info" id="insert_product" value="Insert Products">
      </div> <br>       
    </form>
  </div>                                       
</body>



</div>
<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>