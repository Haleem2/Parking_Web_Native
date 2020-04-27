<footer>
  <section class="footer-Content">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
          <div class="widget">
            <div class="footer-logo">
              <img src="assets/img/logo.png" alt="" />
            </div>
            <div class="textwidget">
              <p>
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
                odit aut fugit, sed quia consequuntur magni dolores eos qui
                ratione voluptatem sequi nesciunt consectetur, adipisci
                velit.
              </p>
            </div>
            <ul class="mt-3 footer-social">
              <li>
                <a class="facebook" href="#"><i class="lni-facebook-filled"></i></a>
              </li>
              <li>
                <a class="twitter" href="#"><i class="lni-twitter-filled"></i></a>
              </li>
              <li>
                <a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a>
              </li>
              <li>
                <a class="google-plus" href="#"><i class="lni-google-plus"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
          <div class="widget">
            <h3 class="block-title">Quick Link</h3>
            <ul class="menu">
              <li><a href="Cities.php">- Cities</a></li>
              <li><a href="City_details.php?id=1">- Parking</a></li>
              <li><a href="delivery1.php">- Delivery</a></li>
              <li><a href="rent1.php">- Rent</a></li>
              <li><a href="<?php echo(isset($_SESSION['id'])?'contactuser.php':'contact.php'); ?>">- Contact Us</a></li>
              <!-- <li><a href="#">- Blog</a></li>
              <li><a href="#">- Events</a></li>
              <li><a href="#">- Shop</a></li>
              <li><a href="#">- FAQ's</a></li> -->
            </ul>
          </div>
        </div>
        <?php
          include_once "contactinfo.php";
          $continfo= new contactinfo();
          $log3= $continfo-> getcontactinfo();
          if ($row3= mysqli_fetch_assoc($log3))
          {
        ?>
        <div class="col-lg-4 col-md-4 col-xs-6 col-mb-12">
          <div class="widget">
            <h3 class="block-title">Contact Info</h3>
            <ul class="contact-footer">
              <li>
                <strong><i class="lni-phone"></i></strong><span><?php 
                    echo($row3['phone1']);
                    if ($row3['phone2']!= NULL)
                        echo("<br/>".$row3['phone2']);
                  ?></span>
              </li>
              <li>
                <strong><i class="lni-envelope"></i></strong><span><a href="<?php echo($row3['email']); ?>" class="__cf_email__"><?php echo($row3['email']); ?></a>
              </li>
              <li>
                <strong><i class="lni-map-marker"></i></strong><span><a href="#"><?php echo($row3['address']); ?></a></span>
              </li>
            </ul>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </section>
</footer>