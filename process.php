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
    <title>Manage Orders</title>
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
                        <a class="nav-link px-3 btn nav-btn bg-primary  text-light "  aria-current="page" href="manage.php">Manage Products</a>
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
           <h1 class="text-center">Processing Order</h1>
           <div class="row my-5">                
                <div class="column   flex-grow-1 d-flex flex-wrap justify-content-around col-md-10  bg-light table-responsive">
                <h3 class="text-center mb-4 ">Please Complete this orders</h3>
                <table class="table   table-responsive w-100">
                    <thead class="bg-dark text-white w-100">
                      <tr>
                         <th>Orderid</th>
                         <th>Name</th> 
                         <th>Items</th>
                         <th>Paid</th>
                         <th>Address</th>
                         <th>Confirm</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                         
                          $order= new orderView();

                          $result= $order->veiwAllOrders('paid');                      
                            while($row=$result->fetch_assoc()){?>
                           
                            <tr class="">
                            <td><?php echo $row['orderid'];?></td>
                              <td><?php echo $row['name'];?></td>
                              <input type="hidden" name="orderId"  value="<?php echo $row['orderid']; ?>">
                              <td><?php echo $row['amount'];?></td>
                              <td>$:<?php echo $row['price'];?></td>
                              <td><?php echo $row['address'];?></td>
                              <td>
                                <button class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#confirmModel" id="completeBtn">Complete</button>
                              </td>
                          </tr>

                      <?php
                      }
                      ?>  
                      
                
               
                    </tbody>
                  </table>
                </div> 

       

             </div>
           </div>
        </div>
    </main>
    
     <footer class="footer bg-light text-dark mt-auto py-5 px-3 ">
      <div class="container">
          <h3 class="text-center">Copyright © ABC All rights reserved</h3>
          <hr>
          <p class="text-center">Designed By Yehan</p>
      </div>
    </footer>
    
    <div class="modal fade" id="confirmModel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Assingn Driver</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p>Select the Driver For the Order</p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <select id="" name="Driver" class="form-select pe-5">
              <option value="James">James</option>
              <option value="Ryan">Ryan</option>
              <option value="Mike">Mike</option>
              <option value="Martin">Martin</option>
              <option value="Oliver">Oliver</option>
                          
          </select>
          <input type="hidden" name="orderid" id="oderidDriver">

          <div class="modal-footer">
            <button type="submit" name="sendOrder" class="btn btn-primary">Send Order</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
           
          </div>

          </form>

         
          </div>
        

         
        </div>
      </div>
      <?php 
        if(isset($_POST['sendOrder'])){
          $orderId=$_POST['orderid'];
          $order= new orderView();
          $order->assingnDriverView($orderId);
        }
        ?>
    </div>
 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='js/operations.js'></script>

</body>
</html>