<?php 
     ob_start();
     session_start();
     include 'mvc/connection.php';
     include 'mvc/model.php';
     include 'mvc/controller.php';
     if(!isset($_SESSION['userName'])){
      header("location:login.php"); // if its just aceesed from wamp
     } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">
    
</head>
<body>

      <header class="header pt-3" id="header">
        <nav class="navbar navbar-expand-lg navbar-dark" id='navbar'>
          <div class="container">
     
              <a href="#" class="navbar-brand lead text-light"><img src="icons/logo.gif" class="img-fluid logo" alt="Logo Img"></a>
              <ul class="navbar-nav flex-row px-3">
                <li class="nav-item me-3">
                    <a class="btn bg-primary text-white" href="userHome.php">Home</a>
                  </li>
                <li class="nav-item">
                 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <button type="submit" class="btn bg-danger text-white" name="logout">Sign out</button>
                  </form>
                  
                  <?php 
                     if(isset($_POST['logout'])){
                       session_destroy();
                       header('location:index.php');
                     }
                  ?>
                </li>
              </ul>
       
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="second-nav container">
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#togglenav"  aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
    
                  <div class="collapse navbar-collapse" id="togglenav">
                  <ul style="gap:10px;" class="navbar-nav justify-content-start w-100 align-items-center">
                        <li class="nav-item my-3 ">
                          <a class="nav-link px-3 btn nav-btn bg-primary  text-light "  aria-current="page" href="userOrder.php">Order Items</a>
                        </li>
                        <li class="nav-item position-relative ">
                          <a class="nav-link px-3 btn nav-btn  bg-primary  text-light " aria-current="page" href="userPay.php">Manage Orders</a>
                          <h4 style="border-radius:20%; width:10%; left:-.1em; top:-0.5em;" class="position-absolute number bg-light text-dark">
                                <?php  
                                       $isset= isset($_POST['user']);
                                       if($isset){
                                         $username=$_POST['user'];
                                       }
                                      $isUsername=isset($_SESSION['userName']);
                 
                                      if($isUsername){
                                        $username= $_SESSION['userName'];
                                    }
                                 
                                 
                              
                              $order= new orderView();
                              $amt=0;
                              $result= $order->viewCompletedOrders($username,'ordered');                      
                                while($row=$result->fetch_assoc()){?>
                                      
                                <?php 
                                $amt++;                
                                ?>      
                          <?php
                          }
                          if($amt!=0)
                          echo $amt;
                          ?>  
                        
                        </h4>
                        </li>
                        <li class="nav-item my-3 ">
                            <a class="nav-link px-3 btn nav-btn bg-primary text-light"  aria-current="page" href="userHistory.php">View History</a>
                          </li>
                      
                    </ul>
                </div>
              </div>   
        </nav>
    </header>
    <main class="dashboard mb-3 py-3 bg-light">
        <div class="container">
           <h1 class="text-center">User dashboard</h1>
        
             <div class="col bg-white d-flex flex-column align-items-center">
                <h3 class="text-center mt-3">Welcome User <?php
                      $isset= isset($_POST['user']);
                      if($isset){
                        echo $_POST['user'];
                      }
                     $isUsername=isset($_SESSION['userName']);

                     if($isUsername){
                       echo $_SESSION['userName'];
                     }
                
                ?></h3>
                <img src="icons/userProfile.svg" class="d-block mb-3 img-fluid  w-50" alt="">
                <div style="max-width:400px;">
                <h3 class="lh-sm lead my-3 text-center" id="slider-text"></h3>
                </div>
               
             </div>
           </div>
        </div>
    </main>
    
      
    <footer class="footer bg-light mt-auto py-5 px-3 text-dark">
      <div class="container">
          <h3 class="text-center">Copyright © ABC All rights reserved</h3>
          <hr>
          <p class="text-center">Designed By Yehan</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.0/typed.min.js" integrity="sha512-zKaK6G2LZC5YZTX0vKmD7xOwd1zrEEMal4zlTf5Ved/A1RrnW+qt8pWDfo7oz+xeChECS/P9dv6EDwwPwelFfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>

           
          if ($("#slider-text").length == 1) {
              
              var typed_strings =",Hello User,Weclome again ,Here you can order your items then you can pay them or cancel  when you order an item the number appears near the manage order button "
    
              var typed = new Typed("#slider-text", {
                  strings: typed_strings.split(","),
                  typeSpeed: 50,
                  loop: true,
                  backDelay: 900,
                  backSpeed: 30,
                  cursorChar: ' ',
              });
          }


    </script>
</body>
</html>