<?php 
   include_once 'connection.php';
   class Admin extends dbh{

     
    public function login($name,$password){
        
        $sql="SELECT * FROM admin Where username='$name' AND password='$password'";
        $result=$this->connect()->query($sql); // get this connection and query this result
        
        $rows=$result->num_rows; // same as mysqli_num_rows($result)

        return $rows;


    }
     
    public function viewProduct(){
        if(isset($_POST['done'])){
            $category=$_POST['type'];
       
  
    
            
             $sql="SELECT * FROM products WHERE type = '$category' AND stock>0  ";
            
       
            $res=$this->connect()->query($sql);
            while($result=$res->fetch_assoc()){
                echo $result['path'].'*';
                echo $result['type'].'*';
                echo $result['name'].'*';
                echo $result['description'].'*';
                echo $result['stock'].'*';
                echo $result['price'].'*';
                
                

               
            } 
          
          }

    }

    public function viewProduct2($category,$hide){
        if($hide){
            $sql="SELECT * FROM products WHERE type = '$category' AND stock>0";
        }
        else{
            $sql="SELECT * FROM products WHERE type = '$category'";
        }
    
        $result=$this->connect()->query($sql);
        return $result;
    }

    public function deleteProduct($id){
        $sql="DELETE  FROM products WHERE no = '$id'";
        $result=$this->connect()->query($sql);
        return $result;
    }

    public function addProduct($type,$name,$description,$price,$stock,$path){
       
        $sql="INSERT INTO products (type,name,description,price,stock,path) VALUES ('$type','$name','$description','$price','$stock','$path')";
         
        $result=$this->connect()->query($sql);

        return $result;

    }

    public function updateProduct($id,$name,$description,$price,$stock){
        
        if($stock===''){
            $stock=0;
        }
        $sql = "UPDATE products SET name='$name', description='$description', price='$price' , stock=stock+$stock WHERE no='$id'";
        $result=$this->connect()->query($sql);
        return $result;

    }

   }
   

  
 class User extends dbh{

    public function userLogin($name,$password){
        
        $sql="SELECT * FROM users Where username='$name' AND password='$password'";
        $result=$this->connect()->query($sql); // get this connection and query this result
        
        $rows=$result->num_rows; // same as mysqli_num_rows($result)

        return $rows;


    }

    public function createUser($username,$fullname,$birthday,$gender,$password){
         
        $sql="INSERT INTO users (username,fullname,birthday,gender,password) VALUES('$username','$fullname','$birthday','$gender','$password')";

        $result=$this->connect()->query($sql);

        return $result;

    }

    public function getName(){
    
        if(isset($_POST['result'])){
            $userName=$_POST['userName'];
            $sql= "SELECT * FROM users WHERE username='$userName'";
            $result=$this->connect()->query($sql);
            $rows=$result->num_rows;
            return $rows;
        }

    }

    


 }

 Class Order extends dbh{
    
    private function generateOrder(){
        $rand = random_int(100000, 999999);
        $key='OD'.strval($rand);
        $sql="SELECT * FROM orders Where orderid='$key'";
        $result=$this->connect()->query($sql);
        $rows=$result->num_rows;
            if($rows>0){
            generateOrder(); // call back
            }
            else{
                return $key;
            }
       }  

        private function reduceStock($name,$amount,$type){
            $sql="UPDATE products set stock=stock-$amount  WHERE name='$name' AND type='$type'";
            $result=$this->connect()->query($sql);

         }

        public function makeOrder($name,$type,$price,$amount,$username,$address){
            $orderid=$this->generateOrder();
            $sql="INSERT INTO orders (name,type,price,amount,orderid,username,result,address) VALUES ('$name','$type','$price','$amount','$orderid','$username','ordered','$address')";
            $result=$this->connect()->query($sql);
            $this->reduceStock($name,$amount,$type);
            return $result;
            
        }

        public function view($userName){
            $sql="SELECT * FROM orders WHERE username='$userName'";
            $result=$this->connect()->query($sql);
            return $result;
        }

        public function viewAll($res){
            $sql="SELECT * FROM orders WHERE result='$res'";
            $result=$this->connect()->query($sql);
            return $result;
        }

        public function viewCompleted($userName,$result){
            $sql="SELECT * FROM orders WHERE username='$userName' AND result='$result'";
            $result=$this->connect()->query($sql);
            return $result;
        }

        public function assingnDriver($orderid){
            $sql="UPDATE orders  SET  result='completed' WHERE orderid='$orderid'";
            $result=$this->connect()->query($sql);
            return $result;
        }

    

   
 }

   class Payments extends dbh{

          public function pay($orderid,$amt){
               
             $sql="INSERT INTO payments (orderId,paid) VALUES ('$orderid','$amt')";
             $result=$this->connect()->query($sql);
             return $result;
                 
          }

          public function updateOrder($orderid){
              $sql="UPDATE orders SET result='paid' WHERE orderid='$orderid'" ;
              $result=$this->connect()->query($sql);
              return $result;
          }

          public function cancel($orderid,$amount,$name){
            $this->increment($amount,$name);
            $sql="UPDATE orders SET result='cancelled' WHERE orderid='$orderid'" ;
            $result=$this->connect()->query($sql);
            return $result;
          }

          private function increment($amount,$name){
              $sql="UPDATE products SET stock=stock+$amount WHERE name='$name'";
              $result=$this->connect()->query($sql);
              
          }

          public function summary(){
              $sql="SELECT * FROM payments";
              $result=$this->connect()->query($sql);
              return $result;
          }
   }



?>