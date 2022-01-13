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
    <title>User Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">
    
</head>
<body>

      <header class="header  bg-light  pt-3" id="header">
        <nav class="navbar bg-light navbar-expand-lg navbar-light" id='navbar'>
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

        
  
    
    <section class="main user__order p-3  my-5   ">
    <h2 class="text-center text-dark  search__title ">Products
        

        </h2>
        <div class="container-fluid bg-light pt-3  flex-column mb-0 flex-md-row d-flex justify-content-center  align-items-lg-center align-items-center">
     
     
            <div style="border-radius:0.3em;" class="search__aside bg-light pt-3 mt-1 align-self-md-end flex-grow-1 ">
             
              
                  <ul style="gap:10px;" class="d-flex mb-0 flex-wrap flex-grow-1 justify-content-center  align-items-end">
                      <li class="list-group item mt-0">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="laptops" class=" btn  btn-lg btn-primary w-100 ">Computers</button>
                      </form>
                      </li>
                      <li class="list-group item">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="mobiles" class="  btn btn-lg btn-primary w-100 ">Mobiles</button>
                      </form>
                      </li>
                      <li class="list-group item">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="mouse" class="  btn btn-lg btn-primary w-100 ">Mouse</button>
                      </form>
                      </li>
                      <li class="list-group item">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="keyboards" class="btn btn-lg btn-primary w-100 ">Keyboards</button>
                      </form>
                      </li>
                      <li class="list-group item">
                      <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="others" class="  btn btn-lg btn-primary w-100 ">Others</button>
                      </form>
                      </li>
                  </ul>
           
            </div>
          </div>

        <div class="container">
           <div class="row pt-0 mb-3">

               <div class="column flex-grow-1 d-flex flex-wrap m-0  justify-content-evenly gx-5 col-md-9 py-3 bg-light">

                  <?php 
                     
                     $admin = new adminView();
                     $res=$admin->productView('laptops');
                     
                     if(isset($_GET['laptops'])){
                        $res=$admin->productView('laptops');
                     }
                     
                     if(isset($_GET['mobiles'])){
                        
                      $res=$admin->productView('mobiles');
                     }
                     if(isset($_GET['keyboards'])){
                        
                      $res=$admin->productView('keyboards');
                     }

                     if(isset($_GET['mouse'])){
                        
                      $res=$admin->productView('mouse');
                     }

                     if(isset($_GET['others'])){
                        
                      $res=$admin->productView('others');
                     }
                     

                              
                     while($result=$res->fetch_assoc()){?>
                      
                      
                     <div  class=" d-flex flex-direction-column flex-grow-1 card ms-lg-2   py-3 px-2" id="usersCard">
                     <h5 style="visibility:hidden;" class="card-title fw-bold"><?php echo $result['no']; ?></h5>
                     <img src="<?php echo $result['path']; ?>" class="card-img-top img-fluid" alt="">
                     <div class="card-body text-center ">
                     <input type="hidden" name="types" id="hideTypes" value="<?php echo $result['type']; ?>">
                    <h5 class="card-title fw-bold"><?php echo $result['name']; ?></h5>
                    <p class="card-text mb-2"><?php echo $result['description']; ?></p>
                    <p class="card-details text-secondary mt-auto">
                       Avialble in Stock - <?php echo $result['stock'];  ?>
                    </p>
                   
                    <h3><span>Price:</span>$<?php echo $result['price']; ?></h3>
                    <button style="min-width: 200px !important;" data-bs-toggle="modal" data-bs-target="#addCart" id="cart"  class="btn  btn-primary  text-light d-block w-100  mt-3">Add to Cart</button>
                 
                </div>
              </div>
                    
                    
                 <?php }
                 
                   
               ?>
               </div>
           </div>
        </div>
    </section>
    
     <footer class="footer bg-light mt-auto py-5 px-3 text-dark">
      <div class="container">
          <h3 class="text-center">Copyright © ABC All rights reserved</h3>
          <hr>
          <p class="text-center">Designed By Yehan</p>
      </div>
    </footer>

    <div class="modal fade" id="addCart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Order Item</h5>
               
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post" >
                    <div class="mb-3">
                        <p id="itemNo"><span>Item No:</span></p>
                      </div>

                   
                    <div class="mb-3">
                        <p id="itemName"><span>Item Name:</span>Test</p>
                      
                    </div>
                    <hr>
                    <div class="mb-3">
                       <p id="itemDesc"><span>Item Description</span> - Lorem ipsum dolor sit amet consectetur adipisicinm?</p>
                    </div>
                     <hr>
                    <div class="mb-3">
                       <p id="itemPrice"><span>Price :</span>$124</p>
                      </div>
                     <hr>
                     <input type="hidden" name="itemName" id="uitemName">
                     <input type="hidden" name="itemType" id="uitemType">
                     <input type="hidden" name="itemPrice" id="uitemPrice">
                     <input type="hidden" name="username" value="<?php 
                                    $isset= isset($_POST['user']);
                                    if($isset){
                                      echo $_POST['user'];
                                    }
                                   $isUsername=isset($_SESSION['userName']);
              
                                   if($isUsername){
                                     echo $_SESSION['userName'];
                                   }
                     ?>">
                     
                      
                    <div class="mb-3">
                        <label for="" class="form-label">Amount </label>
                        <input type="number" name="orderAmt" class="form-control" id="newStock" required>
                        <div class="amountErr text-danger my-2"></div>
                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Address </label>
                       <textarea name="address" class="form-control" id="adress" cols="10" rows="2" style="resize:none;" required></textarea>
                      </div>

                    
                  
                    <div class="modal-footer">
                        <button type="submit" id="orderBtn" name="orderBtn" class="btn btn-primary">Add to Cart</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>
                  </form>
                  <?php 
                      
                      if(isset($_POST['orderBtn'])){
                          $username=$_POST['username'];
                          $type=$_POST['itemType'];
                          $name=$_POST['itemName'];
                          $price=$_POST['itemPrice'];
                          $amount=$_POST['orderAmt'];
                          $address=$_POST['address'];

                          $newPrice=$amount * $price;
                          
                          //$name,$type,$price,$amount,$username
                          $order= new orderView();
                          $order->addOrderView($name,$type,$newPrice,$amount,$username,$address);
                      }
                     
                  ?>
            </div>
       
          </div>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='js/operations.js'></script>


</body>
</html>