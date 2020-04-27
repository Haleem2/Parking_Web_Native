<?php

include_once "operations.php";
include_once "data base.php";
class rent extends Database implements operations 
{

   var $rentNo;
   var $UserId;
   var $rentalcarno;
   var $datefrom;
   var $dateto;
   var $timefrom;
   var $timeto;
   var $timestamp;

///////////////////////////////////////////////////////////GET
   public function GetrentNo()
   {
    return $this->rentNo;
   }
   public function GetUserId()
   {
    return $this->UserId;
   }
   public function Getrentalcarno()
   {
    return $this->rentalcarno;
   }
   public function Getdatefrom()
   {
    return $this->datefrom;
   }
   public function Getdateto()
   {
    return $this->dateto;
   }
   public function Gettimefrom()
   {
    return $this->timefrom;
   }
   public function Gettimeto()
   {
    return $this->timeto;
   }
   public function Gettimestamp()
   {
    return $this->timestamp;
   }
   
///////////////////////////////////////////////////////////SET      

   public function SetrentNo($input)
   {
    $this->rentNo=$input;
   }
   public function SetUserId($input)
   {
    $this->UserId=$input;
   } 
   public function Setrentalcarno($input)
   {
    $this->rentalcarno=$input;
   } 
   public function Setdatefrom($input)
   {
    $this->datefrom=$input;
   } 
   public function Setdateto($input)
   {
    $this->dateto=$input;
   } 
   public function Settimefrom($input)
   {
    $this->timefrom=$input;
   }
   public function Settimeto($input)
   {
    $this->timeto=$input;
   }
   public function Settimestamp($input)
   {
    $this->timestamp=$input;
   }

   /////////////////////////////////////////////
   public function Add()
   {
      $data= parent::RunDML("insert into rent values (Default,'".$this->GetUserId()."','".$this->Getrentalcarno()."' ,'".$this->Getdatefrom()."','".$this->Getdateto()."','".$this->Gettimefrom()."', '".$this->Gettimeto()."', now() ) ");
      return $data;
   }
   public function Update()
   {
   }
   public function Delet()
   {
      $data= parent::RunDML("delete from rent where rentno='".$this->GetrentNo()."'");
      return $data;
   }
   public function Search()
   {
   }
   public function confirmrent()
   {
      $data= parent::CheckData("select * from viewrent where userid='".$this->GetUserId()."' order by rentno DESC limit 1");
      return $data;
   }
   public function lastorderforuser()
   {
      $data= parent::CheckData("select * from viewrent where `userid` = '".$this->GetUserId()."'  and `timestamp` <= now() and `timestamp` >= now() - interval 2 hour");
      return $data;
   }
   public function todayordersforuser()
   {
      $data= parent::CheckData("select * from viewrent where `userid` = '".$this->GetUserId()."'  and left(`timestamp` , 10) = curdate()");
      return $data;
   }

}


?>