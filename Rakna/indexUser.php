
<?php
ob_start(); // Initiate the output buffer
session_start();
include "headerAfter.php";
?>
  <div id="main-slide" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    <?php
          include_once "Offers.php";
          $offer = new Offers();
          $data = $offer ->GetAll();
          $active = 'active';
          $i=0;
          while ($row=mysqli_fetch_assoc($data)) { 
            if($i == 0){
      ?>
        <div class="carousel-item <?php echo($active);?>">
      <?php
        $i++;
       }else{
      ?>

      <div class="carousel-item">

        <?php
        }
        ?>  
        <img
          class="d-block w-100"
          src="assets/img/slider/<?php echo($row['Offer_No']);?>.jpg"
          alt="First slide"
        />
        <div class="carousel-caption d-md-block">
          <h1
            class="animated wow fadeInDown hero-heading"
            data-wow-delay=".4s"
          >
          <?php echo($row['Title']);?>  
          </h1>
          <p
            class="animated fadeInUp wow hero-sub-heading"
            data-wow-delay=".6s"
          >
          <?php echo($row['Details']);?>
          </p>
          <a href="#" class="btn btn-common">Offer Detail</a>
        </div>

      </div>

      <?php
        }
      ?>
      
    </div>
    <a
      class="carousel-control-prev"
      href="#main-slide"
      role="button"
      data-slide="prev"
    >
      <span class="carousel-control" aria-hidden="true"
        ><i class="lni-chevron-left" data-ripple-color="#F0F0F0"></i
      ></span>
      <span class="sr-only">Previous</span>
    </a>
    <a
      class="carousel-control-next"
      href="#main-slide"
      role="button"
      data-slide="next"
    >
      <span class="carousel-control" aria-hidden="true"
        ><i class="lni-chevron-right" data-ripple-color="#F0F0F0"></i
      ></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="search-button">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
          <div class="search-bar">
            <div class="search-inner">
              <form class="search-form" method="post">
                <div class="form-group inputwithicon">
                  <i class="lni-tag"></i>
                  <input
                    type="text"
                    name="customword"
                    class="form-control"
                    placeholder="What are you looking for?"
                  />
                </div>
                <!-- <div class="form-group inputwithicon">
                  <i class="lni-target"></i>
                  <div class="select">
                    <select>
                      <option value="none">Locations</option>
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
                        include_once "City.php";
                        $city = new City();
                        $data = $city ->GetAll();

                        while ($row=mysqli_fetch_assoc($data)) {
                          
                      ?>
                      <option value="none"><?php echo($row["City_Name"]);?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <?php
                if (isset($_POST['submit'])) {
                  
                  header("Location:search_result.php?key=".$_POST['customword']);
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

  <!-- <section class="categories-icon bg-light section-padding">
    <div class="container">
      <h1 class="section-title">Ads By Category</h1>
      <div class="row">
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-car"></i>
              </div>
              <h4>Vehicle</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-display"></i>
              </div>
              <h4>Electronics</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-mobile"></i>
              </div>
              <h4>Mobiles</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-leaf"></i>
              </div>
              <h4>Furnitures</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-tshirt"></i>
              </div>
              <h4>Fashion</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-briefcase"></i>
              </div>
              <h4>Jobs</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-home"></i>
              </div>
              <h4>Real Estate</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-hand"></i>
              </div>
              <h4>Animals</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-graduation"></i>
              </div>
              <h4>Education</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-laptop"></i>
              </div>
              <h4>Laptops & PCs</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-paint-roller"></i>
              </div>
              <h4>Services</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
          <a href="category.html">
            <div class="icon-box">
              <div class="icon">
                <i class="lni-heart"></i>
              </div>
              <h4>Matrimony</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section> -->

  <!-- <section class="featured section-padding">
    <div class="container">
      <h1 class="section-title">Latest Products</h1>
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <div class="icon">
                <span class="bg-green"><i class="lni-heart"></i></span>
                <span><i class="lni-bookmark"></i></span>
              </div>
              <a href="#"
                ><img
                  class="img-fluid"
                  src="assets/img/featured/img-1.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="#">Electronic > </a>
                <a href="#">Cameras</a>
              </div>
              <h4><a href="ads-details.html">Canon SX Powershot ...</a></h4>
              <div class="meta-tag">
                <span>
                  <a href="#"><i class="lni-user"></i> John Smith</a>
                </span>
                <span>
                  <a href="#"><i class="lni-map-marker"></i> New York, US</a>
                </span>
                <span>
                  <a href="#"><i class="lni-tag"></i> Canon</a>
                </span>
              </div>
              <p class="dsc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry.
              </p>
              <div class="listing-bottom">
                <h3 class="price float-left">$249.00</h3>
                <a href="ads-details.html" class="btn btn-common float-right"
                  >View Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <span class="price-save">
                25% Save
              </span>
              <div class="icon">
                <span class="bg-green"><i class="lni-heart"></i></span>
                <span><i class="lni-bookmark"></i></span>
              </div>
              <a href="#"
                ><img
                  class="img-fluid"
                  src="assets/img/featured/img-2.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="#">Electronic > </a>
                <a href="#">Computers</a>
              </div>
              <h4><a href="ads-details.html">Apple Macbook Pro ...</a></h4>
              <div class="meta-tag">
                <span>
                  <a href="#"><i class="lni-user"></i> Sara Doe</a>
                </span>
                <span>
                  <a href="#"
                    ><i class="lni-map-marker"></i> California, US</a
                  >
                </span>
                <span>
                  <a href="#"><i class="lni-tag"></i> Phones</a>
                </span>
              </div>
              <p class="dsc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry.
              </p>
              <div class="listing-bottom">
                <h3 class="price float-left">$289.00</h3>
                <a href="ads-details.html" class="btn btn-common float-right"
                  >View Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <div class="icon">
                <span class="bg-green"><i class="lni-heart"></i></span>
                <span><i class="lni-bookmark"></i></span>
              </div>
              <a href="#"
                ><img
                  class="img-fluid"
                  src="assets/img/featured/img-3.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="#">Vehicle > </a>
                <a href="#">Cars</a>
              </div>
              <h4><a href="ads-details.html">Mercedes Benz E200 ...</a></h4>
              <div class="meta-tag">
                <span>
                  <a href="#"><i class="lni-user"></i> Rossi Josh</a>
                </span>
                <span>
                  <a href="#"
                    ><i class="lni-map-marker"></i> Washington, US</a
                  >
                </span>
                <span>
                  <a href="#"><i class="lni-tag"></i> Others</a>
                </span>
              </div>
              <p class="dsc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry.
              </p>
              <div class="listing-bottom">
                <h3 class="price float-left">$199.80</h3>
                <a href="ads-details.html" class="btn btn-common float-right"
                  >View Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <span class="price-save">
                10% Save
              </span>
              <div class="icon">
                <span class="bg-green"><i class="lni-heart"></i></span>
                <span><i class="lni-bookmark"></i></span>
              </div>
              <a href="#"
                ><img
                  class="img-fluid"
                  src="assets/img/featured/img-4.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="#">Others > </a>
                <a href="#">Bags</a>
              </div>
              <h4><a href="ads-details.html">Brown Leather Bag ...</a></h4>
              <div class="meta-tag">
                <span>
                  <a href="#"><i class="lni-user"></i> Maria Barlow</a>
                </span>
                <span>
                  <a href="#"><i class="lni-map-marker"></i> Chicago, US</a>
                </span>
                <span>
                  <a href="#"><i class="lni-tag"></i> Gucci</a>
                </span>
              </div>
              <p class="dsc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry.
              </p>
              <div class="listing-bottom">
                <h3 class="price float-left">$206.90</h3>
                <a href="ads-details.html" class="btn btn-common float-right"
                  >View Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <div class="icon">
                <span class="bg-green"><i class="lni-heart"></i></span>
                <span><i class="lni-bookmark"></i></span>
              </div>
              <a href="#"
                ><img
                  class="img-fluid"
                  src="assets/img/featured/img-5.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="#">Electronic > </a>
                <a href="#">Apple</a>
              </div>
              <h4>
                <a href="ads-details.html">Iphonex 6 Plus Factor ...</a>
              </h4>
              <div class="meta-tag">
                <span>
                  <a href="#"><i class="lni-user"></i> David Givens</a>
                </span>
                <span>
                  <a href="#"><i class="lni-map-marker"></i> New York, US</a>
                </span>
                <span>
                  <a href="#"><i class="lni-tag"></i> Apple</a>
                </span>
              </div>
              <p class="dsc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry.
              </p>
              <div class="listing-bottom">
                <h3 class="price float-left">$106.70</h3>
                <a href="ads-details.html" class="btn btn-common float-right"
                  >View Details</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
          <div class="featured-box">
            <figure>
              <span class="price-save">
                35% Save
              </span>
              <div class="icon">
                <span class="bg-green"><i class="lni-heart"></i></span>
                <span><i class="lni-bookmark"></i></span>
              </div>
              <a href="#"
                ><img
                  class="img-fluid"
                  src="assets/img/featured/img-6.jpg"
                  alt=""
              /></a>
            </figure>
            <div class="feature-content">
              <div class="product">
                <a href="#">Furniture > </a>
                <a href="#">Home</a>
              </div>
              <h4><a href="ads-details.html">Wooden Dining Tabl ...</a></h4>
              <div class="meta-tag">
                <span>
                  <a href="#"><i class="lni-user"></i> John Smith</a>
                </span>
                <span>
                  <a href="#"><i class="lni-map-marker"></i> New York, US</a>
                </span>
                <span>
                  <a href="#"><i class="lni-tag"></i> Apple</a>
                </span>
              </div>
              <p class="dsc">
                Lorem Ipsum is simply dummy text of the printing and
                typesetting industry. Lorem Ipsum has been the industry.
              </p>
              <div class="listing-bottom">
                <h3 class="price float-left">$120.00</h3>
                <a href="ads-details.html" class="btn btn-common float-right"
                  >View Details</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

   <!-- most visited cities section -->
   <?php
  $most_visited = new City();
  $counts = $most_visited->Most_visited();
  $data = [];
  while ($row = mysqli_fetch_assoc($counts)) {
    array_push($data, $row);
  }
  ?>
  <section class="cities bg-light section-padding">
    <div class="container">
      <h1 class="section-title">Browse By Cities</h1>
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <a href="City_details.php?id=<?php echo ($data[0]['City_Id']); ?>" class="img-box">
            <div class="img-box-content">
              <h4><?php echo ($data[0]['City_Name']); ?> <span>(<?php echo ($data[0]['ticket_count']); ?>) </span></h4>
            </div>
            <div class="img-box-background">
              <img class="img-fluid" src="assets/img/cities/<?php echo ($data[0]['City_Id']); ?>L.jpg" alt="" />
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[1]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                  <h4><?php echo ($data[1]['City_Name']); ?> <span>(<?php echo ($data[1]['ticket_count']); ?>) </span></h4>
                </div>
                <div class="img-box-background">
                  <img class="img-fluid" src="assets/img/cities/<?php echo ($data[1]['City_Id']); ?>.jpg" alt="" />
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[2]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                  <h4><?php echo ($data[2]['City_Name']); ?> <span>(<?php echo ($data[2]['ticket_count']); ?>) </span></h4>
                </div>
                <div class="img-box-background">
                  <img class="img-fluid" src="assets/img/cities/<?php echo ($data[2]['City_Id']); ?>.jpg" alt="" />
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[3]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                  <h4><?php echo ($data[3]['City_Name']); ?> <span>(<?php echo ($data[3]['ticket_count']); ?>) </span></h4>
                </div>
                <div class="img-box-background">
                  <img class="img-fluid" src="assets/img/cities/<?php echo ($data[3]['City_Id']); ?>.jpg" alt="" />
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[4]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                  <h4><?php echo ($data[4]['City_Name']); ?> <span>(<?php echo ($data[4]['ticket_count']); ?>) </span></h4>
                </div>
                <div class="img-box-background">
                  <img class="img-fluid" src="assets/img/cities/<?php echo ($data[4]['City_Id']); ?>.jpg" alt="" />
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <a href="City_details.php?id=<?php echo ($data[5]['City_Id']); ?>" class="img-box">
            <div class="img-box-content">
              <h4><?php echo ($data[5]['City_Name']); ?> <span>(<?php echo ($data[5]['ticket_count']); ?>) </span></h4>
            </div>
            <div class="img-box-background">
              <img class="img-fluid" src="assets/img/cities/<?php echo ($data[5]['City_Id']); ?>L.jpg" alt="" />
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>


  <section class="works section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="section-title">How It Works?</h3>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="works-item">
            <div class="icon-box">
              <i class="lni-users"></i>
            </div>
            <p>Create an Account</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="works-item">
            <div class="icon-box">
            <i class="fas fa-parking"></i>
            </div>
            <p>Select Parking Name</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="works-item">
            <div class="icon-box">
            <i class="fas fa-car"></i>
            </div>
            <p> Book Your Slot</p>
          </div>
        </div>
        <!-- <hr class="works-line" /> -->
      </div>
    </div>
  </section>

  <!-- <div class="call-back section-padding bg-light">
    <div class="container">
      <h4>Request a Free Call Back</h4>
      <div class="row">
        <div class="col-lg-8 col-md-6 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Name"
                />
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input
                  type="email"
                  class="form-control"
                  placeholder="catagory"
                />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input
                  type="text"
                  class="form-control"
                  id="phone"
                  name="name"
                  placeholder="Phone"
                />
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Email"
                />
              </div>
            </div>
          </div>
          <a href="#" class="btn btn-common">Send</a>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="call-us">
            <div class="icon">
              <i class="lni-phone"></i>
            </div>
            <div class="contact-text">
              <span>Get Free Update</span>
              <h5 class="phone-num">+1537 555 44 88</h5>
              <p>Monday - Saturday / 9:00 - 8:00</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <section class="services section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="section-title">Key Services</h3>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
            <div class="icon">
            <i class="fas fa-parking"></i>
            </div>
            <div class="services-content">
              <h3><a href="Cities.php">Parking</a></h3>
              <p>
                Park your car in a safe place..
                book your slot and don't worry about it.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
            <div class="icon">
              <i class="fas fa-route"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Delivery</a></h3>
              <p>
                we can deliver the car to you at any place 
                just select delivery.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
            <div class="icon">
              <i class="fab fa-resolving"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Rent</a></h3>
              <p>
                select car you want and set the date and time 
                and start your trip.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="pricing-table" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title">Pricing Plan</h2>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="table">
            <div class="icon">
            <i class="fas fa-parking"></i>
            </div>
            <div class="pricing-header">
              <p class="price-value">10 EGP</p>
            </div>
            <div class="title">
              <h3>Parking</h3>
            </div>
            <ul class="description">
              <li> Safe</li>
              <li>No Car Collision</li>
              <li>Access to any slot</li>
              <li>Available 24 Hours</li>
              <li>100% Secure!</li>
            </ul>
            <button class="btn btn-common"><a href="City_details.php?id=1" style="color:white">Book Now</a> </button>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="table" id="active-tb">
            <div class="icon">
              <i class="fas fa-route"></i>
            </div>
            <div class="pricing-header">
              <p class="price-value">100 EGP</p>
            </div>
            <div class="title">
              <h3>Delivery</h3>
            </div>
            <ul class="description">
              <li>deliver to you</li>
              <li>set your place</li>
              <li>deliver to any place</li>
              <li>Available 24 Hours</li>
              <li>100% Secure!</li>
            </ul>
            <button class="btn btn-common"> <a href="City_details.php?id=1" style="color:white">Purchase </a> </button>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="table">
            <div class="icon">
              <i class="fab fa-resolving"></i>
            </div>
            <div class="pricing-header">
              <p class="price-value">500 EGP</p>
            </div>
            <div class="title">
              <h3>Rent</h3>
            </div>
            <ul class="description">
              <li>Select The Car</li>
              <li>Set The Time</li>
              <li>Enjoy</li>
              <li>Available 24 Hours</li>
              <li>100% Secure!</li>
            </ul>
            <button class="btn btn-common"> <a href="City_details.php?id=1" style="color:white"> Rent Now </a></button>
          </div>
        </div>
      </div>
    </div>
  </section>

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

  <section class="testimonial section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="testimonials" class="owl-carousel">
            <?php

            $members = $offer->BoardMember();
            while ($member = mysqli_fetch_assoc($members)) {


            ?>
              <div class="item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img<?php echo ($member['member_id']); ?>.png" alt="" />
                </div>
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">
                      <?php echo ($member['description']); ?>

                    </p>
                    <div class="info-text">
                      <h2><a href="#"><?php echo ($member['member_name']); ?></a></h2>
                      <h4><a href="#"><?php echo ($member['position']); ?></a></h4>
                    </div>
                  </div>
                </div>
              </div>
            <?php  } ?>

          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- <section id="blog" class="section-padding">
    <div class="container">
      <h2 class="section-title">
        Blog Post
      </h2>
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <div class="blog-item-wrapper">
            <div class="blog-item-img">
              <a href="single-post.html">
                <img src="assets/img/blog/img-1.jpg" alt="" />
              </a>
            </div>
            <div class="blog-item-text">
              <div class="meta-tags">
                <span class="user float-left"
                  ><a href="#"
                    ><i class="lni-user"></i> Posted By Admin</a
                  ></span
                >
                <span class="date float-right"
                  ><i class="lni-calendar"></i> 24 May, 2018</span
                >
              </div>
              <h3>
                <a href="single-post.html">Recently Launching Our Iphone X</a>
              </h3>
              <p>
                Reprehenderit nemo quod tempore doloribus ratione distinctio
                quis quidem vitae sunt reiciendis, molestias omnis soluta.
              </p>
              <a href="single-post.html" class="btn btn-common">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <div class="blog-item-wrapper">
            <div class="blog-item-img">
              <a href="single-post.html">
                <img src="assets/img/blog/img-2.jpg" alt="" />
              </a>
            </div>
            <div class="blog-item-text">
              <div class="meta-tags">
                <span class="user float-left"
                  ><a href="#"
                    ><i class="lni-user"></i> Posted By Admin</a
                  ></span
                >
                <span class="date float-right"
                  ><i class="lni-calendar"></i> 24 May, 2018</span
                >
              </div>
              <h3>
                <a href="single-post.html">How to get more ad views</a>
              </h3>
              <p>
                Reprehenderit nemo quod tempore doloribus ratione distinctio
                quis quidem vitae sunt reiciendis, molestias omnis soluta.
              </p>
              <a href="single-post.html" class="btn btn-common">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <div class="blog-item-wrapper">
            <div class="blog-item-img">
              <a href="single-post.html">
                <img src="assets/img/blog/img-3.jpg" alt="" />
              </a>
            </div>
            <div class="blog-item-text">
              <div class="meta-tags">
                <span class="user float-left"
                  ><a href="#"
                    ><i class="lni-user"></i> Posted By Admin</a
                  ></span
                >
                <span class="date float-right"
                  ><i class="lni-calendar"></i> 24 May, 2018</span
                >
              </div>
              <h3>
                <a href="single-post.html"
                  >Writing a better product description</a
                >
              </h3>
              <p>
                Reprehenderit nemo quod tempore doloribus ratione distinctio
                quis quidem vitae sunt reiciendis, molestias omnis soluta.
              </p>
              <a href="single-post.html" class="btn btn-common">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- <section class="subscribes section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="subscribes-inner">
            <div class="icon">
              <i class="lni-pointer"></i>
            </div>
            <div class="sub-text">
              <h3>Subscribe to Newsletter</h3>
              <p>and receive new ads in inbox</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <form>
            <div class="subscribe">
              <input
                class="form-control"
                name="EMAIL"
                placeholder="Enter your Email"
                required=""
                type="email"
              />
              <button class="btn btn-common" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section> -->

  <?php
  include "contactLinksBar.php";
include "footer.php";
?>