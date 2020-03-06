<?php  


include_once "operations.php";
include_once "data base.php";
class Offers extends Database implements operations 
{

 

  

  public function Add(){

  }

  public function Update(){

  }

  public function Delet(){

  }

  public function Search(){

  }

  public function GetAll(){

    $data = parent::CheckData('select * from `offers` where End_Date > Now() or Offer_No=1 ');
    return $data;
  }

}
?>