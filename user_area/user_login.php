<?php
session_start();
include('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<title>User Login</title>

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

<body style="overflow-x: hidden">
<div class="container-fluid my-3">
        <h3 class="text-center">User Login</h3>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">

                <!-- login form with login condition -->

                <form action="" method="post">
                    <!-- <p style="color:green">Please fill in this form to create an account!</p> -->
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user_username"
                         name="user_username" placeholder="Enter your username" 
                         required="required" autocomplete="off">
                    </div>

                    <!-- user password -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="user_password"
                         name="user_password" placeholder="Enter your password" 
                         required="required" autocomplete="off">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-1"><b>Don't have an account ? <a href="../user_area/user_registration.php" 
                        class="text-danger"> Register</a></b></p>
                    </div>
                </form>
            </div>    
        </div>    
</div>

</body>
</html>

<!-- php code for login condition -->

<?php

if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username']; 
    $user_password=$_POST['user_password']; 
    $user_ip_address=getIPAddress();
    //echo "$user_password";


    // check that email is verified
    $user_email=$_POST['user_email']; 
    $sql = "SELECT * FROM users WHERE email = '" . $user_email . "'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 0)
    {
        die("Email not found.");
    }

    $user = mysqli_fetch_object($result);
    if ($user->email_verified_at == null)
    {
        die("Please verify your email <a href='email-verification.php?email=" . $email . "'>from here</a>");
    }
    
//select query

$select_query= "select * from user_table where user_name='$user_username'";
$result_query=mysqli_query($con, $select_query);
$row_count_username=mysqli_num_rows($result_query);
$fetching_row_data=mysqli_fetch_assoc($result_query);//fetching the row data associated with the requested login username
    
// cart item

    $select_query_cart= "select * from cart_details where ip_address='$user_ip_address'"; //to check wether the user has any item in the cart
    $select_cart=mysqli_query($con, $select_query_cart);
    $row_count_cartitem=mysqli_num_rows($select_cart);

    if ($row_count_username > 0) {                   //$row_count_username>0, that means the user data is present in registered user database
        if (password_verify($user_password, $fetching_row_data['user_password'])) {        //matching password hashes
            if ($row_count_username == 1 and $row_count_cartitem == 0) {                  //registered user with no cart item, both the condition must be true
                $_SESSION['username']= $user_username;
                // Action 1
                echo "<script>alert('You have logged in successfully')</script>"; 
                echo "<script>window.open('dashboard.php','_self')</script>";  
            } elseif ($row_count_username == 1 and $row_count_cartitem > 0) {
                // Action 2
                echo "<script>alert('You have logged in successfully')</script>"; 
                echo "<script>window.open('payment.php','_self')</script>"; 
            }
        } else {  // This else belongs to the password verification condition
            // Action 3 (Invalid Password)
            echo "<script>alert('Invalid Credentials')</script>";  
    }
    }
}    

?>
 
   