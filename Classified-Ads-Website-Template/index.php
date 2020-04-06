<?php
ob_start(); // Initiate the output buffer

session_start();

if (isset($_SESSION['user'])) {
  include_once "headerAfter.php";
} else {
  include_once "header.php";
}
?>

<div id="main-slide" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <?php
    include_once "Offers.php";
    $offer = new Offers();
    $data = $offer->GetAll();
    $active = 'active';
    $i = 0;
    while ($row = mysqli_fetch_assoc($data)) {
      if ($i == 0) {
    ?>
        <div class="carousel-item <?php echo ($active); ?>">
        <?php
        $i++;
      } else {
        ?>

          <div class="carousel-item">

          <?php
        }
          ?>
          <img class="d-block w-100" src="assets/img/slider/<?php echo ($row['Offer_No']); ?>.jpg" alt="First slide" />
          <div class="carousel-caption d-md-block">
            <h1 class="animated wow fadeInDown hero-heading" data-wow-delay=".4s">
              <?php echo ($row['Title']); ?>
            </h1>
            <p class="animated fadeInUp wow hero-sub-heading" data-wow-delay=".6s">
              <?php echo ($row['Details']); ?>
            </p>
            <a href="#" class="btn btn-common">Offer Detail</a>
          </div>

          </div>

        <?php
      }
        ?>

        </div>

        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left" data-ripple-color="#F0F0F0"></i></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
          <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right" data-ripple-color="#F0F0F0"></i></span>
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
                  <input type="text" name="customword" class="form-control" placeholder="What are you looking for?" />
                </div>
                <div class="form-group inputwithicon">
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
<?php
include_once "City.php";
$most_visited=new City();
$counts= $most_visited->Most_visited();
$data=[];
while($row=mysqli_fetch_assoc($counts)){
array_push($data,$row);
}
// var_dump($data);
?>
  <section class="cities bg-light section-padding">
    <div class="container">
      <h1 class="section-title">Browse By Cities</h1>
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <a href="City_details.php?id=<?php echo ($data[0]['City_Id']); ?>" class="img-box">
            <div class="img-box-content">
            <h4><?php echo($data[0]['City_Name']);?> <span>(<?php echo($data[0]['ticket_count']);?>) </span></h4>
            </div>
            <div class="img-box-background">
              <img class="img-fluid" src="assets/img/cities/<?php echo ($data[0]['City_Id']); ?>.jpg" alt="" />
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[1]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                  <h4><?php echo($data[1]['City_Name']);?> <span>(<?php echo($data[1]['ticket_count']);?>) </span></h4>
                </div>
                <div class="img-box-background">
                  <img class="img-fluid" src="assets/img/cities/<?php echo ($data[1]['City_Id']); ?>.jpg" alt="" />
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[2]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                <h4><?php echo($data[2]['City_Name']);?> <span>(<?php echo($data[2]['ticket_count']);?>) </span></h4>
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
                <h4><?php echo($data[3]['City_Name']);?> <span>(<?php echo($data[3]['ticket_count']);?>) </span></h4>
                </div>
                <div class="img-box-background">
                  <img class="img-fluid" src="assets/img/cities/<?php echo ($data[3]['City_Id']); ?>.jpg" alt="" />
                </div>
              </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <a href="City_details.php?id=<?php echo ($data[4]['City_Id']); ?>" class="img-box">
                <div class="img-box-content">
                <h4><?php echo($data[4]['City_Name']);?> <span>(<?php echo($data[4]['ticket_count']);?>) </span></h4>
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
            <h4><?php echo($data[5]['City_Name']);?> <span>(<?php echo($data[5]['ticket_count']);?>) </span></h4>
            </div>
            <div class="img-box-background">
              <img class="img-fluid" src="assets/img/cities/<?php echo ($data[5]['City_Id']); ?>.jpg" alt="" />
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
              <i class="lni-bookmark-alt"></i>
            </div>
            <p>Rent Slot</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="works-item">
            <div class="icon-box">
              <i class="lni-thumbs-up"></i>
            </div>
            <p>Deal Done</p>
          </div>
        </div>
        <!-- <hr class="works-line" /> -->
      </div>
    </div>
  </section>

  <div class="call-back section-padding bg-light">
    <div class="container">
      <h4>Request a Free Call Back</h4>
      <div class="row">
        <div class="col-lg-8 col-md-6 col-xs-12">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" />
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input type="email" class="form-control" placeholder="catagory" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input type="text" class="form-control" id="phone" name="name" placeholder="Phone" />
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="form-group has-error">
                <input type="email" class="form-control" id="email" placeholder="Email" />
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
  </div>

  <section class="services section-padding">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="section-title">Key Features</h3>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
            <div class="icon">
              <i class="lni-leaf"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Elegant Design</a></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo
                aut magni perferendis.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
            <div class="icon">
              <i class="lni-display"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Responsive Design</a></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo
                aut magni perferendis.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
            <div class="icon">
              <i class="lni-color-pallet"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Clean UI</a></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo
                aut magni perferendis.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="0.8s">
            <div class="icon">
              <i class="lni-emoji-smile"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">UX Friendly</a></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo
                aut magni perferendis.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="1s">
            <div class="icon">
              <i class="lni-pencil-alt"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Easily Customizable</a></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo
                aut magni perferendis.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xs-12">
          <div class="services-item wow fadeInRight" data-wow-delay="1.2s">
            <div class="icon">
              <i class="lni-headphone-alt"></i>
            </div>
            <div class="services-content">
              <h3><a href="#">Security Support</a></h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo
                aut magni perferendis.
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
              <i class="lni-gift"></i>
            </div>
            <div class="pricing-header">
              <p class="price-value">$29</p>
            </div>
            <div class="title">
              <h3>Basic</h3>
            </div>
            <ul class="description">
              <li>Free ad posting</li>
              <li>No Featured ads availability</li>
              <li>Access to limited features</li>
              <li>For 30 days</li>
              <li>100% Secure!</li>
            </ul>
            <button class="btn btn-common">Purchase</button>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="table" id="active-tb">
            <div class="icon">
              <i class="lni-leaf"></i>
            </div>
            <div class="pricing-header">
              <p class="price-value">$49</p>
            </div>
            <div class="title">
              <h3>Standard</h3>
            </div>
            <ul class="description">
              <li>Free ad posting</li>
              <li>10 Featured ads availability</li>
              <li>Access to unlimited features</li>
              <li>For 30 days</li>
              <li>100% Secure!</li>
            </ul>
            <button class="btn btn-common">Purchase</button>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="table">
            <div class="icon">
              <i class="lni-layers"></i>
            </div>
            <div class="pricing-header">
              <p class="price-value">$69</p>
            </div>
            <div class="title">
              <h3>Premium</h3>
            </div>
            <ul class="description">
              <li>Free ad posting</li>
              <li>100 Featured ads availability</li>
              <li>Access to unlimited features</li>
              <li>For 30 days</li>
              <li>100% Secure!</li>
            </ul>
            <button class="btn btn-common">Purchase</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="counter-section section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 work-counter-widget">
          <div class="counter">
            <div class="icon"><i class="lni-layers"></i></div>
            <h2 class="counterUp">8325</h2>
            <p>Ad Posted</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 work-counter-widget">
          <div class="counter">
            <div class="icon"><i class="lni-users"></i></div>
            <h2 class="counterUp">5487</h2>
            <p>Members</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 work-counter-widget">
          <div class="counter">
            <div class="icon"><i class="lni-briefcase"></i></div>
            <h2 class="counterUp">2012</h2>
            <p>Premium Ads</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 work-counter-widget">
          <div class="counter">
            <div class="icon"><i class="lni-map"></i></div>
            <h2 class="counterUp">200</h2>
            <p>Locations</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonial section-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div id="testimonials" class="owl-carousel">
            <div class="item">
              <div class="img-thumb">
                <img src="assets/img/testimonial/img1.png" alt="" />
              </div>
              <div class="testimonial-item">
                <div class="content">
                  <p class="description">
                    Eiusmod tempor incidiunt labore velit dolore magna aliqu
                    sed eniminim veniam quis nostrud exercition eullamco
                    laborisaa, Eiusmod tempor incidiunt labore velit dolore
                    magna.
                  </p>
                  <div class="info-text">
                    <h2><a href="#">Josh Rossi</a></h2>
                    <h4><a href="#">CEO of Fiverr</a></h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img2.png" alt="" />
                </div>
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">
                      Eiusmod tempor incidiunt labore velit dolore magna aliqu
                      sed eniminim veniam quis nostrud exercition eullamco
                      laborisaa, Eiusmod tempor incidiunt labore velit dolore
                      magna.
                    </p>
                    <div class="info-text">
                      <h2><a href="#">Jessica</a></h2>
                      <h4><a href="#">CEO of Dropbox</a></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img3.png" alt="" />
                </div>
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">
                      Eiusmod tempor incidiunt labore velit dolore magna aliqu
                      sed eniminim veniam quis nostrud exercition eullamco
                      laborisaa, Eiusmod tempor incidiunt labore velit dolore
                      magna.
                    </p>
                    <div class="info-text">
                      <h2><a href="#">Johnny Zeigler</a></h2>
                      <h4><a href="#">CEO of Fiverr</a></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img4.png" alt="" />
                </div>
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">
                      Eiusmod tempor incidiunt labore velit dolore magna aliqu
                      sed eniminim veniam quis nostrud exercition eullamco
                      laborisaa, Eiusmod tempor incidiunt labore velit dolore
                      magna.
                    </p>
                    <div class="info-text">
                      <h2><a href="#">Josh Rossi</a></h2>
                      <h4><a href="#">CEO of Fiverr</a></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="item">
                <div class="img-thumb">
                  <img src="assets/img/testimonial/img5.png" alt="" />
                </div>
                <div class="testimonial-item">
                  <div class="content">
                    <p class="description">
                      Eiusmod tempor incidiunt labore velit dolore magna aliqu
                      sed eniminim veniam quis nostrud exercition eullamco
                      laborisaa, Eiusmod tempor incidiunt labore velit dolore
                      magna.
                    </p>
                    <div class="info-text">
                      <h2><a href="#">Priyanka</a></h2>
                      <h4><a href="#">CEO of Dropbox</a></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                <span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By Admin</a></span>
                <span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
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
                <span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By Admin</a></span>
                <span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
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
                <span class="user float-left"><a href="#"><i class="lni-user"></i> Posted By Admin</a></span>
                <span class="date float-right"><i class="lni-calendar"></i> 24 May, 2018</span>
              </div>
              <h3>
                <a href="single-post.html">Writing a better product description</a>
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

  <section class="subscribes section-padding">
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
              <input class="form-control" name="EMAIL" placeholder="Enter your Email" required="" type="email" />
              <button class="btn btn-common" type="submit">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
  include "contactLinksBar.php";
  include "footer.php";
  ?>