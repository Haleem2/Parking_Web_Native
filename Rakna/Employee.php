<?php

include_once "operations.php";
include_once "data base.php";
class employee extends Database implements operations 
{

   var $employeeid;
   var $name;
   var $phone;
   var $status;

///////////////////////////////////////////////////////////GET
   public function GetEmployeeId()
   {
    return $this->employeeid;
   }
   public function GetName()
   {
    return $this->name;
   }
   public function GetPhone()
   {
    return $this->phone;
   }
   public function GetStatus()
   {
    return $this->status;
   }
   
///////////////////////////////////////////////////////////SET      
   public function SetEmployeeId($input)
   {
    $this->employeeid=$input;
   }
   public function SetName($input)
   {
    $this->name=$input;
   } 
   public function SetPhone($input)
   {
    $this->phone=$input;
   } 
   public function SetStatus($input)
   {
    $this->status=$input;
   }
   
   //////////////////////////////////////////////////////////
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
   public function getlastemployee()
   {
    $data= parent::CheckData("select * from employee where status=0 order by employeeid DESC limit 2");
    return $data;
   }
   public function getsecondlastemployee()
   {
    $data= parent::CheckData("select * from employee where status=0 order by employeeid DESC limit 1, 1");
    return $data;
   }
   public function UpdateStatus()
   {
       $data= parent::RunDML("update employee set status=1 where employeeid='".$this->GetEmployeeId()."'");
       return $data;
   }
   // public function UpdateStatusnull()
   // {
   //     $data= parent::RunDML("update employee set status=0 where employeeid='".$this->GetEmployeeId()."'");
   //     return $data;
   // }
}


?>