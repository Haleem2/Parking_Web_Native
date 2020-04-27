<?php
include "header.php";
?>
<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Contact Us</h2>
            <ol class="breadcrumb">
              <li><a href="#">Home /</a></li>
              <li class="current">Contact Us</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section id="google-map-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div style="border:0; height: 450px; width: 100%;">
          <img src="assets/img/map.jpeg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="content" class="section-padding">
    <div class="container">
      <div class="row ">
        <div class="col-12">
          <div class="information">
            <h3 class="text-center">Contact Info</h3>
            <div>
              <?php
                include_once "contactinfo.php";
                $continfo= new contactinfo();
                $log3= $continfo-> getcontactinfo();
                if ($row3= mysqli_fetch_assoc($log3))
                {
              ?>
              <table class="table text-center">
                  <tr>
                    <td scope="row"><img src="assets/img/location.png" alt="" style="width: 30px; height:30px;"/>&nbsp; &nbsp;<span>Address : </span></td>
                    <td class="text-danger"><?php echo($row3['address']); ?></td>
                  </tr>
                  <tr>
                    <td scope="row"> <img src="assets/img/mail.png" alt="" style="width: 30px; height:30px;"/>&nbsp; &nbsp;<span>Email : </span></td>
                    <td class="text-danger"><a href="<?php echo($row3['email']); ?>"><span class="__cf_email__ text-danger"><?php echo($row3['email']); ?></span></a></td>
                  </tr>
                  <tr>
                    <td scope="row"><img src="assets/img/phone.png" alt="" style="width: 30px; height:30px;"/>&nbsp; &nbsp;<span>Phone : </span></td>
                    <td class="text-danger">
                    <?php 
                          echo($row3['phone1']);
                          if ($row3['phone2']!= NULL)
                              echo(",&nbsp;".$row3['phone2']);
                      ?>
                      </td>
                  </tr>
              </table>
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
include "footer.php";
?>