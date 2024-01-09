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
    <title>E-commerce website using PHP, AJAX & MYSQL</title>

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
                        <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i> <sup><?php cart_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Price: <?php total_cart_price(); ?></a>
                    </li>
                </ul>
                <form class="d-flex" action="" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                </form>
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

    <!-- sidenav & product column -->
    <div class="row">
        <!-- sidenav -->
        <div class="col-md-2 bg-secondary p-0">
            <!-- display different product category -->
            <ul class="navbar-nav me-auto"></ul>
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light text-center"> <h5>Categories</h5></a>
            </li>
            <?php
            getcategories()
            ?>
            
            <!-- display different brands -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light text-center"> <h5>Delivery Brands</h5></a>
                </li>

                <?php
                // Call the brand to display brands
                getbrands()
                
                ?>
            </ul>
        </div>

        <!-- products -->
        <div class="col-md-10">
            <div class="row px-1">

            <!-- fetching products -->
            <?php
            // Calling function
            search_product();
            get_unique_categories();
            get_unique_brands();
            ?>
            <!-- row end -->
            </div>
            <!-- column end -->
        </div>
    </div>

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
