<?php
// required headers

use Illuminate\Session\Middleware\StartSession;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

// database connection will be here
// include database and object files
include_once 'Car_slot.php';
// initialize object
$slot = new Car_Slot(); //$db varaible for costructor 
// read products will be here
// query products
// get keywords
$parkingid =  $_GET["id"];
$Selected_Date_From = $_GET["from"];
$Selected_Date_To = $_GET["to"];
$result = $slot->slots($parkingid);
$num = mysqli_num_rows($result);
// check if more than 0 record found
if ($num > 0) {
  // products array
  $slots_arr = array();
  // retrieve our table contents
  // fetch() is faster than fetchAll()
  // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
  while ($row = mysqli_fetch_assoc($result)) {
    // extract row
    // this will make $row['name'] to
    // just $name only
    extract($row);
    $status = 0;

    $slot_item = array(
      'Parking_Id' => $Parking_Id,
      'Date_From' => $Date_From,
      'Date_To' => $Date_To,
      'Time_To' => $Time_To,
      'Time_From' => $Time_From
    );

    if (array_key_exists($Slot_Id, $slots_arr)) {
      array_push($slots_arr[$Slot_Id]['Tickets'], $slot_item);
    } else {
      $slots_arr[$Slot_Id] = array(
        'Slot_Id' => $Slot_Id,
        'Status' => 0,
          'Tickets' => [
            $slot_item
          ]
      );
    }
  }

  foreach($slots_arr as $key => $value) {
    foreach($value['Tickets'] as $ticket) {
      $Date_To = $ticket['Date_From'] .' '. $ticket['Time_From'];
      $Date_From = $ticket['Date_To'] .' '. $ticket['Time_To'];

      if(($Date_To <=  $Selected_Date_To) and  ($Date_From >= $Selected_Date_From) ) {
        $slots_arr[$key]['Status'] = 1;
        break;
      }
    }
}
  // set response code - 200 OK
  http_response_code(200);
  //turn data to json
  $res = array();
  
  foreach($slots_arr as $key => $value){
        array_push($res, array(
          'Slot_Id' =>  $value['Slot_Id'],
          'Status' =>  $value['Status']
        ));
  }
  echo json_encode($res);
} else {
  // set response code - 404 Not found
  http_response_code(404);
  // tell the user no products found
  echo json_encode(
    array("message" => "No slots found.")
  );
}
