<?php
include_once "operations.php";
include_once "data base.php";
class Ticket extends Database implements operations
{

  var $Parking_Id;
  var $Time_From;
  var $Time_To;
  var $Date_From;
  var $Date_To;
  var $Slot_Id;
  var $User_Id;
  var $Total_Fee;
  var $Reservation_Time;
  var $Car_Num;

  public function GetCarNum()
  {
    return $this->Car_Num;
  }

  public function GetResevationTime()
  {
    return $this->Reservation_Time;
  }

  public function GetTotalFee()
  {
    return $this->Total_Fee;
  }

  public function GetUserId()
  {
    return $this->User_Id;
  }
  public function GetSlotId()
  {
    return $this->Slot_Id;
  }
  public function GetParkingId()
  {

    return $this->Parking_Id;
  }

  public function GetTimeFrom()
  {
    return $this->Time_From;
  }

  public function GetTimeTo()
  {
    return $this->Time_To;
  }

  public function GetDateFrom()
  {
    return $this->Date_From;
  }

  public function GetDateTo()
  {
    return $this->Date_To;
  }

  public function setCarNum($CarNum)
  {
    $this->Car_Num=$CarNum;
  }

  public function setResevationTime($ResevationTime)
  {
    $this->Reservation_Time=$ResevationTime;
  }
  
  public function setTotalFee($TotalFee)
  {
    $this->Total_Fee=$TotalFee;
  }

  public function setUserId($UserId)
  {
    $this->User_Id=$UserId;
  }

  public function setSlotId($SlotId)
  {
    $this->Slot_Id=$SlotId;
  }
  public function setTimeFrom($TimeFrom)
  {

    $this->Time_From = $TimeFrom;
  }

  public function setTimeTo($TimeTo)
  {

    $this->Time_To = $TimeTo;
  }

  public function setDateFrom($DateFrom)
  {

    $this->Date_From = $DateFrom;
  }

  public function setDateTo($DateTo)
  {

    $this->Date_To = $DateTo;
  }

  public function setParkingId($ParkingId)
  {

    $this->Parking_Id = $ParkingId;
  }


  public function Add()
  {
    return parent::RunDML(" insert into `ticket`(`ticket_id`, `Car_Number`, `Slot_Id`, `Parking_Id`, `Date_From`, `Date_To`, `Time_From`, `Time_To`, `total`, `Reservation_Time`, `Owner_Id`) VALUES
     (Default ,'".$this->GetCarNum()."','".$this->GetSlotId()."','".$this->GetParkingId()."','".$this->GetDateFrom()."','".$this->GetDateTo()."','".$this->GetTimeFrom()."','".$this->GetTimeTo()."','".$this->GetTotalFee()."',Default,'".$this->GetUserId()."')");
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
  public function MaxTicket()
  {
    $data = parent::CheckData("SELECT MAX(`ticket_id`) AS last_ticket FROM ticket WHERE `Owner_Id` = '".$this->GetUserId()."' AND Parking_Id ='".$this->GetParkingId()."'");
    return $data;
  }
}
