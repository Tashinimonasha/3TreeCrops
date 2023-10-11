<?php

include 'components/connect.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:admin_login.php');
// };

//done by tashini

if(isset($_POST['add'])){


    if(!isset($_SESSION['email']))
    {
        $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);

     $products = $_POST['products'];
   $products = filter_var($products, FILTER_SANITIZE_STRING);

    $categories = $_POST['categories'];
   $categories = filter_var($categories, FILTER_SANITIZE_STRING);
   
   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_size_01 = $_FILES['image_01']['size'];
   $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
   $image_folder_01 = 'uploaded_img/'.$image_01;

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_size_02 = $_FILES['image_02']['size'];
   $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
   $image_folder_02 = 'uploaded_img/'.$image_02;

   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pnumber = $_POST['pnumber'];
  $pnumber = filter_var($pnumber, FILTER_SANITIZE_STRING);



   $details = $_POST['details'];
   $details = filter_var($details, FILTER_SANITIZE_STRING);


   $pcode = $_POST['pcode'];
    $pcode = filter_var($pcode, FILTER_SANITIZE_STRING);

   


  

   $select_products = $conn->prepare("SELECT * FROM `listing` WHERE name = ?");
   $select_products->execute([$name]);

   if($select_products->rowCount() > 0){
      $message[] = 'product name already exist!';
   }else{

      $insert_products = $conn->prepare("INSERT INTO `listing`(name,products,categories,image_01, image_02,price,email,pnumber,details,pcode) VALUES(?,?,?,?,?,?,?,?,?,?)");
      $insert_products->execute([$name,$products, $categories, $image_01, $image_02, $price, $email,$pnumber,$details,$pcode]);

      if($insert_products){
         if($image_size_01 > 2000000 OR $image_size_02 > 2000000 ){
            $message[] = 'image size is too large!';
         }else{
            move_uploaded_file($image_tmp_name_01, $image_folder_01);
            move_uploaded_file($image_tmp_name_02, $image_folder_02);
            
            $message = 'new product added!';

             echo "<script type='text/javascript'>alert('$message');location='index.php'</script>";
         }

      }

   }  
    }
    else
    {
        header('location:login.php');
        
    }

    

};



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
  
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="shop.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>   
    <style>
         .form-group  span{
         color: red;
         margin-top: 5PX; 
        }
      
        .form-group  span i{
            color: green;
            }

    </style>
</head>

</head>
<body>
     <!-- Topbar Start -->
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
                         <a href="login.php">  <button class="dropdown-item" type="button">Sign in</button></a>
                          <a href="signup.php">  <button class="dropdown-item" type="button">Sign up</button></a>
                           <a href="listing.php">  <button class="dropdown-item" type="button">Selling</button></a>
                            <a href="admin/admin_login.php">  <button class="dropdown-item" type="button">Admin</button></a>
                        </div>
                    </div>
                   
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">SIN</button>
                            
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-heart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
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
                <h5 class="m-0">+772300823</h5>
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
                            <a href="index.html" class="nav-item nav-link active" style="padding-left:320px;">Home</a>
                            <a href="shop.php" class="nav-item nav-link" style="padding-left:60px;">Shop</a>
                            <a href="Blog.html" class="nav-item nav-link "style="padding-left:60px;">Blog</a>
                            
                            <a href="contact.php" class="nav-item nav-link"style="padding-left:60px;">Contact</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->


<div class="container">
    <div class="wrapper" style="width:600px;">
        <div class="title">
            LISTING DETAILS FORM
        </div>
        <div style="padding:20px;">
            <form action="" method="POST"  autocomplete="off" enctype="multipart/form-data"  onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" onkeyup="validateName()">
                    <span id="Name_Error"></span>
                </div>

                <div class="form-group">
                    <label for="products">Products</label>
                    <div class="category_select">
                        <select class="form-control" id="products" name="products" onkeyup="validate_Products()">
                            <option value="S">select</option>
                            <option value="c">Coconut</option>
                            <option value="t">Tea</option>
                            <option value="r">Rubber</option>
                        </select>
                    </div>
                    <span id="Product_Error"></span>
                </div>

                <div class="form-group">
                    <label for="categories">Categories</label>
                    <div class="category_select">
                        <select class="form-control" id="categories" name="categories" onkeyup="validate_Categories()">
                              <option  >select</option>
                      <option value="c">Coconut_Convenience_Products</option>
                      <option value="e">Coconut Ekal Products</option>
                      <option value="t">Coconut Fiber Products</option>
                     <option value="f">Coconut Inflorescence Food Products</option>
                     <option value="k">Coconut Kernal products</option>
                     <option value="p">Coconut peat Products</option>
                      <option value="s">Coconut shell Products</option>
                      <option value="w">Coconut water Products</option>
                     <option value="n">Natural Rubber Products</option>
                     <option value="f">Rubber Foot Products</option>
                     <option value="g">Rubber gloves Products</option>
                     <option value="h">Rubber homemade Products</option>
                     <option value="tf">Tea food Products</option>
                    <option value="h">Tea hair Products</option>
                     <option value="m">Tea medicine Products</option>
                     <option value="ts">Tea skin Products</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <span id="Categories_Error"></span>
                </div>

                <div class="form-group">
                    <label for="image_01">Image 01 (required)</label>
                    <input type="file" class="form-control-file" id="image_01" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                </div>

                <div class="form-group">
                    <label for="image_02">Image 02 (required)</label>
                    <input type="file" class="form-control-file" id="image_02" name="image_02" accept="image/jpg, image/jpeg, image/png, image/webp" required>
                    <span id="Categories_Error"></span>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price"   max="9999999999" onkeyup="validatePrice()">
                    <span id="Price_Error"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" onkeyup="validateEmail()">
                    <span id="Email_Error"></span>
                </div>

                <div class="form-group">
                    <label for="pnumber">Phone Number</label>
                    <input type="text" class="form-control" id="pnumber" name="pnumber" onkeyup="validateTelephoneNo()">
                    <span id="Phone_Number_Error"></span>
                </div>

                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea class="form-control" id="details" name="details" onkeyup="validateDetails()"></textarea>
                    <span id="Details_Error"></span>
                </div>

                <div class="form-group">
                    <label for="pcode">Postal Code</label>
                    <input type="text" class="form-control" id="pcode" name="pcode" onkeyup="validatePostalCode()">
                    <span id="Postal_Code_Error"></span>
                </div>

                <div class="form-group">
                    <input type="submit" value="Add Product" class="btn btn-primary" name="add" style="width: 100%; height: 50px;">
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Footer Start -->
    <div class="container-fluid navic text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4 text-uppercase">It’s Time To Go 3TREECROPS</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> No:132,Sea line,Galle</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i> 3treecrops@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+94 7723000823</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="Home.html"><i class="fa fa-angle-right mr-2"></i>    Home</a>
                            <a class="text-secondary mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>    Shop</a>
                            <a class="text-secondary mb-2" href="Blog.html"><i class="fa fa-angle-right mr-2"></i>    Blog</a>
                           
                            <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>        Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="Home.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="login.php"><i class="fa fa-angle-right mr-2"></i>Sign in</a>
                            <a class="text-secondary mb-2" href="signup.php"><i class="fa fa-angle-right mr-2"></i>Sign up</a>
                            
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Receive 3TreeCrops Newsletter</h5>
                        
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Your Email Address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                        </form>
                        <h6 class="text-secondary text-uppercase mt-4 mb-30">Follow Us</h6>
                        <div class="d-flex" >
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#">NIBM</a>. All Rights Reserved
                    
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <script type="text/javascript">
    var Name_Error=document.getElementById('Name_Error');
    var Product_Error = document.getElementById('Product_Error');  
    var Categories_Error=document.getElementById('Categories_Error'); 
    var Price_Error = document.getElementById('Price_Error');
    var Email_Error=document.getElementById('Email_Error');
    var Phone_Number_Error=document.getElementById('Phone_Number_Error');
    var Details_Error = document.getElementById('Details_Error');  
    var Postal_Code_Error=document.getElementById('Postal_Code_Error'); 
    

    function validateName()
    {
    
    var Name=document.getElementById('name').value.replace(/^\s+|\s+$/g, "");
    if(Name.length == 0)
    {
        Name_Error.innerHTML='Name is required.';
        return false;
    }
    Name_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }

    function validate_Products()
    {
    if(document.getElementById("products").value == "S")
    {
        Product_Error.innerHTML='Products is required.';
        return false;
    }
    Product_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }
    
    document.getElementById("products").addEventListener("click", function() {

    if (document.getElementById("products").value != "S") {

        Product_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }
    });


    function validate_Categories()
    {
    if(document.getElementById("categories").value == "S")
    {
        Categories_Error.innerHTML='Categories is required.';
        return false;
    }
    Categories_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }
    
    document.getElementById("categories").addEventListener("click", function() {

    if (document.getElementById("categories").value != "S") {

        Categories_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }
    });


    function validatePrice()
    {
    
    var Price=document.getElementById('price').value.replace(/^\s+|\s+$/g, "");
    if(Price.length == 0)
    {
        Price_Error.innerHTML='Price is required.';
        return false;
    }
    Price_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }


    function validateEmail()
    {
    var Email = document.getElementById('email').value.replace(/^\s+|\s+$/g, "");

    if (Email.length == 0) 
    {
        Email_Error.innerHTML='User Email is required.';
        return false;
    }
    else
    {
        var emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!Email.match(emaiPattern))
    {
        Email_Error.innerHTML='Please Enter Email in correct format.';
        return false;
    }
    Email_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }  
    }


    function validateTelephoneNo()
    {
    
    var TelephoneNo=document.getElementById('pnumber').value.replace(/^\s+|\s+$/g, "");
    if(TelephoneNo.length == 0)
    {
        Phone_Number_Error.innerHTML='Telephone No is required.';
        return false;
    }
    else 
    {
        var phonePattern = /^\d{10}$/; // This pattern assumes a 10-digit phone number format.
            if (!TelephoneNo.match(phonePattern)) 
            {
                Phone_Number_Error.innerHTML = 'Please enter a valid 10-digit phone number.';
                return false;
            }
            Phone_Number_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
            return true;
        }
    }

    function validateDetails()
    {
    
    var Details=document.getElementById('details').value.replace(/^\s+|\s+$/g, "");
    if(Details.length == 0)
    {
        Details_Error.innerHTML='Details is required.';
        return false;
    }
    Details_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }

    function validatePostalCode()
    {
    
    var Postal_Code=document.getElementById('pcode').value.replace(/^\s+|\s+$/g, "");
    if(Postal_Code.length == 0)
    {
        Postal_Code_Error.innerHTML='Postal Code is required.';
        return false;
    }
    Postal_Code_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }


    function validateForm()
    {
        validateName();
        validate_Products();
        validate_Categories();
        validatePrice();
        validateEmail();
        validateTelephoneNo();
        validateDetails();
        validatePostalCode();

    if((!validateName()) || (!validate_Products()) || (!validate_Categories()) ||  (!validatePrice()) || (!validateEmail()) ||  (!validateTelephoneNo()) || (!validateDetails()) || (!validatePostalCode()))
    {
    return false;
    }
    }
    </script>


 
 


 

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


 </body>
</html>