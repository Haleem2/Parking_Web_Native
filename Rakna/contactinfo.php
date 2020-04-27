<?php

include_once "operations.php";
include_once "data base.php";
class contactinfo extends Database implements operations 
{

   var $email;
   var $name;
   var $address;
   var $latitude;
   var $longitude;
   var $phone1;
   var $phone2;

///////////////////////////////////////////////////////////GET
   public function Getemail()
   {
    return $this->email;
   }
   public function Getname()
   {
    return $this->name;
   }
   public function Getaddress()
   {
    return $this->address;
   }
   public function Getlatitude()
   {
    return $this->latitude;
   }
   public function Getlongitude()
   {
    return $this->longitude;
   }
   public function Getphone1()
   {
    return $this->phone1;
   }
   public function Getphone2()
   {
    return $this->phone2;
   }
 
///////////////////////////////////////////////////////////SET      

   public function Setemail($input)
   {
    $this->email=$input;
   }
   public function Setname($input)
   {
    $this->name=$input;
   }
   public function Setaddress($input)
   {
    $this->address=$input;
   } 
   public function Setlatitude($input)
   {
    $this->latitude=$input;
   }
   public function Setlongitude($input)
   {
    $this->longitude=$input;
   }
   public function Setphone1($input)
   {
    $this->phone1=$input;
   } 
   public function Sephone2($input)
   {
    $this->phone2=$input;
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
   public function getcontactinfo()
   {
      $data= parent::CheckData("select * from contactinfo");
      return $data;
   }

}


?>