<?php 
include_once "operations.php";
include_once "data base.php";
class Car_Slot extends Database implements operations 
{

  var $Parking_Id;
  var $User_Id;

  public function GetParkingId(){

    return $this->Parking_Id;
  }

  public function GetUserId(){

    return $this->User_Id;
  }

  public function setUserId($UserId){

    $this->User_Id=$UserId;
  }

  public function setParkingId($ParkingId){

    $this->Parking_Id=$ParkingId;
  }

  public function Add(){

  }

  public function Update(){

  }

  public function Delet(){

  }

  public function Search(){

  }
  public function parkingSlots()
  {
    $data = parent::CheckData("select * from `car_slot` where Parking_Id='".$this->GetParkingId()."'");
    return $data;
  }

  //REST API function 
   function slots($parkingid)
  {
      // sanitize
      $parkingid=htmlspecialchars(strip_tags($parkingid));
    $data = parent::CheckData("select * from `ticketbookedslots` where Parking_Id='".$parkingid."'");
    return $data;
  }

  public function bookedSlots()
  {
    $data = parent::CheckData("SELECT * FROM `ticketbookedslots` WHERE Parking_Id='".$this->GetParkingId()."'");
    
        return $data;

  }
  public function bookingCount()
  {
    
    $data = parent::CheckData(" SELECT COUNT(*) AS ticket_count  FROM `ticket` WHERE ( Date_To > CURRENT_DATE() OR (Date_To = CURRENT_DATE() AND Time_To > CURRENT_TIME())) AND Owner_Id ='".$this->GetUserId()."'");
    
    return $data;
  }

}

?>