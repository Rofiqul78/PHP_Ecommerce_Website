<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
 <title>User Registration</title>

 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- bootstrap css link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">

    <!-- css files -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid my-3">
        <h3 class="text-center">New User Registration</h3>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- <p style="color:green">Please fill in this form to create an account!</p> -->
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_username"
                         name="user_username" placeholder="Enter your username" 
                         required="required" autocomplete="off">
                    </div>
                    <!-- user email -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user_email"
                         name="user_email" placeholder="Enter your Email" 
                         required="required" autocomplete="off">
                    </div>

                    <!-- user image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" class="form-control" id="user_image"
                         name="user_image" 
                         required="required" >
                    </div>

                    <!-- user password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password"
                         name="user_password" placeholder="Enter your password" 
                         required="required" autocomplete="off">
                    </div>

                    <!-- Confirm password -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="conf_user_password"
                         name="conf_user_password" placeholder="Confirm password" 
                         required="required" autocomplete="off">
                    </div>

                    <!-- address -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="user_address"
                         name="user_address" placeholder="Enter your Address" 
                         required="required" autocomplete="off">
                    </div>

                    <!-- contact -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="user_contact"
                         name="user_contact" placeholder="Enter your mobile number" 
                         required="required" autocomplete="off">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1"><b>Already have an account ? <a href="user_login.php" 
                        class="text-danger"> Login</a></b></p>
                    </div>
                </form>
            </div>    
        </div>    
</div>

</body>
</html>

<!-- php code -->

<?php

if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username']; 
    $user_email=$_POST['user_email']; 
    $user_password=$_POST['user_password']; 
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password']; 
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    $user_ip_address=getIPAddress();
    $user_address=$_POST['user_address']; 
    $user_contact=$_POST['user_contact'];

//select query
$select_query= "select * from user_table where user_name='$user_username' or user_email='$user_email'";
$result_query=mysqli_query($con, $select_query);
$num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
        echo "<script>alert('Username or Email already exist')</script>";                         
    }
    
    else if($user_password!=$conf_user_password){
        echo "<script>alert('Passwprds do not match')</script>";           
    }
    
    else{
    //insert query
    $insert_query="insert into user_table (user_name, user_email, user_password, user_image, user_ip,
        user_address, user_mobile) values('$user_username','$user_email', '$hash_password','$user_image',
        '$user_ip_address',' $user_address', '$user_contact')";
    $result=mysqli_query($con, $insert_query);
    move_uploaded_file($user_image_temp,"./user_images/$user_image");   
    }
    
    // checkout condition

    $select_cart_items= "select * from cart_details where ip_address='$user_ip_address'";
    $result_cart=mysqli_query($con, $select_cart_items);
    $num_of_rows=mysqli_num_rows($result_cart);
       
    if($num_of_rows>0){ //to check is there any item in the cart
        $_SESSION['username']= $user_username;
        echo "<script>alert('You have items in the cart')</script>";  
        echo "<script>window.open('../checkout.php','_self')</script>";                               
    }
    else{ //if user is logged in but no item in the cart  (cart item=0)
        echo "<script>window.open('./index.php','_self')</script>";      
    }

}
?>