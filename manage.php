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
    <title>Manage Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script defer src='js/operations.js'></script>
    <link rel="icon" href="icons/icon.png" type="image/x-icon">
    
</head>
<body>

      <header class="header  pt-3" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id='navbar'>
          <div class="container">
              <a href="#" class="navbar-brand lead text-light"><img src="icons/logo.gif" class="img-fluid logo" alt="Logo Img"></a>
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
                          if($amt!=0)
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
           <h1 class="text-center">Manage Your Products</h1>
           <div class="row my-1">
           
             <div class="column   flex-grow-1 d-flex flex-wrap justify-content-around col-md-10  bg-light">
                <ul class="list-group my-3 d-flex flex-wrap justify-content-around align-items-center flex-grow-1 bg-light text-dark w-100 list-group-horizontal">
                    <li class="list-group-item ">
                    <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                    <button type="submit" id="type" name="laptops" class="  btn  btn-lg btn-light text-dark" href="">Computers</button>
                  </form>
                    </li>

                    <li class="list-group-item">
                        <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="mobiles" class="  btn btn-lg btn-light text-dark">Mobiles</button>
                      </form>
                    </li>

                    <li class="list-group-item">
                        <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="keyboards" class="  btn btn-lg btn-light text-dark">Keyboards</button>
                      </form>
                    </li>

                    <li class="list-group-item">
                        <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="mouse" class="  btn btn-lg btn-light text-dark">Mouse</button>
                      </form>
                    </li>

                                        
                    <li class="list-group-item">
                        <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="GET">
                        <button type="submit" id="type" name="others" class="  btn btn-lg btn-light text-dark">Others</button>
                      </form>
                    </li>


                    <li class="list-group-item ms-lg-auto"><button class="btn btn-lg bg-primary text-white"
                        data-bs-toggle="modal" data-bs-target="#addItemModel">New Item</button></li>
                  </ul>
                   
                      <?php 
                     
                         $admin = new adminView();
                         $res=$admin->productView('laptops',false);
                         if(isset($_GET['computers'])){
                            
                          $res=$admin->productView('laptops',false);
                         }
                         if(isset($_GET['mobiles'])){
                            
                          $res=$admin->productView('mobiles',false);
                         }
                         if(isset($_GET['keyboards'])){
                            
                          $res=$admin->productView('keyboards',false);
                         }

                         if(isset($_GET['mouse'])){
                            
                          $res=$admin->productView('mouse',false);
                         }

                         if(isset($_GET['others'])){
                            
                          $res=$admin->productView('others',false);
                         }
                         

                                  
                         while($result=$res->fetch_assoc()){?>
                         
                         <div class="flex-grow-1  card  ms-lg-3  py-3 px-2" id="card">
                         <img src="<?php echo $result['path']; ?>" class="card-img-top img-fluid" alt="">
                         <div class="card-body text-center">
                         <h5 class="card-title fw-bold"><span class="text-scecondary lead">No:</span><?php echo $result['no']; ?></h5> 
                        <h5 class="card-title fw-bold"><?php echo $result['name']; ?></h5>
                        <p class="card-text mb-2"><?php echo $result['description']; ?></p>
                        <p class="card-details mt-auto text-secondary">
                           Avialble in Stock - <?php echo $result['stock'];  ?>
                        </p>
                       
                        <h3><span>Price:</span>$<?php echo $result['price']; ?></h3>
                        <div>
                        <button class="btn btn-warning my-2" id="updateBtn" data-bs-toggle="modal" data-bs-target="#updateModel">Update</button>
                        <button class="btn btn-danger" id="deleteBtn"  data-bs-toggle="modal" data-bs-target="#deleteModel">Delete</button>
                        </div>

                     
                    </div>
                  </div>
                        
                        
                     <?php }
                     
                       
                   ?>

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

    <!-- models update model -->
    <div class="modal fade" id="updateModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Update Item</h5>
               
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  <input type="hidden" id="number" name="id">
                    <div class="mb-3">
                      <label for="" class="form-label">New Name</label>
                      <input type="text" class="form-control" id="newName" name="newName" required>
                      
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">New Description</label>
                      <textarea style="resize:none;"  class="form-control" name="newDescription" id="newDescription" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">New Price ($)</label>
                        <input type="number" name="newPrice" class="form-control" id="newPrice" required>
                      </div>

                      
                    <div class="mb-3">
                        <label for="" class="form-label">Add Stock </label>
                        <input type="number" name="newStock" class="form-control" id="newStock">
                      </div>


                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updateBtn" class="btn btn-success">Update</button>
                      </div>
                  </form>
            </div>
       
          </div>
        </div>
      </div>
       <?php 
           if(isset($_POST['updateBtn'])){

               $id=$_POST['id'];
               $newName=$_POST['newName'];
               $newDesc=$_POST['newDescription'];
               $newPrice=$_POST['newPrice'];
               $newStock=$_POST['newStock'];
   
               $admin = new adminView();
               $admin->updateView($id,$newName,$newDesc,$newPrice,$newStock);

           }
           
       ?>
      <!-- delete model -->
      <div class="modal fade " id="deleteModel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmation</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
                   <input type="hidden" id="delnumber" name="id">
                   <p>Are Sure you want to delete this Item.</p>
                   <div class="modal-footer">
              <button type="submit" name="deleteNow" class="btn btn-primary">Yes</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
             
            </div>
              </form>
      
             
            </div>
         
          </div>
        </div>
      </div>

      <!-- add new Items model -->
      <div class="modal fade" id="addItemModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Add Item</h5>
               
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST" enctype="multipart/form-data">
       

                    <div style="gap:10px;" class="d-flex flex-wrap justify-content-between">
                      
                    <div class="mb-3 flex-grow-1">
                        <label for="" class="form-label">Type</label>
                        <select id="" name="category" class="form-select pe-5">
                            <option value="laptops">Computer</option>
                            <option value="keyboards">Keyboards</option>
                            <option value="mouse">Mouse</option>
                            <option value="mobiles">Mobile</option>
                            <option value="others">Other</option>
                          
                          </select>
                        
                      </div>
                      <div class="mb-3  flex-grow-1  flex-md-grow-0">
                      <label for="" class="form-label">Name</label>
                      <input type="text" name='name' class="form-control" id="newName" required>
                      
                    </div>

                    </div>
           
                 
                    <div style="gap:10px;" class="d-flex flex-wrap">
                    <div class="mb-3 flex-grow-1">
                        <label for="" class="form-label"> Price ($)</label>
                        <input type="number"  name='price' class="form-control" id="newPrice" required>
                      </div>
    
                    <div class="mb-3 flex-grow-1">
                        <label for="" class="form-label">Stock </label>
                        <input type="number" name='stock' class="form-control" id="newStock" required>
                      </div>

                    </div>
                    
                    <div style="gap:10px" class="d-flex flex-wrap">

                    <div class="w-100 mb-3">
                      <label for="" class="form-label">Description</label>
                      <textarea style="resize:none;" name='desc' class="form-control" id="newDescription" required></textarea>
                    </div>

                    <div class=" w-100 mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" name='file' class="form-control" id="newImg" required>
                      </div>

                  </div>

             

                  
                    <div class="modal-footer">
                        <button type="submit" name="add" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>
                  </form>
            </div>
    
          </div>
        </div>
      </div>
      <?php 
               if(isset($_POST['add'])){
                $type=$_POST['category'];
                $name=$_POST['name'];
                $description=$_POST['desc'];
                $price=$_POST['price'];
                $stock=$_POST['stock'];
                
                
                $file=$_FILES['file'];
            
                $fileName=$_FILES['file']['name'];
                $fileTemp=$_FILES['file']['tmp_name']; // temporary location to the next path
                $fileErr=$_FILES['file']['error']; // check for the the errors
                $fileType=$_FILES['file']['type']; // type weather its jpg,jpeg,png
                $fileSize=$_FILES['file']['size']; // size
            
                $tes=$_POST['category'];
                $fileExt= explode('.',$fileName);
                $fileExt= strtolower(end($fileExt));

                $allowedExtenstion=array('png','jpeg','jpg');

                if(in_array($fileExt,$allowedExtenstion)){
                       
                  if($fileErr===0){

                      if($fileSize<10000000){
                         
                        $uniqName = uniqid('',true).'.'.$fileExt;
                        $path='images/'.$tes.'/'.$uniqName;
                       
                        move_uploaded_file($fileTemp,$path);
                       
                        $admin = new adminView();
                        $admin->addProductView($type,$name,$description,$price,$stock,$path);
                       
                      }

                  }

                }

  
            
             
              }
      ?>

      <?php 
         if(isset($_POST['deleteNow'])){
              $num= $_POST['id'];
              $admin= new adminView();
              $admin->deleteView($num);
         }
      ?>


</body>
</html>