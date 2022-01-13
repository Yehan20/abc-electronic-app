<?php 
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">

</head>
<body>
    <header class="header pt-3" id="header">
        <nav class="navbar navbar-expand-lg navbar-light" id='navbar'>
          <div class="container">
            <a href="index.php" class="navbar-brand lead text-light"><img src="icons/logo.gif
            " class="img-fluid logo" alt="Logo Img"></a>  
          </div>
        </nav>
        <!-- search here -->

    </header>
    <!-- main section -->
    <section class="login bg-light my-5 py-5">
        <div class="container">
           <h1 class="text-center">Login</h1>
           <div class="row justify-content-center">
               <div class="col">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"  class="form">
                     <div class="mb-3">
                        <label for="" class="form-label">User Name</label>
                        <input type="text" id="adminUsername" class="form-control" name="username">
                        <div id="err" class="form-text text-danger"></div>
                      </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" id="adminPassword" name="password" class="form-control">
                        <div id="err"  class="form-text abc text-danger"></div>
                    </div>
                    <input type="submit" id="btnSubmit" name="submit" value="login" class="btn  btn-primary">
                    <div id="err" class="form-text text-center my-3 fs-5 text-danger">
                        
                    </div>
    
             
                   </form>
              
                  
                   <p class=" mt-3 text-center text-secondary">Not a User Click <a href="signup.php">here</a> to sign up for free</p>
               </div>
               <?php 
                     if(isset($_POST['submit'])){
                             $username=$_POST['username'];
                             $passwrd=$_POST['password'];
                             
                             $_SESSION['userName']=$username;
                            
                       
                             $adminV=new adminView();
                             $adminV->loginView($username,$passwrd);

                             $user = new userView();
                             $user->loginViewuser($username,$passwrd);   

                         }
                    ?>
                 
           </div>
        
        </div>
    </section>

    <footer class="footer mt-auto bg-light py-5 px-3 text-dark">
      <div class="container">
          <h3 class="text-center">Copyright © ABC All rights reserved</h3>
          <hr>
          <p class="text-center">Designed By Yehan</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='js/validations.js'></script>
 </body>
</html>