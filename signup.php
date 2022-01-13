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
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="icons/icon.png" type="image/x-icon">

</head>
<body>
    <header class="header mb-3 pt-3" id="header">
        <nav class="navbar navbar-expand-lg  navbar-light" id='navbar'>
          <div class="container">
              <a href="index.php" class="navbar-brand lead text-light"><img src="icons/logo.gif" class="img-fluid logo" alt="Logo Img"></a>
         
          </div>
        </nav>
      
        <!-- search here -->
    </header>
    <!-- main section -->

    <section class="signup bg-light my-5 py-5">
        <div class="container">
           <h1 class="text-center mb-5">Sign Up</h1>
           <div class="row justify-content-center">
               <div class="col"> 
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form">
                    <div class="d-flex">
                        <div class="mb-3">
                            <label for="" class="form-label">User Name</label>
                            <input type="text" name="userName"  id="userName" class="form-control">
                            <div id="Usererr" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Full Name</label>
                            <input type="text" name="userFullname"  id="userFullname" class="form-control">
                            <div id="Usererr" class="form-text text-danger"></div>
                        </div>
                     </div>

                     <div class="d-flex">

                        <div class="mb-3">
                            <label for="" class="form-label">Birthday</label>
                            <input type="date" name="birthday" id="birthday" class="form-control">
                            <div id="Usererr"  class="form-text text-danger"></div>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Gender</label>
                            <select id="gender" name="gender" class=" me-5 form-select pe-4">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                            <div id="Usererr" class="form-text text-danger"></div>
                          </div>
                          
                     </div>

                     <div class="d-flex">
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" id="userPassword" name="userPassword" class="form-control">
                            <div id="Usererr" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm</label>
                            <input type="password" id="confirm" class="form-control" >
                            <div id="Usererr" class="form-text text-danger"></div>
                        </div>
                     </div>
                     <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label" >I agree on Terms and Condidtions</label>
                      </div>

                    <button id="registerBtn" type="submit" name="send" class="btn w-40  btn-primary">Register</button>
                    <div class="err">
                        
                    </div>
                </form>
              
                <p class=" mt-3 text-center lead fw-bold text-danger" id="result"></p>
                <p class=" mt-3 text-center text-secondary">Already a User Click  <a href="#">here</a> to Login for free</p>
                <?php 
                   if(isset($_POST['send'])){
                        $userName=$_POST['userName'];
                        $fullName=$_POST['userFullname'];
                        $dob=$_POST['birthday'];
                        $gender=$_POST['gender'];
                        $password=$_POST['userPassword'];
                        $_SESSION['userName']=$userName;
                        $user = new userView();
                        $user->addUserView($userName,$fullName,$dob,$gender,$password);        
                    }
                ?>
               </div>
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
    <div class="modal" id="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='js/validations.js'></script>
</body>
</html>