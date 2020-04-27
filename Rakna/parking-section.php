<section id="blog" class="section-padding">
    <div class="container">
      <h2 class="section-title">
        Parking
      </h2>
      <div class="row">
        <?php
        include_once "City.php";
        $city = new City();
        $data = $city->GetcountParkingTicket();
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
          <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
            <div class="blog-item-wrapper">
              <div class="blog-item-img">
                <a href="City_details.php?<?php echo ($row['Parking_Id']); ?>">
                  <img src="assets/img/parks/<?php echo ($row['Parking_Id']); ?>.jpg" alt="" />
                </a>
              </div>
              <div class="blog-item-text">
                <h3>
                  <a href="City_details.php?id=<?php echo ($row['Parking_Id']); ?>"> <?php echo ($row['Parking_Name']); ?></a>
                </h3>
                <h3>
                  <span> Tickets In This Branch : <?php echo ($row['ticketCount']); ?> </span>
                </h3>
                <p>
                  <?php echo ($row['Desc']); ?>
                </p>
                <a href="City_details.php?id=<?php echo ($row['Parking_Id']); ?>" class="btn btn-common">Read More</a>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>