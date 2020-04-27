<?php
ob_start();
session_start();
include "headerAfter.php";
?>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Delivery Confirmation Message</h2>
            <ol class="breadcrumb">
              <li><a href="indexUser.php">Home /</a></li>
              <li class="current"><a href="delivery1.php">Delivery</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="register section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-xs-12">
          <div>
          <?php
            $qrcodes= array();
            include_once "delivery.php";
            $delivery= new delivery();
            $delivery-> SetUserId($_SESSION['id']);
            $delivery-> SetTotalCars(count($_SESSION['cars']));
            $log= $delivery-> confirmdelivery();
            while($row= mysqli_fetch_assoc($log))
            {
              array_push($qrcodes,$row['deliveryno']);
            ?>
            <h4 class="text-center">Delivery Ticket</h4>
            <div class="ticket-body col-12 mb-4" style="border: 3px solid #e91e63;border-radius: 9%;padding: 30px;">
                <div class="row col-12">
                <div class="col-5">
                    <p>
                     <span>Delivey Number : <?php echo($row['deliveryno']); ?></span>
                      <br />
                      <span> Owner ID / <?php echo ($_SESSION['user'] . '--' . $_SESSION['id']); ?></span>
                    </p>
                  </div>
                  <div class="col-7 text-right">
                    <p>
                      <span>Date/Time : <?php echo($row['deliveytimestamp']); ?></span>
                      <br/>
                      <span>Fees: 100LE</span>
                    </p>
                  </div>
                  <table class="table table-responsive mt-3">
                      <thead>
                          <tr>
                              <th scope="col">Car Number</th>
                              <th scope="col">License Number</th>
                              <th scope="col">Car Type</th>
                              <th scope="col">Car Color</th>
                              <th scope="col">Employee Name</th>
                              <th scope="col">Employee Phone Number</th>
                              <th scope="col">Time</th>
                              <th scope="col">Location</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td><?php echo($row['carno']); ?></td>
                              <td><?php echo($row['licenseno']); ?></td>
                              <td><?php echo($row['cartype']); ?></td>
                              <td><?php echo($row['carcolor']); ?></td>
                              <td><?php echo($row['employeename']); ?></td>
                              <td><?php echo($row['employeephone']); ?></td>
                              <td><?php echo($row['time']); ?></td>
                              <td><?php echo($row['location']); ?></td>
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
                  foreach ($qrcodes as &$qrcode)
                  {
                    // echo ($qrcode);
                    //set it to writable location, a place for temp generated PNG files
                    $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp/delivery/' . DIRECTORY_SEPARATOR;
  
                    //html PNG location prefix
                    $PNG_WEB_DIR = 'temp/delivery/';
  
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
                    echo ('<div class="ticket-body"><div class="ml-5"><img src="' . $PNG_WEB_DIR . basename($filename) . '" style="width:200px; height:200px; /></div><div class="d-flex flex-wrap"><a target="_blank" style="width:55%" class="btn btn-common ml-5" href="http://localhost:8888/Classified-Ads-Website-Template/Parking_Web_Native/Classified-Ads-Website-Template/temp/delivery/' . $qrcode. '.png" > open QR code</a></div></div>');
                  }
                  echo ('<div class="text-center"><a href="indexUser.php" class="btn btn-outline-danger log-btn" style="width:100%">Done</a></div>');
                }
              ?>
            <form class="login-form" method="post">
                <div class="text-center">
                 <input type="<?php echo( isset($_POST['btnconfirm']) ? 'hidden': 'submit' ); ?>"class="btn btn-common log-btn" style="width:100%" name="btnconfirm" value="Confirm">
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