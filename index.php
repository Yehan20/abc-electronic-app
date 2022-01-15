<?php  
   ob_start();
   session_start();
   include 'mvc/connection.php';
   include 'mvc/model.php';
   include 'mvc/controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">



</head>
<body>
    <header class="header pt-3 " id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id='navbar'>
          <div class="container">
            <a href="#" class="navbar-brand lead text-dark"><img src="icons/logo.png" class="img-fluid logo d-inline-block me-3" alt="Logo Img"><span style="font-size:clamp(.8rem,1.5vw,1.5rem);" class="text-center fw-bold " id="slider__text"> 
             </span></a>
              <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#togglenav"  aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="togglenav">
                  <ul class="navbar-nav w-100 align-items-start">
                      <li class="nav-item my-3 my-lg-0 ms-lg-auto">
                        <a class="nav-link px-3 btn nav-btn text-white"  aria-current="page" target="_blank" href="login.php">Start Buying</a>
                      </li>
                      <li class="nav-item my-3 my-lg-0 ms-lg-2 ">
                        <a class="nav-link px-3 btn nav-btn text-white" aria-current="page" target="_blank" href="signup.php">Create an Account</a>
                      </li>

                      <li class="nav-item ms-lg-2 ">
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                      <input type="hidden" name="demoName" value="demo">
                    <button type="submit" class="btn nav-link nav-btn px-3 bg-success text-white" name="demo">Demo</button>
                  </form>
                  
                  <?php 
                     if(isset($_POST['demo'])){
                       $demo=$_POST['demoName'];
                       $_SESSION['userName']=$demo;
                       header('location:userHome.php');
                     }
                  ?>
                      </li>
                  </ul>
              </div>
          </div>
        </nav>
        <!-- search here -->
        
    </header>
    
    <div class="full">
    <div class="loader"></div>
    <h3 class="text-center">Loading...</h3>
    </div>
    <!-- main section -->
    <section class="heading mt-0 p-3">
      <div class="container">
         <img style="max-width:100%; height:100px; " src="icons/logo.gif" class=" mx-auto d-block img-fluid "  alt="">
      </div>
  </section>
     
    </div>
       <section class="main user__order p-3  mb-5   ">
    <h1 class="text-center text-dark  search__title ">Products
        

        </h1>
        <div class="container-fluid bg-light p-3  flex-column mb-0 flex-md-row d-flex justify-content-center  align-items-lg-center align-items-center">
     
     
            <div style="border-radius:0.3em;" class="search__aside bg-light pb-0 pt-3 mt-1 align-self-md-end flex-grow-1 ">
             
              
                  <ul style="gap:10px;" class="d-flex ps-0 pb-0 m-0 flex-wrap flex-grow-1 justify-content-center  align-items-end">
                      <li class="list-group item mb-0">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="laptops" class="btn btn-primary btn-lg w-100">Computers</button>
                      </form>
                      </li>
                      <li class="list-group item mb-0">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="mobiles" class="  btn btn-primary btn-lg  w-100 ">Mobiles</button>
                      </form>
                      </li>
                      <li class="list-group item mb-0">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="mouse" class="  btn btn-primary btn-lg  w-100 ">Mouse</button>
                      </form>
                      </li>
                      <li class="list-group item mb-0">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="keyboards" class="btn btn-primary btn-lg  w-100 ">Keyboards</button>
                      </form>
                      </li>
                      <li class="list-group item mb-0">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="others" class="  btn btn-primary btn-lg  w-100 ">Others</button>
                      </form>
                      </li>
                  </ul>
           
            </div>
          </div>

        <div class="container">
           <div class="row mb-3 p-2">
                  <h3 class="ms-4 text-center text-md-start category__text mb-1">Type:</h3>
               <div id="one" class=" column flex-grow-1 d-flex flex-wrap m-0  justify-content-evenly gx-5 col-md-9 pb-3 bg-light">

       
               </div>
           </div>
        </div>
    </section>

    <section class="main-showcase py-3 my-5">
        <h1 class="text-center">Trending</h1>
      <div class="container">
   
         <div class="d-flex flex-wrap justify-content-around align-items-center">
      
         <img id="" style="border-radius:0.3em;" src="https://thumbs.gfycat.com/SinfulLateLeafcutterant-size_restricted.gif" class="swipe-left d-block img-fluid md-w-50 my-3 " alt="...">
         <div id="" class="swipe-right align-self-center  w-100" style="max-width:450px;">
             <h3>High Quality goods in a Cheap Price</h3>
             <p>
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque unde quisquam ut esse molestiae totam odit sunt,!
             </p>
             <a href="login.php" target='_blank' class="btn btn-lg btn-primary">Order Now</a>
         </div>  
         
         </div>
       </div>
    </section>
    <!-- testamonials -->
    <section class="testamonials bg-light py-3">
       <div class="container">
           <h1 class="text-center">Testemonials</h1>
           <div class="owl-carousel owl-theme bg-light mb-3" id="two">
               <div class="item">
                   <img src="people/people.jpeg" class="mb-3" alt="">
                   <h3 class="text-center">Mike</h3>
                   <p class="text-center">Lorem ipsum dolor sit amet</p>
                   <div class="stars mx-auto">
       	 				<span><i class=" text-primary fas fa-star"></i></span>
       	 				<span><i class=" text-primary fas fa-star"></i></span>
       	 				<span><i class=" text-primary fas fa-star"></i></span>
       	 				<span><i class=" text-primary fas fa-star"></i></span>
       	 				<span><i class="  far fa-star"></i></span>
       	 			</div>	
               </div>
               <div class="item">
                <img src="people/people2.jpeg" class="mb-3" alt="">
                <h3 class="text-center">Daneil</h3>
                <p class="text-center">Lorem ipsum dolor sit amet consect!</p>
                <div class="stars">
       	 				<i class="text-primary fas fa-star"></i>
       	 				<i class="text-primary fas fa-star"></i>
       	 				<i class="text-primary fas fa-star"></i>
       	 				<i class="text-primary fas fa-star"></i>
       	 				<i class="far fa-star"></i>
       	 			</div>	
            </div>
            <div class="item">
                <img src="people/people3.jpeg" class="mb-3 img-fluid" alt="">
                <h3 class="text-center mt-3">Peter</h3>
                <p class="text-center">Lorem ipsum dolor sit amet consect!</p>
                <div class="stars">
       	 				<i class=" text-primary fas fa-star"></i>
       	 				<i class=" text-primary fas fa-star"></i>
       	 				<i class=" text-primary fas fa-star"></i>
       	 				<i class=" text-primary fas fa-star"></i>
       	 				<i class="  far fa-star"></i>
       	 			</div>	
            </div>    
           </div>
       </div>
    </section>

    <section class="showcase  my-5 py-3">
        <div class="container">
            <h1 class="text-center text-dark">Why us</h1>
            <div class="grid">
               <div class="items">
                <img src="icons/dollor.png" class=" d-block mx-auto" alt="">
                   <h3 class="text-center">
                       Cheap Price
                   </h3>
                   <p class="text-center ">lorem ispusm set lorem dis<</p>
               </div>
               <div class="items">
               <img src="icons/truck.png" class=" d-block mx-auto" alt="">
                <h3 class="text-center">
                    Fast Delivery
                </h3>
                <p class="text-center ">lorem ispusm set lorem dis</p>
               </div>
               <div class="items">
               <img src="icons/debt.png" class=" d-block mx-auto" alt="">
                <h3 class="text-center">
                    Safe
                </h3>
                <p class="text-center ">lorem ispusm set lorem dis</p>
               </div>
               <div class="items">
               <img src="icons/tick.png" class=" d-block mx-auto" alt="">
                <h3 class="text-center">
                    Verified
                </h3>
                <p class="text-center ">lorem ispusm set lorem dis</p>
               </div>
               <div class="items">
                <img src="icons/people.png" class=" d-block mx-auto"  alt="">
                <h3 class="text-center">
                    User Friendly
                </h3>
                <p class="text-center ">lorem ispusm set lorem dis</p>
               </div>
              
            </div>
            <div class="grid mb-3">
                <div class="social-media p-3">
                    <h3 class="text-center">
                        Stay! Connteced! 
                    </h3>
                    <hr>
                    <ul class="list-group list-group-horizontal d-flex justify-content-evenly">
                        <li class="list-group-item"><a href="#" class="social__links"><i class="fab fa-facebook fa-2x"></i></a></li>
                        <li class="list-group-item"><a href="#" class="social__links"><i class="fab fa-twitter fa-2x"></i></a></li>
                        <li class="list-group-item"><a href="#" class="social__links"><i class="fab fa-instagram fa-2x"></i></a></li>
                      </ul>
                </div>
                <div class="quicklinks p-3">
                    <h3 class="text-center">quicklinks</h3>
                    <hr>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item "><a href="index.php" class="link">Home</a></li>
                        <li class="list-group-item "><a href="signUp.php" target="_blank" class="link">Sign Up Now</a></li>
                        <li class="list-group-item "><a href="login.php" target="_blank" class="link">Login</a></li>
                     
                      </ul>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item "><span class="fw-bold">Email:</span>abc@gmail.com</li>
                        <li class="list-group-item "><span class="fw-bold">Contact:</span>(5555)-55-555</li>
                        <li class="list-group-item "><span class="fw-bold">Adress:</span>24th new St Carlifornia</li>
                     
                      </ul>
                </div>
            </div>
        </div>
    </section>

    <footer class="position-relative footer bg-light py-5 px-3 text-dark">
      <div class="container">
          <h3 class="text-center">Copyright © ABC All rights reserved</h3>
          <hr>
          <p class="text-center">Designed By Yehan</p>
      </div>
      <a href="#" class="text-dark position-absolute bottom-0 end-0 p-5">
      <i class="fas fa-arrow-circle-up"></i>
       </a>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js" integrity="sha512-zKaK6G2LZC5YZTX0vKmD7xOwd1zrEEMal4zlTf5Ved/A1RrnW+qt8pWDfo7oz+xeChECS/P9dv6EDwwPwelFfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 
    <script>
        
        $(document).ready(function(){
          // Add smooth scrolling to all links
          $("a").on('click', function(event) {
        
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
              // Prevent default anchor click behavior
              event.preventDefault();
        
              // Store hash
              var hash = this.hash;
        
              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top
              }, 800, function(){
        
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });

        var one=$('#one');
        var two=$('#two');
   

       two.owlCarousel({
           
           loop: true,
           rewind: true,
           autoplay:true,
           dots:true,
           autoplayTimeout:5000,
           nav:false,
           margin:30,
           responsive:{
               0:{
                   items:1
               },
               600:{
                   items:1
               },
               1000:{
                   items:1
               }
           }
       })
       
       //typing effect
       if ($("#slider__text").length == 1) {
              
              var typed_strings =" , Hello User, Weclome to ABC electornics App,"
    
              var typed = new Typed("#slider__text", {
                  strings: typed_strings.split(", "),
                  typeSpeed: 200,
                  loop: true,
                  backDelay: 900,
                  backSpeed: 30,
                  cursorChar: ' ',
                  startDelay:2000
              });
          }




    </script>

    <script src="js/animate.js"></script>
    <script src="js/ajax.js"></script>

    
</body>
</html>