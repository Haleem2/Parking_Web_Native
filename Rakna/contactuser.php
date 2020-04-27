<?php
ob_start();
session_start();
// $_SESSION['id']=14;
// $_SESSION['user']="Haleem";
include "headerAfter.php";
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
  <?php
        include_once "message.php";
        $message= new message();
        $message-> SetUserId($_SESSION['id']);
        $log1= $message-> getlastmessage();
        if ($row1= mysqli_fetch_assoc($log1))
        {
            echo ("<section id='content' class='mt-5'><div class='container'><div class='row'><div class='col-12'><h5 class='contact-title text-dark'>Your Previous Message:</h5><table class='table table-bordered'><tr><th scope='row'>Subject</th><td>".$row1['subject']."</td></tr><tr><th scope='row'>Message</th><td>".$row1['messageBody']."</td></tr>");
            if ($row1['adminReply']!= NULL)
            {
                echo("<tr><th scope='row'>Response</th><td>".$row1['adminReply']."</td></tr>");
            }
            echo("</table></div></div></div></section>");
        }
    ?>
  <section id="content" class="section-padding">
    <div class="container">
      <div class="row ">
        <div class="col-lg-8 col-md-8 col-xs-12">
        <form class="contact-form" method="post">
            <h2 class="contact-title">Send Message</h2>
            <?php
                if (isset($_POST['btnsubmit'])) 
                {
                    $message-> Setsubject($_POST["txtsubject"]);
                    $message-> Setcontent($_POST["txtmessage"]);
                    $msg= $message->Add();
                    if($msg=="ok")
                    {
                        echo("<h6 class='alert alert-success'>Your Message is sent, The admin will respond ASAP</h6>");
                    }
                    else
                        echo($msg); 
                }
                include_once "Car Owner.php";
                $user= new Car_Owner();
                $user-> setID($_SESSION['id']);
                $log1= $user-> GetDataById();
                if ($row2= mysqli_fetch_assoc($log1))
                {
        ?>
            <div class="row">
              <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-control"><?php echo($row2['Name']); ?></div>
                    </div>
              </div>
              <div class="col-md-4">
                    <div class="form-group">
                      <div class="form-control"><?php echo($row2['Email']); ?></div>
                    </div>
              </div>
        <?php
            }
        ?>
              <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="msg_subject" name="txtsubject" placeholder="Subject" required/>
                </div>
              </div>
            </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="txtmessage" placeholder="Message" rows="7" required></textarea>
                    </div>
                  </div>
                </div>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" class="btn btn-common  log-btn" style="width:100%" name="btnsubmit" value="Submit Now">  
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
          <div class="information h-100">
            <h3>Contact Info</h3>
            <div class="contact-datails">
              <?php
                include_once "contactinfo.php";
                $continfo= new contactinfo();
                $log3= $continfo-> getcontactinfo();
                if ($row3= mysqli_fetch_assoc($log3))
                {
              ?>
              <br/>
              <ul>
                <li>
                  <img src="assets/img/location.png" alt="" style="width: 30px; height:30px;"/>&nbsp; &nbsp;
                  <span>Address : </span>
                  <p class="text-danger ml-5"><?php echo($row3['address']); ?></p><br/>
                </li>
                <li>
                <img src="assets/img/mail.png" alt="" style="width: 30px; height:30px;"/>&nbsp; &nbsp;
                  <span>Email : </span>
                  <p  class="ml-5">
                    <a href="<?php echo($row3['email']); ?>"><span class="__cf_email__ text-danger"><?php echo($row3['email']); ?></span></a>
                  </p><br/>
                </li>
                <li>
                <img src="assets/img/phone.png" alt="" style="width: 30px; height:30px;"/>&nbsp; &nbsp;
                  <span>Phone : </span>
                  <p  class="text-danger  ml-5">
                  <?php 
                    echo($row3['phone1']);
                    if ($row3['phone2']!= NULL)
                        echo(",&nbsp;".$row3['phone2']);
                  ?>
                  </p><br/>
                </li>
              </ul>
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