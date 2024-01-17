<?php
//session_start();
include('../includes/connect.php');


if (isset($_POST["verify_email"])){
    $verification_code = $_POST["verification_code"];

    //verify the email address and veroification code from mysql
    $verify_user ="select * from user_table where verification_code='$verification_code'
        and verification_status=0 and  now() <= verification_expiry"; 
    $result_verify_user = mysqli_query($con,  $verify_user);
        
    $row_count=mysqli_num_rows($result_verify_user);
    if ($row_count > 0){
        $V_Status_update="update user_table set verification_status=1 where  verification_code='$verification_code'"; // Verification code is valid & within expiration time
        $result_V_Status_update=mysqli_query($con,  $V_Status_update);
    
        if ( $result_V_Status_update){
            echo "Your register email has verified successfully!";
        } else {
            echo "Failed to update verification status";
        }
    } else {
        echo "Invalid or expired verification code, please try again";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
 <title>Email verification</title>

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
    <form action="" method="POST" class="text-center">
    <h4 style="color:green" text-center>Email Verification window</h4>
    <input type="text"  name="verification_code" placeholder="Enter verification code" required=required autocomplete="off">
    <input type="submit" class="bg-info py-2 px-3 border-0" name="verify_email" value="Submit">
    </form>
</body>
</html>