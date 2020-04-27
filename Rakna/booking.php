<?php

use PhpParser\Node\Expr\New_;

ob_start();
session_start();
include_once "headerAfter.php";
include_once "Car Owner.php";
include_once "Parking.php";
include_once "Car_slot.php";
include_once "City.php";

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
                  </div> -->
                  <div class="form-group inputwithicon">
                    <i class="lni-menu"></i>
                    <div class="select">
                      <select>
                        <option value="none">Select City</option>
                        <?php
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

        <!--  Booking  section -->
        <?php
        $parking = new Parking();
        $slot = new Car_Slot();
        $cars = new Car_Owner();
        $cars->setID($_SESSION['id']);
        $parking->setParkingId($_GET['id']);
        $slot->setParkingId($_GET['id']);
        $slot->setUserId($_SESSION['id']);
        $select_car = $cars->GetDataById();
        $details = $slot->parkingSlots();
        $booked = $slot->bookedSlots();
        $reservation_count = $slot->bookingCount();
        $res = $parking->parkingDetails();



        if ($row = mysqli_fetch_assoc($res)) {
        ?>

          <div class="wrapper">
            <div class="container">
              <h4 class="page-title"><?php echo ($row['Parking_Name']); ?></h4>
              <div class="row">
                <div class=" con-div col-lg-12 col-md-12 col-sm-12">
                  <div class="container">
                    <div class="row col-12 col-lg-12 col-md-12 col-sm-12 col-xl-12">
                      <!-- select service form  -->
                      <form class="row col-12 col-lg-12 col-md-12 col-sm-12 col-xl-12 my-3">
                        <label class="select-service">Select Service</label>
                        <div class=" form-group my-2 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <select class=" m-3 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 custom-select form-control select-ticket" id="servie-type-field">
                            <option selected> select ticket type</option>
                            <option value="parking">Parking</option>
                            <option value="delivery" disabled >Delivery</option>
                            <option value="rent" disabled >Rent</option>
                          </select>
                        </div>
                        <div class="form-group my-2 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-right">
                          <input type="submit" class="btn submit-service-type submit-ticket">
                        </div>
                      </form>
                      <div class="service-type-contents ">
                        <!-- selcted time and date form -->
                        <?php
                        $count = mysqli_fetch_assoc($reservation_count);
                        
                        if ($count['ticket_count'] < 2) {
                        ?>
                          <form class="row col-12 col-lg-12 col-md-12 col-sm-12 my-3 service-type-parking-time-form" data-parking="<?php echo ($_GET['id']); ?>">
                            <label class="col-1">From</label>
                            <div class="form-row show-inputbtns col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 offset-1 mb-2">
                              <input required name="date_from" type="date" data-date-inline-picker="false" class="form-control" data-date-open-on-focus="true" />
                            </div>

                            <div class="form-row show-inputbtns col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-2">
                              <input required name="time_from" type="time" name="time" step="900" class="form-control" />
                            </div>

                            <label class="col-1">To</label>
                            <div class="form-row show-inputbtns col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 offset-1 mb-2">
                              <input required name="date_to" type="date" data-date-inline-picker="false" class="form-control" data-date-open-on-focus="true" />
                            </div>

                            <div class="form-row show-inputbtns col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 mb-2">
                              <input required name="time_to" type="time" name="time" step="900" class="form-control" />
                            </div>

                            <div class="col-12 col-lg-12 col-md-12 col-sm-12 text-right">
                              <input type="submit" class=" btn submit-ticket service-type-parking-time" />
                            </div>
                          </form>
                          <!-- rgistiration selected slot form  -->
                          <form method="POST" action="" class="row col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3 service-type-parking-contents">
                            <!-- session to store ticket details -->
                            <?php
                            if (isset($_POST['submit_ticket'])) {

                              $slot_id = $_POST['slotId'];
                              $slot_id = str_replace('S', '', $slot_id);
                              $_SESSION['slot_id'] = $slot_id;
                              $date_from = $_POST['selected_date_from'];
                              $_SESSION['selected_date_from'] = $date_from;
                              $time_from = $_POST['selected_time_from'];
                              $_SESSION['selected_time_from'] = $time_from;
                              $date_to = $_POST['selected_date_to'];
                              $_SESSION['selected_date_to'] = $date_to;
                              $time_to = $_POST['selected_time_to'];
                              $_SESSION['selected_time_to'] = $time_to;
                              $selected_car_number = $_POST['carNum'];
                              if ($selected_car_number) {
                                $_SESSION['selected_car_number'] = $selected_car_number;
                                header('location:ticket_user.php?id=' . $_GET['id']);
                              } else {
                                echo ('<h3 class="alert alert-warning">Please Select Car</h3>');
                              }
                            }
                            ?>
                            <div class="row m-3">
                              <label class="select-service  mb-2">Booking Slots:</label>
                              <input type="text" hidden name="slotId" required id="slotId">
                              <div class="form-row show-inputbtns m-3">
                              </div>
                              <div class="row">
                                <input hidden id="selected_date_from" name="selected_date_from" type="date" data-date-inline-picker="false" class="form-control" data-date-open-on-focus="true" />
                                <input hidden id="selected_time_from" name="selected_time_from" type="time" step="900" class="form-control" />
                                <input hidden id="selected_date_to" name="selected_date_to" type="date" data-date-inline-picker="false" class="form-control" data-date-open-on-focus="true" />
                                <input hidden id="selected_time_to" name="selected_time_to" type="time" step="900" class="form-control" />

                                <table class=" table-bordered table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <tbody class="reservationTable row">
                                    <?php
                                    // $_SESSION['id'];
                                    // $_SESSION['user'];
                                    while ($det = mysqli_fetch_assoc($details)) {
                                      // $b = mysqli_fetch_array($booked);

                                    ?>
                                      <tr id="1" class=" tr-1 col-6 col-sm-6 col-md-4 col-lg-3 ">
                                        <td id="S<?php echo ($det['Slot_Id']); ?>" class="">
                                          <div></div>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                    <label for="carNum" class="select-service" style="font-size: 20px">Select Your Car: </label>
                                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                      <select class="form-control " name="carNum" required>
                                        <?php while ($carNum = mysqli_fetch_assoc($select_car)) { ?>
                                          <option value="<?php echo ($carNum['Car Number']); ?>"><?php echo ($carNum['Car Number'] . '--' . $carNum['Car Type']); ?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="col-lg-12 text-right">
                              <input type="submit" name="submit_ticket" class=" btn submit-ticket" />
                            </div>
                          </form>
                        <?php
                        } else {
                          echo (' <h3 class="alert alert-warning">you have running reservation</h3>');
                        }
                        ?>
                      </div>


                      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 m-3">
                        <h3>Our Parking</h3>
                        <p class="Description">
                          <?php echo ($row['Desc']); ?>
                        </p>
                        <div><i class="lni-home mr-3"></i> capacity <?php echo ($row['Capacity']); ?></div>
                        <div>
                          <i class="fas fa-clock mr-3"></i> Time 24 hours
                        </div>
                        <div><i class="fas fa-clock mr-3"></i> fees/houre <?php echo ($row['Slot_FeesPerHour'] . ' LE'); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <h3 class="alert alert-warning">No parking</h3>
        <?php }

        ?>
      </div>
    </div>
  </div>
</div>
<!-- End of Booking-->

<?php
include "contactLinksBar.php";
include "footer.php";
?>