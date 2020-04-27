<?php

include_once "operations.php";
include_once "data base.php";
class delivery extends Database implements operations 
{

   var $DeliveryNo;
   var $Location;
   var $Time;
   var $CarNo;
   var $UserId;
   var $EmployeeId;
   var $timestamp;
   var $totalcars;
///////////////////////////////////////////////////////////GET
   public function GetDeliveryNo()
   {
    return $this->DeliveryNo;
   }
   public function GetLocation()
   {
    return $this->Location;
   }
   public function GetTime()
   {
    return $this->Time;
   }
   public function GetCarNo()
   {
    return $this->CarNo;
   }
   public function GetUserId()
   {
    return $this->UserId;
   }
   public function GetEmployeeId()
   {
    return $this->EmployeeId;
   }
   public function Gettimestamp()
   {
    return $this->timestamp;
   }
   public function GetTotalCars()
   {
    return $this->totalcars;
   }
   
///////////////////////////////////////////////////////////SET      
   public function SetDeliveryNo($input)
   {
    $this->DeliveryNo=$input;
   }
   public function SetLocation($input)
   {
    $this->Location=$input;
   } 
   public function SetTime($input)
   {
    $this->Time=$input;
   } 
   public function SetCarNo($input)
   {
    $this->CarNo=$input;
   } 
   public function SetUserId($input)
   {
    $this->UserId=$input;
   } 
   public function SetEmployeeId($input)
   {
    $this->EmployeeId=$input;
   }
   public function Settimestamp($input)
   {
    $this->timestamp=$input;
   }
   public function SetTotalCars($input)
   {
    $this->totalcars=$input;
   }

   /////////////////////////////////////////////
   public function Add()
   {
       $data= parent::RunDML("insert into delivery (`deliveryno`, `location`, `time`, `carno`, `userid`, `employeeid`, `timestamp`) values (Default,'".$this->GetLocation()."','".$this->GetTime()."' ,'".$this->GetCarNo()."','".$this->GetUserId()."','".$this->GetEmployeeId()."',now() ) ");
       return $data;
   }
   public function Update()
   {
   }
   public function Delet()
   {
      $data= parent::RunDML("delete from delivery where deliveryno='".$this->GetDeliveryNo()."'");
      return $data;
   }
   public function Search()
   {
   }
   public function confirmdelivery()
   {
      $x=$this->GetTotalCars();
      $data= parent::CheckData("select * from deliveryview where userid='".$this->GetUserId()."' order by deliveryno DESC limit $x");
      return $data;
   }
   public function lastorderforuser()
   {
      $data= parent::CheckData("select * from viewdelivery where `userid` = '".$this->GetUserId()."'  and `deliveytimestamp` <= now() and `deliveytimestamp` >= now() - interval 2 hour");
      return $data;
   }
   public function todayordersforuser()
   {
      $data= parent::CheckData("select * from deliveryview where `userid` = '".$this->GetUserId()."'  and left(`deliveytimestamp` , 10) = curdate()");
      return $data;
   }

}


?>