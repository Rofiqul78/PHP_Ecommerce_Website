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
<p class='card-text'>Price: $product_price</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";                           
}
}
}
} 

//getting unique categories
function get_all_products(){
    global $con;
    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){                           
    $select_query ="select * from products order by rand()";
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
    <p class='card-text'>Price: $product_price</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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
<p class='card-text'>Price: $product_price</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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
<p class='card-text'>Price: $product_price</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
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

//function for searching product 

function search_product(){
global $con;   
if(isset($_GET['search_data_product'])){ 
    $search_data_value=$_GET['search_data'];                        
$search_query ="select * from products where product_keyword like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);

$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows==0){
echo "<h4 class='text-center text-danger'>No results match, no product found on this category!</h4>";                         
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
<p class='card-text'>Price: $product_price</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
<a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
</div>
</div>
</div>";                           
}
}
}

//view more function

function view_more(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brand'])){ 
            $product_id=$_GET['product_id'];
            $select_query ="select * from products where product_id=$product_id" ;
            $result_query=mysqli_query($con,$select_query);                                
    while ($row_data= mysqli_fetch_assoc($result_query)){
    $product_id = $row_data['product_id'];
    $product_title = $row_data['product_title'];
    $product_description = $row_data['product_description'];
    $product_image1 = $row_data['product_image1'];
    $product_image2 = $row_data['product_image2'];
    $product_image3 = $row_data['product_image3'];
    $product_price = $row_data['product_price'];
    $category_id = $row_data['category_id'];
    $brand_id = $row_data['brand_id'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card' style='width: 18rem;'>
    <img src='./admin_area/product_images/$product_image1'class='card-img-top'  alt='$product_title'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>
    <div class='col-md-8'>
        <!-- related images -->
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related Products</h4>
            </div>
            <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image2'class='card-img-top'  alt='$product_title'>
            </div> 
            <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image3'class='card-img-top'  alt='$product_title'>
            </div>                        
        </div>                       
    </div>";                           
    }
    }
    }
    }

}

//get ip address function

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 

//cart function
function cart(){
if(isset($_GET['add_to_cart'])){
global $con;
$get_ip_address = getIPAddress();
$get_product_id=$_GET['add_to_cart']; 
$select_query ="select * from cart_details where ip_address='$get_ip_address' and product_id=$get_product_id";
$result_query=mysqli_query($con,$select_query);  
$num_of_rows=mysqli_num_rows($result_query);
if($num_of_rows>0){ 
echo "<script>alert('This item is already present inside cart')</script>";
echo "<script>window.open('index.php','_self')</script>";                    
} 
else{           
$insert_query ="insert into cart_details(product_id, ip_address, quantity)
values ($get_product_id,'$get_ip_address',0)";
$result_query=mysqli_query($con,$insert_query); 
echo "<script>alert('Item is added to cart')</script>";
echo "<script>window.open('index.php','_self')</script>";  
}      
}
}

//function to show cart item
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $select_query ="select * from cart_details where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);  
        $num_of_rows=mysqli_num_rows($result_query);
    }    
    else{           
        global $con;
        $get_ip_address = getIPAddress();
        $select_query ="select * from cart_details where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);  
        $num_of_rows=mysqli_num_rows($result_query);
    }  
    echo "$num_of_rows";    
}
//Total price function 
function total_cart_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total_price=0;
    $cart_query ="select * from cart_details where ip_address='$get_ip_address'";
        $cart_result=mysqli_query($con,$cart_query);  
        while ($row_data= mysqli_fetch_array($cart_result)){
            $product_id = $row_data['product_id'];
            $select_products="select * from products where product_id='$product_id'";
            $product_result=mysqli_query($con,$select_products);
            while ($row_product_price= mysqli_fetch_array($product_result)){  
                $product_price=array($row_product_price['product_price']);//[90,190]
                $product_sum=array_sum($product_price);//[280]
                $total_price+= $product_sum;//[280]
}        
}
echo $total_price;
}

?>