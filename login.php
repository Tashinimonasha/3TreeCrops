<?php
 session_start();
if(isset($_POST["btnlogin"])){
$con=mysqli_connect("localhost","tashini","123");
mysqli_select_db($con ,"3crops");



$email=$_POST["email"];
$pass=$_POST["pass"];
$type=$_POST["type"];

//tashiniiii


$sql="SELECT email,password,type FROM user WHERE email='$email' AND password='$pass'AND type='$type' ";

$result=mysqli_query($con,$sql);


$num_row=mysqli_num_rows($result);

if($num_row>=1)
{   if($type=="buyer"){
    $_SESSION['email']= $email;
      header("location:shop.php");
    
    // $_SESSION['user_id']=$user_id;
}
elseif ($type=="seller") {
    // code...
   {
      header("location:listing.php");
    $_SESSION['email']=$email;
    }
}
  
}
else{
    $err="Login Failed!";


    echo "<script type='text/javascript'>alert('$err');</script>";
}
}

?>
 


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="shop.css">

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
    <title>Login Form</title>

    <!--Css-->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!--boxicons css-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>   
    <style>
         .field  span{
         color: red;
         margin-top: 5PX; 
        }
      
        .field  span i{
            color: green;
            }

    </style>


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
                <h5 class="m-0">+74 723000823</h5>
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
                            <a href="blog.html" class="nav-item nav-link "style="padding-left:60px;">Blog</a>
                            
                            <a href="contact.php" class="nav-item nav-link"style="padding-left:60px;">Contact</a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
    <section style="padding-left: 550px;">
        <div class="form login" style="margin-top: 50px;">
            
            <div class="form-content">
                <header>Login</header>

                <form action="#" method="post" autocomplete="off"  onsubmit="return validateForm()">
                    <div class="field input-field" style="margin:0 0 40px 0;">
                        <label>Email</label>
                        <input type="email" placeholder="Email" class="input" id="email" name="email" onkeyup="validateUserEmail()">
                        <span id="UserEmail_Error"></span>
                    </div>
                    <div class="field input-field" style="margin:0 0 40px 0;">
                        <label>Password</label>
                        <input type="password" placeholder="Password" class="Password" id="pass" name="pass"  onkeyup="validatePassword()">
                        <span id="Password_Error"></span>
                    </div>
                    <div class="field input-field" style="padding-bottom:100px;">
                        <!-- <label  >User_Role</label> -->
                        <select name="type" id="type" class="field input-field" onkeyup="validate_User_Role()">
                            <option style="text-align: center;" value="S">User_Role</option>
                            <option value="seller">Seller</option>
                            <option value="buyer">Buyer</option>
                             <!-- <option value="admin">Admin</option> -->
                        </select>
                        <br><span id="UserRole_Error"></span>
                    </div>
                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>
                    <div class="field input-field">
                     <input type="submit" name="btnlogin" value="Login" class="btnn" onsubmit="session_start()">
                    </div>
                </form>
                <div class="form-link">
                        <span>Dont have an account ?<a href="signup.php" class="link signup-link">Signup</a></span>
                    </div>
            </div>
            <div class="line"></div>
            <div class="media-options">
                <a href="#" class="field facebook">
                <i class='bx bxl-facebook-square facebook-icon' style='color:#ffffff'  ></i>
                <span>Login with Facebook</span>
                </a>
            </div>
            <div class="media-options">
                <a href="#" class="field google">
                <img src="google.png" alt="" class="google-img">
                <span>Login with Google</span>
                </a>
            </div>
        </div>
    </section>
 
    <!-- Footer Start -->
    <div class="container-fluid navic text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-4 text-uppercase">It’s Time To Go 3TREECROPS</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i> No:132,Sea line,Galle</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i> 3treecrops@gmail.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+94 723000823</p>
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
    <!-- Footer End -->s
    <!--JAVASCRIPT-->
    <script src="login.js"></script>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <script type="text/javascript">
    var UserEmail_Error=document.getElementById('UserEmail_Error'); 
    var UserRole_Error = document.getElementById('UserRole_Error');
    var Password_Error=document.getElementById('Password_Error');
   
    function validateUserEmail()
    {
    var Email = document.getElementById('email').value.replace(/^\s+|\s+$/g, "");

    if (Email.length == 0) 
    {
        UserEmail_Error.innerHTML='User Email is required.';
        return false;
    }
    else
    {
        var emaiPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!Email.match(emaiPattern))
    {
        UserEmail_Error.innerHTML='Please Enter UserEmail in correct format.';
        return false;
    }
    UserEmail_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }  
    }



    function validate_User_Role()
    {
    if(document.getElementById("type").value == "S")
    {
        UserRole_Error.innerHTML='User Role is required.';
        return false;
    }
    UserRole_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }
    
    document.getElementById("type").addEventListener("click", function() {

    if (document.getElementById("type").value != "S") {

        UserRole_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }
    });




    function validatePassword()
    {
    var Password=document.getElementById('pass').value.replace(/^\s+|\s+$/g, "");

    if (Password.length == 0) 
    {
        Password_Error.innerHTML='Password is required.';
        return false;
    }
    else
    {
        const PasswordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!Password.match(PasswordPattern))
    {
        Password_Error.innerHTML='Please Enter Password with Numbers,symbols,upper and lower case (minimum 8 characters)';
        return false;
    }
    Password_Error.innerHTML = '<i class="fa-regular fa-circle-check"></i>';
    return true;
    }  
    }




    function validateForm()
    {
    validateUserEmail();
    validate_User_Role();
    validatePassword();


    if((!validateUserEmail()) || (!validate_User_Role()) ||  (!validatePassword()))
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

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>