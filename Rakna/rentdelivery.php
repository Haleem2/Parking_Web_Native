<?php

include_once "operations.php";
include_once "data base.php";
class rentdelivery extends Database implements operations 
{

   var $RentDeliveryNo;
   var $Location;
   var $RentNo;
   var $EmployeeId;
   var $timestamp;

///////////////////////////////////////////////////////////GET
   public function GeRentDeliveryNo()
   {
    return $this->RentDeliveryNo;
   }
   public function GetLocation()
   {
    return $this->Location;
   }
   public function GetRentNo()
   {
    return $this->RentNo;
   }
   public function GetEmployeeId()
   {
    return $this->EmployeeId;
   }
   public function Gettimestamp()
   {
    return $this->timestamp;
   }
   
///////////////////////////////////////////////////////////SET      
   public function SetRentDeliveryNo($input)
   {
    $this->RentDeliveryNo=$input;
   }
   public function SetLocation($input)
   {
    $this->Location=$input;
   } 
   public function SetRentNo($input)
   {
    $this->RentNo=$input;
   } 
   public function SetEmployeeId($input)
   {
    $this->EmployeeId=$input;
   }
   public function Settimestamp($input)
   {
    $this->timestamp=$input;
   }

   /////////////////////////////////////////////
   public function Add()
   {
       $data= parent::RunDML("insert into rentdelivery values (Default,'".$this->GetLocation()."','".$this->GetRentNo()."','".$this->GetEmployeeId()."',now() ) ");
       return $data;
   }
   public function Update()
   {
   }
   public function Delet()
   {
      $data= parent::RunDML("delete from rentdelivery where rdeliveryno='".$this->GetRentDeliveryNo()."'");
      return $data;
   }
   public function Search()
   {
   }

   public function checkrenthasdelivery()
   {
      $data= parent::CheckData("select * from rentdelivery where `rentno` = '".$this->GetRentNo()."'");
      return $data;
   }
   public function getrentdeliverybyrentno()
   {
      $data= parent::CheckData("select * from viewrentdelivery where `rentno` = '".$this->GetRentNo()."'");
      return $data;
   }
}


?>