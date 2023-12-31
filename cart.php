<?php
session_start();

// Check if the form is submitted
if (isset($_POST['add_to_cart'])) {
    // Get product details from the form submission
    $productId = $_POST['pid'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
    $productImage = $_POST['image'];
    $productQty = $_POST['qty'];

    // Create a cart item array
    $cartItem = array(
        'id' => $productId,
        'name' => $productName,
        'price' => $productPrice,
        'image' => $productImage,
        'qty' => $productQty
    );

    // Check if the cart session variable exists, if not create it
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product is already in the cart, update the quantity
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['qty'] += $productQty;
            $found = true;
            break;
        }
    }

    // If the product is not in the cart, add it
    if (!$found) {
        $_SESSION['cart'][] = $cartItem;
    }

    // Redirect back to the shop page or any other page you prefer
    header("Location: shop.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->

    <meta charset="utf-8">
    <title>3TREECROPS </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="./shop.css">
    <link rel="stylesheet" href="./cart.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>

                </div>

            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="login.php"> <button class="dropdown-item" type="button">Sign in</button></a>
                            <a href="signup.php"> <button class="dropdown-item" type="button">Sign up</button></a>
                            <a href="listing.php"> <button class="dropdown-item" type="button">Selling</button></a>
                            <a href="admin/admin_login.php"> <button class="dropdown-item" type="button">Admin</button></a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">sin</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.html" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary navic px-2">3TREE</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">CROPS</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0">+94 723000823</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar Start -->
    <div class="container-fluid navic mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(24.8% - 20px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <div class="nav-item dropdown dropright">


                        </div>
                        <a href="categories/Coconut_Peat_Products.php" class="nav-item nav-link">Coconut Peat Products</a>
                        <a href="categories/Coconut_Ekal_Products.php" class="nav-item nav-link">Coconut Ekal Products</a>
                        <a href="categories/Coconut_Water_Products.php" class="nav-item nav-link">Coconut Water Products</a>
                        <a href="categories/Coconut_Kernal_Products.php" class="nav-item nav-link">Coconut Kernal Products</a>
                        <a href="categories/Coconut_Fiber_Products.php" class="nav-item nav-link">Coconut Fiber Products</a>
                        <a href="categories/Coconut_Shell_Products.php" class="nav-item nav-link">Coconut Shell Products</a>
                        <a href="categories/Coconut_Convenience_Products.php" class="nav-item nav-link">Coconut Convenience Products</a>
                        <a href="categories/Coconut_Inflorescence_Food_Products.php" class="nav-item nav-link">Coconut Inflorescence Food Products</a>

                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg navic navbar-dark py-3 py-lg-0 px-0">

                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0 ">
                            <a href="index.php" class="nav-item nav-link active" style="padding-left:320px;">Home</a>
                            <a href="shop.php" class="nav-item nav-link" style="padding-left:60px;">Shop</a>
                            <a href="Blog.html" class="nav-item nav-link " style="padding-left:60px;">Blog</a>

                            <a href="contact.php" class="nav-item nav-link" style="padding-left:60px;">Contact</a>
                            <a href="/cart.php" style="padding-left:60px;"><i class="fas fa-shopping-cart"></i><span>0</span></a>



                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <section>
        <!-- Display cart items -->
        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) : ?>
            <h2>Shopping Cart</h2>
            <ul class="cart-list">
                <?php
                $totalBill = 0;
                foreach ($_SESSION['cart'] as $item) :
                    $itemTotal = $item['qty'] * $item['price'];
                    $totalBill += $itemTotal;
                ?>
                    <li class="cart-item">
                        <div class="cart-item-details">
                            <span class="cart-item-name"><?= $item['name']; ?></span>
                            <span class="cart-item-qty"><?= $item['qty']; ?> x $<?= $item['price']; ?></span>
                        </div>
                        <span class="cart-item-total">$<?= number_format($itemTotal, 2); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="cart-total">
                <h3>Total: $<?= number_format($totalBill, 2); ?></h3>
                <a href="checkout.php" class="btn btn-primary">Checkout</a>
            </div>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>

    </section>

</body>

</html>