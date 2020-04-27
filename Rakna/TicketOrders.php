<?php

include_once "operations.php";
include_once "data base.php";
class ticket extends Database implements operations 
{

   var $ticketid;
   var $carno;
   var $slotid;
   var $parkingid;
   var $ownerid;
   var $datefrom;
   var $dateto;
   var $timefrom;
   var $timeto;
   var $timestamp;

///////////////////////////////////////////////////////////GET
   public function Getticketid()
   {
    return $this->ticketid;
   }
   public function Getcarno()
   {
    return $this->carno;
   }
   public function Getslotid()
   {
    return $this->slotid;
   }
   public function Getparkingid()
   {
    return $this->parkingid;
   }
   public function Getownerid()
   {
    return $this->ownerid;
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

   public function Setticketid($input)
   {
    $this->ticketid=$input;
   }
   public function Setcarno($input)
   {
    $this->carno=$input;
   } 
   public function Setslotid($input)
   {
    $this->slotid=$input;
   } 
   public function Setparkingid($input)
   {
    $this->parkingid=$input;
   } 
   public function Setownerid($input)
   {
    $this->ownerid=$input;
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
   }
   public function Update()
   {
   }
   public function Delet()
   {
      $data= parent::RunDML("delete from ticket where ticket_id='".$this->Getticketid()."'");
      return $data;
   }
   public function Search()
   {
   }
   public function lastorderforuser()
   {
      $data= parent::CheckData("select * from viewticket where `Owner_Id` = '".$this->Getownerid()."' and `timestamp` <= now() and `timestamp` >= now() - interval 2 hour");
      return $data;
   }
   public function todayordersforuser()
   {
      $data= parent::CheckData("select * from viewticket where `Owner_Id` = '".$this->Getownerid()."'  and left(`Reservation_Time` , 10) = curdate()");
      return $data;
   }
   public function GetParkedCarsByUserid()
   {
       $data= parent::CheckData("select * from viewticket where Owner_Id= '".$this->Getownerid()."' and Date_From <= left(now() , 10) and Date_To >= left(now() , 10) and Time_From <= right(now() , 8) and Time_To > right(now() , 8)");
       return $data;
   }
}


?>