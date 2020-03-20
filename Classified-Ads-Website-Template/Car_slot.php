<?php 
include_once "operations.php";
include_once "data base.php";
class Car_Slot extends Database implements operations 
{

  var $Parking_Id;

  public function GetParkingId(){

    return $this->Parking_Id;
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

}

?>