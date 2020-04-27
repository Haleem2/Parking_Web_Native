<?php
include_once "operations.php";
include_once "data base.php";
class Car_Numbers extends Database implements operations 
{
    var $UserId;
 ///////////////////GET
    public function GetUserId()
    {
        return $this->UserId;
    }
 ///////////////////SET
    public function SetUserId($input)
    {
        $this->UserId=$input;
    }

    public function GetCarsByUserid()
    {
        $data= parent::CheckData("SELECT * FROM `car numbers` WHERE `Owner Id`='".$this->GetUserId()."'");
        return $data;
    }
    public function GetParkedCarsByUserid()
    {
        $data= parent::CheckData("SELECT * FROM `car numbers` WHERE `Owner Id`='".$this->GetUserId()."' and `status`=1");
        return $data;
    }

public function Add(){

}
public function Update(){

}
public function Delet(){

}
public function Search(){

}

}

?>