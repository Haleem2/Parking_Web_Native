<?php  


include_once "operations.php";
include_once "data base.php";
class City extends Database implements operations 
{

  var $City_Id;
  var $City_Name;
  var $Search_Key;

  public function GetSearchKey(){

    return $this->Search_Key;
  }

  public function GetCityId(){

    return $this->City_Id;
  }

  public function GetCityName(){

    return $this->City_Name;
  }

  public function setSearchKey($SearchKey){

    $this->Search_Key=$SearchKey;
  }
  public function setCityId($CityId){

    $this->City_Id=$CityId;
  }

  public function setCiyName($CityName){

    $this->City_Name=$CityName;
  }

  

  public function Add(){

  }

  public function Update(){

  }

  public function Delet(){

  }

  public function Search(){

  }

  public function GetAll(){

    $data = parent::CheckData('select * from `city`');
    return $data;
  }

  public function GetAllCities(){

    $data = parent::CheckData('select * from `view_count_parking`');
    return $data;
  }

  public function GetParkingAtCity(){

    $data = parent::CheckData("select * from `viewcityparking` where City_Id='".$this->GetCityId()."'");
    return $data;
  }

  public function GetSearchResult(){

    $data = parent::CheckData("select * from `viewcityparking` where City_Name LIKE '%".$this->GetSearchKey().
    "%' or Parking_Name LIKE '%".$this->GetSearchKey().
    "%' or `Desc` LIKE '%".$this->GetSearchKey()."%'
    or City_Desc  LIKE '%".$this->GetSearchKey()."%'");
    return $data;

  }

  public function Most_visited(){

    $data = parent::CheckData('SELECT * FROM view_count_ticket LIMIT 6 ');
    return $data;
  }

  public function Most_visited_parking(){

    $data = parent::CheckData('SELECT * FROM `view_count_parking_ticket` LIMIT 3 ');
  }

  public function GetcountParkingTicket(){

    $data= parent::checkData("select parking.Parking_Id,Parking_Name, `Desc`,
      COUNT(ticket_id) AS ticketCount
      FROM ticket
      RIGHT OUTER JOIN parking ON ticket.Parking_Id = parking.Parking_Id
      UNION
      SELECT parking.Parking_Id,
      Parking_Name,
      `Desc`,
      IFNULL(ticket_id, 0) AS ticketCount
      FROM ticket
      RIGHT OUTER JOIN parking ON ticket.Parking_Id = parking.Parking_Id
      WHERE ticket.ticket_id IS NULL
      limit 3");
      return $data;
  }


}
?>