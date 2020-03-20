<?php
ob_start();
session_start();

if (isset($_SESSION['user'])) {
  include_once "headerAfter.php";
} else {
  include_once "header.php";
}

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
                  <div class="form-group inputwithicon">
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
                  </div>
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
          </div>
          <!-- end side seach bar -->
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
          </div>
          <!-- end of side bar cities-->

          <!-- side bar advertisement -->
          <div class="widget">
            <h4 class="widget-title">Advertisement</h4>
            <div class="add-box">
              <img class="img-fluid" src="assets/img/img1.jpg" alt="" />
            </div>
          </div>
          <!-- end side bar advertisement -->
        </aside>
      </div>
      <!-- end side bar -->
      <div class="col-lg-9 col-md-12 col-xs-12 page-content">
        
        <!--  Booking  section -->
        <?php
        include_once "Parking.php";
        include_once "Car_slot.php";
        $parking = new Parking();
        $slot= new Car_Slot();
        $parking->setParkingId($_GET['id']);
        $slot->setParkingId($_GET['id']);
        $details=$slot->parkingSlots();
        $res = $parking->parkingDetails();
        if ($row = mysqli_fetch_assoc($res)) {

        ?>

          <div class="wrapper">
            <div class="container">
              <h4 class="page-title"><?php echo ($row['Parking_Name']); ?></h4>
              <div class="row">
                <div class=" con-div col-lg-12 col-md-6 col-sm-6">
                  <div class="container">
                    <div class="row">
                      <form class="col-lg-12 m-3">
                        <label class="select-service">Select Service</label>
                        <div class=" form-group m-2">
                          <select class=" m-3 custom-select form-control col-lg-11 select-ticket" id="servie-type-field">
                            <option selected> select ticket type</option>
                            <option value="parking">Parking</option>
                            <option value="delivery">Delivery</option>
                            <option value="rent">Rent</option>
                          </select>
                        </div>
                        <div class="col-lg-12 text-right">
                          <input type="submit" class="btn submit-service-type submit-ticket">
                        </div>
                      </form>
                      <div class="service-type-contents " >
                        <form action="#" class="col-lg-12 m-3 row service-type-parking-time-form">
                          <label class="col-1">From</label>
                          <div class="form-row show-inputbtns col-lg-6 offset-1 mb-2">
                            <input required type="date" data-date-inline-picker="false" class="form-control" data-date-open-on-focus="true" />
                          </div>

                          <div class="form-row show-inputbtns col-lg-5 mb-2">
                            <input required type="time" name="time" step="900" class="form-control" />
                          </div>

                          <label class="col-1">To</label>
                          <div class="form-row show-inputbtns col-lg-6 offset-1 mb-2">
                            <input required type="date" data-date-inline-picker="false" class="form-control" data-date-open-on-focus="true" />
                          </div>

                          <div class="form-row show-inputbtns col-lg-5 mb-2">
                            <input required type="time" name="time" step="900" class="form-control" />
                          </div>

                          <div class="col-lg-12 text-right">
                            <input type="submit" class=" btn submit-ticket service-type-parking-time" />
                          </div>
                        </form>

                        <form action="" method="POST" class="col-lg-12 m-3 service-type-parking-contents">
                          <div class="row m-3">
                            <label class="select-service  mb-2">Booking Slots:</label>
                            <input type="number" hidden name="slotId" id="slotId">
                            <div class="form-row show-inputbtns m-3">
                            </div>
                            <div class="row">
                            <table class="table-bordered table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <tbody class="reservationTable row">
                                <?php while ($det = mysqli_fetch_assoc($details)) { ?>
                                  <tr id="1" class="tr-1 col-6 col-sm-6 col-md-4 col-lg-3 ">
                                    <td id="<?php echo ($det['Slot_Id']); ?>" class="<?php echo ($det['status'] ? 'selectedd': 'vacant');?>">
                                      <div></div>
                                    </td>
                                  </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                            </div>
                          </div>
                          <div class="col-lg-12 text-right">
                            <input type="submit" class=" btn submit-ticket" />
                          </div>
                        </form>
                      </div>

                      <div class="col-lg-9  m-3">
                        <h3>Our Parking</h3>
                        <p class="Description">
                          <?php echo ($row['Parking_Desc']); ?>
                        </p>
                        <div><i class="lni-home mr-3"></i> capacity <?php echo ($row['Capacity']); ?></div>
                        <div>
                          <i class="fas fa-clock mr-3"></i> Time 24 hours
                        </div>
                        <div><i class="fas fa-clock mr-3"></i> fees/houre <?php echo ($row['Slot_fees/hour'] . ' LE'); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <h3 class="alert alert-warning">No parking</h3>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<!-- End of Booking-->

<?php
include "contactLinksBar.php";
include "footer.php";
?>