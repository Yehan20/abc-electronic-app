<?php 
   include_once 'model.php';
  

   class adminView extends Admin{
       public function loginView($username,$password){
           
           if(!($username===''||$password==='')){
                $result=$this->login($username,$password);
                if($result>0){
                    header('location:adminHome.php');
                }
                else{
                    echo '<p class="text-center text-danger lead fw-bold ">*Invalid login</p>';
                }
            }
       }

       public function productView($category){
           $result=$this->viewProduct($category);
           
              return $result;
           
  
       }

       public function addProductView($type,$name,$description,$price,$stock,$path){
              if(!($type===''||$name===''||$description===''||$price===''||$stock===''||$path==='')){
                $result=$this->addProduct($type,$name,$description,$price,$stock,$path);
                if($result>0){
                    echo '<script>alert("Product Added")</script>';
                    echo("<script>location.href ='manage.php';</script>");
                }
               }
            
        
       }

       public function deleteView($id){
           $result=$this->deleteProduct($id);
           if($result){
            echo '<script>alert("Product Deleted")</script>';
            echo("<script>location.href ='manage.php';</script>");

           }
           else{
            echo '<script>alert("Error")</script>';
           }
       }

       public function updateView($id,$name,$description,$price,$stock){
           $result=$this->updateProduct($id,$name,$description,$price,$stock);
           if($result>0){
            echo '<script>alert("Product Updated")</script>';
            echo("<script>location.href ='manage.php';</script>");
           }
           else{
               echo '<script>alert("Error")</script>';
           }
       }
       
   }

   class userView extends User{
       public function getUserview(){
           $res=$this->getName();
           
           if($res>0){
               echo $res;
           }
           else{
               echo $res;
           }
       }

       public function addUserView($username,$fullname,$birthday,$gender,$password){
           $res=$this->CreateUser($username,$fullname,$birthday,$gender,$password);
           $result=$this->userLogin($username,$password);
           if($result){
            echo("<script>location.href ='userHome.php?user';</script>");
    

           }
         
       }

       public function loginViewuser($username,$password){
           
        if(!($username===''||$password==='')){
             $result=$this->userLogin($username,$password);
             if($result){
                 header('location:userHome.php');
             }
            //  else{
            //      echo '<p class="text-center text-danger lead fw-bold ">*Invalid logins</p>';
            //  }
         }
      }


   }

   class orderView extends Order{
       public function addOrderView($name,$type,$price,$amount,$username,$address){

             $result = $this->makeOrder($name,$type,$price,$amount,$username,$address);
             if($result>0){
                 echo '<script>alert("Order added")</script>';
                 echo '<script>window.location.href = "userOrder.php"</script>';
             }
             else{
                echo '<script>alert("Error")</script>';
             }

       }

       public function viewOrders($username){
           $result= $this->view($username);
           return $result;
       }

       public function veiwAllOrders($res){
          $result= $this->viewAll($res);
          return $result;
       }

       public function viewCompletedOrders($username,$res){
        $result= $this->viewCompleted($username,$res);
        return $result;
     }

       public function assingnDriverView($orderid){
           $result=$this->assingnDriver($orderid);
           if($result>0){
            echo '<script>alert("Driver Assingned Order Completed")</script>';
            echo '<script>window.location.href = "process.php"</script>';
           }
           else{
            echo '<script>alert("error")</script>';
           }

       }
   }



   class paymentView extends Payments{

       public function payView($orderid,$amt){
           $result=$this->pay($orderid,$amt);
           if($result>0){
            echo '<script>alert("Payment Successful")</script>';
            echo '<script>window.location.href = "userPay.php";</script>';

           }
           else{
            echo '<script>alert("Error in Paying")</script>';
           }
       }

       public function updatePayment($orderid){
           $result=$this->updateOrder($orderid);

       }

       public function cancelView($orderid,$amount,$name){
           $result=$this->cancel($orderid,$amount,$name);
           if($result>0){
           echo '<script>alert("Order Cancelled")</script>';
           echo '<script>window.location.href = "userPay.php";</script>';

           }

           else{
            echo '<script>alert("an Error occured")</script>';
           }

          }


          public function SummaryView(){
              $result=$this->summary();
              return $result;
          }
       

       }


   

   $userView = new userView();
   $userView->getUserview();

 



?>