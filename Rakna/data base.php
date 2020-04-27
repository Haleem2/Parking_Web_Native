
<?php

class Database 
{
    var $conn;
    function __construct()
    {        
      // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

       $this->conn=mysqli_connect("localhost","root","","db_a54e45_parking");
    }

  
       //To Insert- Update - delete 
       function RunDML($statment)
       {
               if(!mysqli_query($this->conn,$statment))
               {
                   return  mysqli_error($this->conn);
     
                  }
           else{
               return "ok";}
       }
       function CheckData($select)
       {
         $result= mysqli_query($this->conn,$select);
         return $result;
       }
}

?>