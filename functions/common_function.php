<?php
include ('./includes/connect.php');


//getting products

function getproducts(){
global $con;
//condition to check isset or not
if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){                           
$select_query ="select * from products order by rand() limit 0,9";
$result_query=mysqli_query($con,$select_query);
while ($row_data= mysqli_fetch_assoc($result_query)) {
$product_id = $row_data['product_id'];
$product_title = $row_data['product_title'];
$product_description = $row_data['product_description'];
$product_image1 = $row_data['product_image1'];
$product_price = $row_data['product_price'];
$category_id = $row_data['category_id'];
$brand_id = $row_data['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card' style='width: 18rem;'>
<img src='./admin_area/product_images/$product_image1'class='card-img-top'  alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<a href='#' class='btn btn-info'>Add to Cart</a>
<a href='#' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";                           
}
}
}
}                              

//getting unique categories

function get_unique_categories(){
global $con;
//condition to check isset or not
if(isset($_GET['category'])){  
$category_id=$_GET['category'];
$select_query ="select * from products where category_id=$category_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
     echo "<h4 class='text-center text-danger'>Sorry, 
     the stocks within this particular category are presently unavailable</h4>";                         
}
while ($row_data= mysqli_fetch_assoc($result_query)) {
$product_id = $row_data['product_id'];
$product_title = $row_data['product_title'];
$product_description = $row_data['product_description'];
$product_image1 = $row_data['product_image1'];
$product_price = $row_data['product_price'];
$category_id = $row_data['category_id'];
$brand_id = $row_data['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card' style='width: 18rem;'>
<img src='./admin_area/product_images/$product_image1'class='card-img-top'  alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<a href='#' class='btn btn-info'>Add to Cart</a>
<a href='#' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";                           
}
}
}
                             
//getting unique brands

function get_unique_brands(){
global $con;
//condition to check isset or not
if(isset($_GET['brand'])){  
$brand_id=$_GET['brand'];
$select_query ="select * from products where brand_id=$brand_id";
$result_query=mysqli_query($con,$select_query);
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
echo "<h4 class='text-center text-danger'>Unfortunately, stocks associated with this
particular brand are presently unavailable.</h4>";                         
}
while ($row_data= mysqli_fetch_assoc($result_query)) {
$product_id = $row_data['product_id'];
$product_title = $row_data['product_title'];
$product_description = $row_data['product_description'];
$product_image1 = $row_data['product_image1'];
$product_price = $row_data['product_price'];
$category_id = $row_data['category_id'];
$brand_id = $row_data['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card' style='width: 18rem;'>
<img src='./admin_area/product_images/$product_image1'class='card-img-top'  alt='$product_title'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<a href='#' class='btn btn-info'>Add to Cart</a>
<a href='#' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";                           
}
}
}                           

//displaying brands in sidenav

function getbrands(){
global $con;
$select_brands = "SELECT * FROM brands";
$result_brands = mysqli_query($con, $select_brands);

while ($row_data = mysqli_fetch_assoc($result_brands)) {
$brand_title = $row_data['brand_title'];
$brand_id = $row_data['brand_id'];

echo "<li class='nav-item'>
<a href='index.php?brand=$brand_id' class='nav-link text-light text-center'>$brand_title</a>
</li>";
}                          
}

//displaying categories in sidenav
function getcategories(){
global $con;
$select_categories = "SELECT * FROM categories";
$result_categories = mysqli_query($con, $select_categories);

while ($row_data = mysqli_fetch_assoc($result_categories)) {
                              $category_title = $row_data['category_title'];
                              $category_id = $row_data['category_id'];
                              echo "<li class='nav-item'>
                              <a href='index.php?category=$category_id' class='nav-link text-light text-center'>$category_title</a>
                              </li>";
}  
}
?>