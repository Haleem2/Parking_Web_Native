<?php
ob_start();
session_start();
include "headerAfter.php";
?>

</br></br></br></br>
    
  <h2 class="product-title" style="color:#e91e63;text-align: center">Rent Comfirmation Message </h2>

  <section class="register section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-xs-12">
          <div>
          <?php
            include_once "rentdelivery.php";
            $rdelivery= new rentdelivery();
            include_once "rent.php";
            $rent= new rent();
            $rent-> SetUserId($_SESSION['id']);
            $log= $rent-> confirmrent();
            if($row= mysqli_fetch_assoc($log))
            {
                $_SESSION['rentno']= $row['rentno']; 
          ?>
          <h4 class="text-center">Rent Ticket</h4>
            <div class="ticket-body col-12 mb-4" style="border: 3px solid #e91e63;border-radius: 9%;padding: 30px;">
                <div class="row col-12">
                <div class="col-5">
                    <p>
                     <span>Rent Number : <?php echo($row['rentno']); ?></span>
                      <br />
                      <span> Owner ID / <?php echo ($_SESSION['user'] . '--' . $_SESSION['id']); ?></span>
                    </p>
                  </div>
                  <div class="col-7 text-right">
                    <p>
                      <span>Date/Time : <?php echo($row['timestamp']); ?></span>
                      <br/>
                      <span>Fees: 600LE/hour (rent fees + delivery fees)</span>
                    </p>
                  </div>
            <table id="rent "class="table table-responsive  mt-3">
                <thead>
                    <tr>
                        <th scope="col">Rental Car Number</th>
                        <th scope="col">License Number</th>
                        <th scope="col">Car Type</th>
                        <th scope="col">Car Color</th>
                        <th scope="col">Parking Name</th>
                        <th scope="col">Slot Code</th>
                        <th scope="col">From Day</th>
                        <th scope="col">To Day</th>
                        <th scope="col">From Time</th>
                        <th scope="col">To Time</th>
                        <th scope="col">Delivery Request</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo($row['rentalcarno']); ?></td>
                        <td><?php echo($row['rcarlicenseno']); ?></td>
                        <td><?php echo($row['rcartype']); ?></td>
                        <td><?php echo($row['rcarcolor']); ?></td>
                        <td><?php echo($row['Parking_Name']); ?></td>
                        <td><?php echo($row['slot_code']); ?></td>
                        <td><?php echo($row['datefrom']); ?></td>
                        <td><?php echo($row['dateto']); ?></td>
                        <td><?php echo($row['timefrom']); ?></td>
                        <td><?php echo($row['timeto']); ?></td> 
                        <td><?php echo ("Yes"); ?></td>
                    </tr>
                </tbody>
            </table>
            <?php
                } 
                $rdelivery-> SetRentNo($_SESSION['rentno']);
                $log2= $rdelivery-> getrentdeliverybyrentno();
                if($row2= mysqli_fetch_assoc($log2))
                {
                  $qrcode= $_SESSION['rentno'].$row2['rdeliveryno'];
            ?>
            <table id="deliveryrent" class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Location</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Employee Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo($row2['location']); ?></td>
                        <td><?php echo($row2['employeename']); ?></td>
                        <td><?php echo($row2['employeephone']); ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="col-12 text-center">
                      <span>
                        <strong>We Will be on time</strong></span>
                    </div>
                </div>
            </div>
            <?php
                }
                if(isset($_POST["btnconfirm"]))
                {
                   //set it to writable location, a place for temp generated PNG files
                  $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp/rentdelivery/' . DIRECTORY_SEPARATOR;

                  //html PNG location prefix
                  $PNG_WEB_DIR = 'temp/rentdelivery/';

                  include_once "Qrcode/qrlib.php";

                  //ofcourse we need rights to create temp dir
                  if (!file_exists($PNG_TEMP_DIR))
                    mkdir($PNG_TEMP_DIR);
                  $filename = $PNG_TEMP_DIR . 'test.png';

                  //processing form input
                  //remember to sanitize user input in real-life solution !!!
                  // $errorCorrectionLevel = 'L';
                  $errorCorrectionLevel = 'H';

                  $matrixPointSize = 4;


                  //it's very important!
                  if (trim($qrcode) == '')
                    die('data cannot be empty! <a href="?">back</a>');

                  // user data
                  $filename = $PNG_TEMP_DIR . $qrcode . '.png';
                  QRcode::png($qrcode, $filename, $errorCorrectionLevel, $matrixPointSize, 2);


                  //display generated file
                  echo ('<div class="ticket-body"><div class="ml-5"><img src="' . $PNG_WEB_DIR . basename($filename) . '" style="width:200px; height:200px; /></div><div class="d-flex flex-wrap"><a target="_blank" style="width:25%" class="btn btn-common ml-5" href="http://localhost:8888/Classified-Ads-Website-Template/Parking_Web_Native/Classified-Ads-Website-Template/temp/rentdelivery/' . $qrcode. '.png" > open QR code</a><a href="indexUser.php" style="width:25%" class="btn btn-common ml-5">Done</a></div></div>');                         
                }
            ?>
            <form class="login-form" method="post">
                <div class="text-center">
                 <input type="<?php echo( isset($_POST['btnconfirm']) ? 'hidden': 'submit' ); ?>" class="btn btn-common log-btn" style="width:100%" name="btnconfirm" value="Confirm">
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </section>
<?php
include "footer.php";
?>