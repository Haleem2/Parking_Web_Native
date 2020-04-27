<?php
ob_start();
session_start();
include_once "headerAfter.php";
include_once "Parking.php";
include_once "Car Owner.php";
include_once "Ticket.php";

?>
<!-- header and search bar  -->
<header id="header-wrap">
  <div id="hero-area">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
          <div class="contents-ctg">
            <div class="search-bar">
              <div class="search-inner">
                <form class="search-form" method="post">
                  <div class="form-group inputwithicon">
                    <i class="lni-tag"></i>
                    <input type="text" name="customword" class="form-control" placeholder="Enter Product Keyword" />
                  </div>
                  <!-- <div class="form-group inputwithicon">
                    <i class="lni-target"></i>
                     <div class="select">
                      <select>
                        <option value="none">All Locations</option>
                        <option value="none">New York</option>
                        <option value="none">California</option>
                        <option value="none">Washington</option>
                        <option value="none">Birmingham</option>
                        <option value="none">Chicago</option>
                        <option value="none">Phoenix</option>
                      </select>
                    </div>
                  </div>  -->
                  <div class="form-group inputwithicon">
                    <i class="lni-menu"></i>
                    <div class="select">
                      <select>
                        <option value="none">Select City</option>
                        <?php
                        include_once "City.php";
                        $city = new City();
                        $data = $city->GetAll();

                        while ($row = mysqli_fetch_assoc($data)) {

                        ?>
                          <option value="none"><?php echo ($row["City_Name"]); ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <?php
                  if (isset($_POST['submit'])) {

                    header("Location:search_result.php?key=" . $_POST['customword']);
                  }
                  ?>
                  <button name="submit" class="btn btn-common" type="submit">
                    <i class="lni-search"></i> Search Now
                  </button>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header> <!-- end search bar -->

<div class="main-container section-padding">
  <div class="container">
    <div class="row">
      <!-- side bar -->
      <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
        <aside>
          <!-- side search bar -->
          <div class="widget_search">
            <form role="search" method="POST" id="search-form">
              <input type="search" class="form-control" autocomplete="off" name="s" placeholder="Search..." id="search-input" value="" />
              <?php
              if (isset($_POST['sideSearch'])) {

                header("Location:search_result.php?key=" . $_POST['s']);
              }
              ?>
              <button type="submit" name="sideSearch" id="search-submit" class="search-btn">
                <i class="lni-search"></i>
              </button>
            </form>
          </div> <!-- end side seach bar -->


          <!-- side bar cities -->
          <div class="widget categories">
            <h4 class="widget-title">All Cities</h4>
            <ul class="categories-list">

              <?php
              include_once "City.php";
              $city = new City();
              $data = $city->GetAllCities();
              while ($row = mysqli_fetch_assoc($data)) {

              ?>
                <li>
                  <a href="City_details.php?id=<?php echo ($row['City_Id']); ?>">
                    <i class="lni-home"></i>
                    <?php echo ($row['City_Name']); ?> <span class="category-counter">(<?php echo ($row['Parking_Count']); ?>)</span>
                  </a>
                </li>

              <?php
              }
              ?>
            </ul>
          </div><!-- end of side bar cities-->


          <!-- side bar advertisement -->
          <!-- <div class="widget">
            <h4 class="widget-title">Advertisement</h4>
            <div class="add-box">
              <img class="img-fluid" src="assets/img/img1.jpg" alt="" />
            </div>
          </div> end side bar advertisement -->

        </aside>
      </div><!-- end side bar -->
      <div class="col-lg-9 col-md-12 col-xs-12 page-content">
        <!--  Ticket  section -->

        <div class="container">
          <div class="row justify-content-center">
            <?php

            $parking = new Parking();
            $usre_data = new Car_Owner();
            $usre_data->setID($_SESSION['id']);
            $parking->setParkingId($_GET['id']);
            $user = $usre_data->UserData();
            $res = $parking->parkingDetails();
            if ($row = mysqli_fetch_assoc($res)) {
              $info = mysqli_fetch_assoc($user);
            ?>
              <div class="text-center col-lg-12 col-md-12 col-xs-12 ">

                <h2 class="page-title"><?php echo ($row['Parking_Name']); ?></h2>
              </div>

              <div class="ticket-body col-12 col-sm-12 col-md-12 col-lg-12 col-xl-10 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row mb-3 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                    <strong> <?php echo ($row['Parking_Name']); ?></strong>
                  </div>

                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <p>
                      <span> Owner ID / <?php echo ($_SESSION['user'] . '--' . $_SESSION['id']); ?></span>
                      <br />
                      <span> car Number:<?php echo $_SESSION['selected_car_number']; ?></span>
                      <br />
                      <span>Phone Number: <?php echo ($info['Phone_Number']); ?> </span>
                    </p>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-4 text-right">
                    <p>
                      <span>Date: <?php
                                  $reservation_date = date("Y/m/d h:i:s");
                                  echo ($reservation_date); ?></span>
                      <br />
                      <span>Ticket No: 12 </span>
                    </p>
                  </div>
                </div>
                <div class="row col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3">
                  <form method="POST" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <table class="table col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                      <thead>
                        <tr>
                          <th scope="col">service</th>
                          <th scope="col">From</th>
                          <th scope="col">To</th>
                          <th scope="col">Price/hour</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Parking</th>
                          <td><?php echo ($_SESSION['selected_date_from'] . '
                          ' . $_SESSION['selected_time_from']); ?></td>
                          <td><?php echo ($_SESSION['selected_date_to'] . '
                          ' . $_SESSION['selected_time_to']); ?></td>
                          <td> <?php echo ($row['Slot_FeesPerHour'] . ' LE'); ?></td>
                          <td><?php

                              $date1 = strtotime($_SESSION['selected_date_from'] . '' . $_SESSION['selected_time_from']);
                              $date2 = strtotime($_SESSION['selected_date_to'] . '' . $_SESSION['selected_time_to']);
                              $hour = abs($date1 - $date2) / (60 * 60);
                              $total_fee = $hour * $row['Slot_FeesPerHour'];
                              echo ($total_fee);
                              ?>
                          </td>
                        </tr>
                      </tbody>
                      <?php

                      ?>
                    </table>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                      <span>
                        <strong> You Are Welcomed At Any Time </strong></span>
                    </div>
                </div>
              </div>
              <div class="post-btn mb-3 mt-3 col-lg-9 text-center">
                <a class="btn btn-common" href="booking.php?id=<?php echo $_GET['id'] ?>">
                  <i class="lni-pencil-alt"></i> Edit Your Booking
                </a>
                <button type="button" class="btn btn-common" data-toggle="modal" data-target="#exampleModal">
                  Confirm Your Booking
                </button>

                <!--Confirmation Modal -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          Confirm Booking
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Are You Sure You Want To confirm Your Booking?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                          Close
                        </button>

                        <input type="submit" name="confirmBook" class="btn btn-common" value="Confirm">


                      </div>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            <?php
              if (isset($_POST['confirmBook'])) {
                $ticket = new Ticket();
                $total = $total_fee;
                $ticket->setUserId($_SESSION['id']);
                $ticket->setParkingId($_GET['id']);
                $ticket->setCarNum($_SESSION['selected_car_number']);
                //$ticket->setResevationTime($reservation_date);
                $ticket->setTotalFee($total);
                // var_dump($_SESSION); die;
                $ticket->setSlotId($_SESSION['slot_id']);
                $ticket->setTimeFrom($_SESSION['selected_time_from']);
                $ticket->setTimeTo($_SESSION['selected_time_to']);
                $ticket->setDateFrom($_SESSION['selected_date_from']);
                $ticket->setDateTo($_SESSION['selected_date_to']);
                $msg = $ticket->Add();



                if ($msg == 'ok') {

                  $last_ticket = $ticket->MaxTicket();
                  $max_ticket = mysqli_fetch_assoc($last_ticket);

                  $Qrcode_data = 'ticket_code:' . $max_ticket['last_ticket'] .
                    'date time from:(' . $_SESSION['selected_date_from'] . ' ' . $_SESSION['selected_time_from'] . ')' .
                    'date time to:(' . $_SESSION['selected_date_to'] . ' ' . $_SESSION['selected_time_to'] . ')' .
                    'user-name:' . $_SESSION['user'] .
                    ' parking_code:' . $_GET['id'] .
                    'slot_code:' . $_SESSION['slot_id'];

                  //set it to writable location, a place for temp generated PNG files
                  $PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

                  //html PNG location prefix
                  $PNG_WEB_DIR = 'temp/';

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
                  if (trim($Qrcode_data) == '')
                    die('data cannot be empty! <a href="?">back</a>');

                  // user data
                  $filename = $PNG_TEMP_DIR . $max_ticket['last_ticket'] . '.png';
                  QRcode::png($Qrcode_data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);


                  //display generated file
                  echo '<div><img  src="' . $PNG_WEB_DIR . basename($filename) . '" /></div>
                       <div> <a target="_blank" class="btn btn-common" href="http://localhost:8888/Rakna/temp/' . $max_ticket['last_ticket'] . '.png" > open QR code</a></div>';

                  echo ('<br><br><h3 class="alert alert-success">you have booked successfully come on time</h3>');
                } else {
                  echo ($msg);
                }
              }
            } ?>
          </div>
        </div>

        <!-- End of Ticket-->
      </div>

    </div>
  </div>
</div>


<?php
include "contactLinksBar.php";
include "footer.php";
?>