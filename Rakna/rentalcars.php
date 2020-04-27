<?php

include_once "operations.php";
include_once "data base.php";
class rentalcars extends Database implements operations 
{

   var $rentalcarno;
   var $cartype;
   var $carlicenseno;
   var $carcolor;
   var $slotid;
   var $parkingid;
   var $status;

///////////////////////////////////////////////////////////GET
   public function Getrentalcarno()
   {
    return $this->rentalcarno;
   }
   public function Getcartype()
   {
    return $this->cartype;
   }
   public function Getcarlicenseno()
   {
    return $this->carlicenseno;
   }
   public function Getcarcolor()
   {
    return $this->carcolor;
   }
   public function Getslotid()
   {
    return $this->slotid;
   }
   public function Getparkingid()
   {
    return $this->parkingid;
   }
   public function Getstatus()
   {
    return $this->status;
   }
   
///////////////////////////////////////////////////////////SET      

   public function Setrentalcarno($input)
   {
    $this->rentalcarno=$input;
   }
   public function Setcartype($input)
   {
    $this->cartype=$input;
   } 
   public function Setcarlicenseno($input)
   {
    $this->carlicenseno=$input;
   } 
   public function Setcarcolor($input)
   {
    $this->carcolor=$input;
   } 
   public function Setslotid($input)
   {
    $this->slotid=$input;
   } 
   public function Setparkingid($input)
   {
    $this->parkingid=$input;
   }
   public function Setstatus($input)
   {
    $this->status=$input;
   }

   /////////////////////////////////////////////
   public function Add()
   {
   }
   public function Update()
   {
   }
   public function Delet()
   {
   }
   public function Search()
   {
   }
   public function getavailablecars()
   {
      $data= parent::CheckData("select * from rentalcars where status=0");
      return $data;
   }
   public function getcarplace()
   {
      $data= parent::CheckData("select * from viewrentalcars where rentalcarno='".$this->Getrentalcarno()."'");
      return $data;
   }
   public function changestatus()
   {
       $data= parent::RunDML("update rentalcars set status = 1 where rentalcarno='".$this->Getrentalcarno()."'");
       return $data;
   }
}


?>