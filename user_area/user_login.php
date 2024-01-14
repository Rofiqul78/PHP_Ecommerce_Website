
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
        <h3 class="text-center">User Login</h3>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- <p style="color:green">Please fill in this form to create an account!</p> -->
                    <!-- username -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="user-username"
                         name="user-username" placeholder="Enter your username" 
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
                        <p class="small fw-bold mt-2 pt-1"><b>Don't have an account ? <a href="./user_area/user_registration.php" 
                        class="text-danger"> Register</a></b></p>
                    </div>
                </form>
            </div>    
        </div>    
</div>

</body>
</html>


 
   