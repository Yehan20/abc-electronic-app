<?php 
  class dbh{

      public function connect(){
             $conn = new  mysqli('us-cdbr-east-05.cleardb.net','b508431eda64a9','210f4d35','heroku_89ee6a8298b9218')or die("error in db ");
            return $conn;
      }

  
  }
   
?>