<?php
include('includes/connect.php');
include('functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-commerce website-Cart details</title>

    <!-- bootstrap css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css files -->
    <link rel="stylesheet" href="style.css">
    <style>
    .cart_image{
        width:80px;
        height:80px;
        object-fit:contain;
    }
    
    h4 {
        text-align: center;
        margin-left:460px; 
    }
    </style>

</head>

 <body>
    <!-- 1st navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info mx-0">
            <img src="./images/logo.jpg" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>  


    <!-- 2nd navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary mx-0">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome Guest</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>                                   
            </ul>                        
        </nav>
    </div>

    <!-- ecommerce site brand name -->
    <div class="bg-light">
            <h3 class="text-center"> Excel Daily Shopping</h3>
            <p class="text-center"> "Shop Smarter, Live Better with Excel Daily Shopping."</p>
    </div>
 <!-- cart table-->
          
    <div class="container">
        <div class="row">
        <form action="cart.php" method="post">    
        <table class="table table-bordered text-center">
            <!-- <thead>
            <th>Product Title</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Remove</th>
                <th colspan="2">Operations</th> 
            </thead> -->
            <tbody>

                <!-- php code to display dynamic cart data -->

                <?php
                    $get_ip_address = getIPAddress();
                    $total_price=0;
                    $cart_query ="select * from cart_details where ip_address='$get_ip_address'";
                    $cart_result=mysqli_query($con,$cart_query); 
                    $num_of_rows=mysqli_num_rows($cart_result); 
                    if($num_of_rows>0){
                        echo "<thead>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th> 
                        </thead>";
                    while ($row_data= mysqli_fetch_array($cart_result)){
                    $product_id = $row_data['product_id'];
                    $select_products="select * from products where product_id='$product_id'";
                    $product_result=mysqli_query($con,$select_products);
                    while ($row_product_price= mysqli_fetch_array($product_result)){  
                    $product_price=array($row_product_price['product_price']);//[90,190]
                    //fetch product price, title & image  from  mysql table product
                    $price_table=$row_product_price['product_price'];
                    $product_title=$row_product_price['product_title'];
                    $product_image1=$row_product_price['product_image1'];
                    $product_values=array_sum($product_price);//[280]
                    $total_price+= $product_values;//[280]           
                ?>
                
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_image"></td>
                    <td><input type="text" name="quantity[<?php echo $product_id; ?>]" class="form-input w-50"></td>
                    
                    <?php
                        $get_ip_address = getIPAddress();
                        if (isset($_POST['update_cart'])) {
                            $quantities = $_POST['quantity'];
                            foreach ($quantities as $product_id => $quantity) {
                                $update_cart = "UPDATE cart_details SET quantity=$quantity WHERE ip_address='$get_ip_address' AND product_id=$product_id";
                                $product_result_quantity = mysqli_query($con, $update_cart);
                                 $total_price = $quantity * $price_table;

                            }
                            }
                    ?>

<!-- update & remove button -->

                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>" id=""></td>
                    <td>
                        <!-- <button class="bg-info px-3 py-2 border-0">Update</button> -->
                        <input type="submit" value="update cart" class="bg-info px-3 py-2 border-0" name="update_cart">
                        <!-- <button class="bg-info px-3 py-2 border-0">Remove</button> -->
                        <input type="submit" value="remove cart" class="bg-info px-3 py-2 border-0" name="remove_cart">
                    </td>
                </tr>

                <?php 
                }}} 
                else {
                    echo "<h4 class='text-center text-danger'>Cart is Empty</h4>";
                }
                ?>
            </tbody>
        </table>
     
<!-- Subtotal amount calculation-->

<?php
    function calculateSubtotal($con, $get_ip_address) {
        $subtotal = 0;
        $cart_query = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
        $cart_result = mysqli_query($con, $cart_query);

        while ($row_data = mysqli_fetch_array($cart_result)) {
            $product_id = $row_data['product_id'];
            $select_products = "SELECT * FROM products WHERE product_id='$product_id'";
            $product_result = mysqli_query($con, $select_products);

            while ($row_product_price = mysqli_fetch_array($product_result)) {
                $price_table = $row_product_price['product_price'];
                $subtotal += $price_table * $row_data['quantity']; // Multiply by quantity
            }
        }
        return $subtotal;
    }
?>
       
            <div class="d-flex mb-5">
                <?php
                    $get_ip_address = getIPAddress();
                    $total_price=0;
                    $cart_query ="select * from cart_details where ip_address='$get_ip_address'";
                    $cart_result=mysqli_query($con,$cart_query); 
                    $num_of_rows=mysqli_num_rows($cart_result); 
                    if($num_of_rows>0){
                        echo "<h4 class='px-3'>Subtotal: <strong class='text-info'>" . calculateSubtotal($con, $get_ip_address) . "</strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0' name='Continue_shopping'>
                        <button class='bg-secondary px-3 py-2 border-0'><a href='user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                    }
                    else{
                        echo "<input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0' name='continue_shopping'>"; 
                    }
                    if(isset($_POST['continue_shopping'])){ 
                            echo "<script>window.open('index.php','_self')</script>"; 
                        }
                ?>
            </div>
        </form> 
        </div>    
    </div>

<!-- function to remove item     -->

<?php 
function remove_cart_item(){
    global $con;
  if(isset($_POST['remove_cart'])){
       foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query ="delete from cart_details where product_id=$remove_id" ;
            $run_delete_query=mysqli_query($con,$delete_query);    
            if($run_delete_query){
              echo "<script>window.open('cart.php','_self')</script>";
}         
}
}
}
//calling function
remove_cart_item()
?>
     
    

<!-- include footer -->

<?php
include ('./includes/footer.php');
?>

<!-- bootstrap js link -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>                                 
