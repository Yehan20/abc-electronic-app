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
    <title>Summary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">
    
</head>
<body>

<header class="header  pt-3" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id='navbar'>
          <div class="container">
              <a href="#" class="navbar-brand lead text-light"><img src="icons/logo.png" class="img-fluid logo" alt="Logo Img"></a>
              <ul class="navbar-nav flex-row px-3">
                <li class="nav-item me-3">
                    <a class="btn bg-primary text-white" href="adminHome.php">Home</a>
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
                        <a class="nav-link px-3 btn nav-btn bg-primary  text-light "  aria-current="page" href="userOrder.php?laptops=">Manage Products</a>
                      </li>
                      <li class="nav-item position-relative ">
                        <a class="nav-link px-3 btn nav-btn  bg-primary  text-light " aria-current="page" href="process.php">Process Orders</a>
                        <h4 style="border-radius:20%; width:10%; left:-.1em; top:-0.5em;" class="position-absolute number bg-light">
                                <?php  
                               
                              $order= new orderView();
                              $amt=0;
                              $result= $order->veiwAllOrders('paid');                       
                                while($row=$result->fetch_assoc()){?>
                                      
                                <?php 
                                $amt++;                
                                ?>      
                          <?php
                          }
                          if($amt!=null)
                          echo $amt;
                          ?>  
                        
                        </h4>
                      </li>
                      <li class="nav-item my-3 ">
                          <a class="nav-link px-3 btn nav-btn bg-primary text-light"  aria-current="page" href="summary.php">Profit Summary</a>
                        </li>
                    
                  </ul>
              </div>
            </div>   
      </nav>
    </header>
    <main class="dashboard my-5 py-5 bg-light">
        <div class="container">
           <h1 class="text-center">Profit and Summary <span><i class="fas fa-chart-line"></i></span></h1>
           <div class="row my-5">
            
             <div class="column   d-flex flex-wrap justify-content-center col bg-light">
                 <h3 class="text-center my-3 flex-grow-1 w-100">Summary of Buisness</h3>
                  <div>
                      <p class="lead text-center">Totoal Earned $:
                      <span class="fw-bold">
                                    
                      <?php  
                         
                         $order= new paymentView();
                         $amt=0;
                         $result= $order->summaryView();                      
                           while($row=$result->fetch_assoc()){?>
                                
                          <?php 
                           $amt+=$row['paid'];                 
                           ?>      
                     <?php
                     }
                     echo $amt;
                     ?>                        
                      </span>
                    </p>
                      <p class="lead text-center">Total Payments Done<span class="fw-bold">:

                      <?php  
                         
                         $order= new paymentView();
                         $amt=0;
                         $result= $order->summaryView();                      
                           while($row=$result->fetch_assoc()){?>
                                
                          <?php 
                           $amt++;                
                           ?>      
                     <?php
                     }
                     echo $amt;
                     ?>  
                      </span>
           
                      </p>
                      
                  </div>
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
</body>
</html>