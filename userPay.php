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
    <title>User Pay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">
  
    
</head>
<body>
    <header class="header  pt-3" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id='navbar'>
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
    <main class="dashboard my-5 py-5 bg-light">
        <div class="container">
          <h1 class="text-center">Mange your Orders</h1>
           <div class="row my-5">
             <div class="column mt-3  flex-grow-1 d-flex flex-wrap justify-content-around col-md-10  bg-light">
               <p class="text-center lead flex-grow-1">Please Complete this orders</p>
                 <table class="table ">
                    <thead class="bg-dark text-white">
                      <tr>
                         
                         <th>Name</th> 
                         <th>Amount</th>
                         <th>Price</th>
                         <th class="ms-3">Manage</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                      <?php  
                             $username;

                             $isset= isset($_POST['user']);

                             if($isset){
                               $username= $_POST['user'];
                             }

                            $isUsername=isset($_SESSION['userName']);
       
                            if($isUsername){
                              $username= $_SESSION['userName'];
                            } 
                          $order= new orderView();
                          $result= $order->viewCompleted($username,"ordered");                      
                            while($row=$result->fetch_assoc()){?>
                           
                            <tr class="">
                            
                              <td><?php echo $row['name'];?></td>
                              <input type="hidden" name="orderId"  value="<?php echo $row['orderid']; ?>">
                              <td><?php echo $row['amount'];?></td>
                              <td>$:<?php echo $row['price'];?></td>
                              <td><button id="payNow" class="btn bg-primary text-white" data-bs-toggle="modal" data-bs-target="#buyOrder">Pay Now</button>
                                <button class="btn bg-danger text-white" data-bs-toggle="modal" data-bs-target="#cancelOrder" id="cancelOrderBtn">Cancel</button>
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
 
    
    <footer class="footer bg-light mt-auto py-5 px-3 text-dark">
      <div class="container">
          <h3 class="text-center">Copyright © ABC All rights reserved</h3>
          <hr>
          <p class="text-center">Designed By Yehan</p>
      </div>
    </footer>


    <div class="modal fade" id="buyOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Pay Your Order</h5>
             
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <div class="mb-3">
                     <h3 class="lead text-center">Order Summary</h3>
                     <p>Name:<span class='itmName'></span></p>
                     <p>Items Orders:<span class='itmAmt'></span></p>
                     <p>Total Price :<span class='itmPrice'></span></p>
                     <input type="hidden" name="amount" id="amtPay">
                    </div>

                   <hr>
                   <div class="mb-3">
                    <label for="" class="form-label">Card Type</label>
                    <select id="" class="form-select pe-5">
                        <option value="Master">Master</option>
                        <option value="Visa">Visa</option>
                              
                      </select>
                    
                  </div>
                  <input type="hidden" name="orderId" id="oid">
                 
                   <div class="mb-3">
                    <label for="" class="form-label">Card Holders Name</label>
                    <input type="text" class="form-control" id="cardName" required>
                    <p class="text-danger err"></p>
                    
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Account No (8 Digits)</label>
                    <input type="text" class="form-control" id="cardNo" required>
                    <p class="text-danger err"></p>
                  </div>
                  
                  <div class="mb-3">
                    <label for="" class="form-label">Security Key (3 digits)</label>
                    <input type="number" name="ssk" class="form-control" id="ssk" required>
                    <p class="text-danger err"></p>
                  </div>
                

                  <div class="modal-footer">
                      <button type="submit" name="payNow" id="buyNow" class="btn btn-primary">Buy </button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['payNow'])){
                      $price=$_POST['amount'];
                      $orderId=$_POST['orderId'];
                      $payment = new  paymentView();  
                      $payment->payView($orderId,$price);
                      $payment->updatePayment($orderId);
                     
                    }
                    
                ?>

          </div>
     
        </div>
      </div>
    </div>

    <!-- cancel order model -->
    <div class="modal fade" id="cancelOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Cancel Order</h5>
             
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
               <input type="hidden" name="quantity" id="quantity">
                <input type="hidden" name="itemName" id="itmName">
                <input type="hidden" name="itemOrderId" id="coid">
                 <p>Are Your Sure You want to cancel The Order</p>
                  <div class="modal-footer">
                      <button type="submit" name="cancelOrder" class="btn btn-danger">Yes </button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    </div>
                </form>
          </div>
          <?php
            if(isset($_POST['cancelOrder'])){
              $orderid=$_POST['itemOrderId'];
              $amount=$_POST['quantity'];
              $name=$_POST['itemName'];
              $cancel = new paymentView();
              $cancel->cancelView($orderid,$amount,$name);
            }

             
          ?>
     
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='js/operations.js'></script>

</body>
</html>