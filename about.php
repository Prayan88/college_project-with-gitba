<?php
include('./database/connect.php');
include('./functions/common_functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EliteTimepieces Home Page</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <!-- <link rel="stylesheet" href="./assets/css/about.css" /> -->

</head>

<body>
  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">EliteTimepieces</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./products.php">Products</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./about.php">About</a>                    
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact</a>
                    </li>
                    <?php
                        if(isset($_SESSION['username'])){                            
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/profile.php'>My Account</a>
                        </li>";
                        }
                        else{
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
                        </li>";
                        }
                    ?>
                </ul>
                <!-- <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form> -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="./cart.php"><svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 27C11.5523 27 12 26.5523 12 26C12 25.4477 11.5523 25 11 25C10.4477 25 10 25.4477 10 26C10 26.5523 10.4477 27 11 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M25 27C25.5523 27 26 26.5523 26 26C26 25.4477 25.5523 25 25 25C24.4477 25 24 25.4477 24 26C24 26.5523 24.4477 27 25 27Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3 5H7L10 22H26" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 16.6667H25.59C25.7056 16.6667 25.8177 16.6267 25.9072 16.5535C25.9966 16.4802 26.0579 16.3782 26.0806 16.2648L27.8806 7.26479C27.8951 7.19222 27.8934 7.11733 27.8755 7.04552C27.8575 6.97371 27.8239 6.90678 27.7769 6.84956C27.73 6.79234 27.6709 6.74625 27.604 6.71462C27.5371 6.68299 27.464 6.66661 27.39 6.66666H8" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            
                            <span class="d-none">
                                Total Price is: 
                                <?php
                                total_cart_price();
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" class="d-flex align-items-center gap-1" href="#">
                            <svg width="28" height="28" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M24 27V24.3333C24 22.9188 23.5224 21.5623 22.6722 20.5621C21.8221 19.5619 20.669 19 19.4667 19H11.5333C10.331 19 9.17795 19.5619 8.32778 20.5621C7.47762 21.5623 7 22.9188 7 24.3333V27" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 14C18.9853 14 21 11.9853 21 9.5C21 7.01472 18.9853 5 16.5 5C14.0147 5 12 7.01472 12 9.5C12 11.9853 14.0147 14 16.5 14Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <?php
                                if(!isset($_SESSION['username'])){
                                    echo "<span>
                                    Welcome guest
                                </span>";
                            }else{
                                    echo "<span>
                                    Welcome ".$_SESSION['username']. "</span>";
                                }
                                ?>
                        </a>
                    </li>
                    <?php
                    if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/user_login.php'>
                            Login
                        </a>
                    </li>";
                }else{
                        echo "<li class='nav-item'>
                        <a class='nav-link' href='./users_area/logout.php'>
                            Logout
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
<div class="content-wrapper">
	    <div class="container">
	 

  <h1><u>About Us:</u></h1><br>
  <p>Welcome to EliteTimepieces, your premier destination for exceptional timepieces. We are passionate about the art of watchmaking and are dedicated to providing a curated selection of the finest watches for every style and need.
At EliteTimepieces, we understand that a watch is more than just a time-telling device; it's a statement of elegance, precision, and personal taste. Our collection includes a diverse range of watches to suit every preference:
                </p>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

<!-- Analog Watches: Embrace the classic charm and sophisticated craftsmanship of our analog watches. Each piece is meticulously designed to offer timeless elegance and reliable performance.
<br>
Smart Watches: Stay connected and on top of your game with our innovative smart watches. Combining cutting-edge technology with stylish designs, these watches are perfect for those who want to blend functionality with modern aesthetics.
<br>
Hybrid Watches: Discover the best of both worlds with our hybrid watches. These timepieces seamlessly integrate traditional analog features with smart functionalities, providing a unique and versatile experience.
<br>
Wall Clocks: Enhance your living spaces with our stunning collection of wall clocks. From contemporary designs to vintage-inspired pieces, our wall clocks are crafted to add a touch of sophistication and style to any room.
<p><br> -->
<!-- At EliteTimepieces, we are committed to delivering exceptional quality and unparalleled customer service. Our team of experts is always ready to assist you in finding the perfect watch that matches your style and needs. We believe in building lasting relationships with our customers by ensuring satisfaction with every purchase.
Thank you for choosing EliteTimepieces. Explore our collection today and find the perfect timepiece that defines your elegance and style.
                </p> -->






</div>
</div>
     
      <!-- Start Footer -->
      <footer class="footer primary-bg text-light p-3">
        <div class="container">
           
                
    
   <!-- Contact Us -->
    <div class="col-lg-3 col-md-6 col-sm-12">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                       
                    <a href="contact.php" style="color: white;"><li><i class="bi bi-envelope-fill"></i> queriesatelite@gmail.com</li></a>
                        <h6>Follow Us</h6>
                    </ul>
                   
                   
                </div>
</div>

                
             
                
            </div>
            <div class="text-center mt-3">
                <span>All CopyRight &copy;2024</span>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <script src="./assets/js/bootstrap.bundle.js"></script>
</body>
</html>

     <!-- End Footer -->

    <script src="./assets/js/bootstrap.bundle.js"></script>
</body>

</html> 