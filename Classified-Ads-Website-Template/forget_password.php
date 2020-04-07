<?php
ob_start();
include "header.php";
require_once "src/PHPMailer.php";
require_once "src/Exception.php";
require_once "src/SMTP.php";
require_once "vendor/autoload.php";
session_start();
?>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Forgot Password</h2>
            <ol class="breadcrumb">
              <li><a href="index.php">Home /</a></li>
              <li class="current">Forget Password</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-12 col-xs-12">
          <div class="forgot login-area">
            <h3>
              Forget Password
            </h3>
            <?php
            if (isset($_POST['checkbtn'])) {
            
            
            include_once "Car Owner.php";
            $owner= new Car_Owner();
            $activation;
            $owner->setEmail($_POST['emailph']);
            $log=$owner->CheckEmail();
            if ($row=mysqli_fetch_assoc($log)) {
             
              $activation= rand(1000,9999);
              $link="http://localhost:8888/Classified-Ads-Website-Template/Classified-Ads-Website-Template/updatePassword.php?id=".$row['Owner_Id'];
            
             //send mail with activation code 
              $mail = new  PHPMailer\PHPMailer\PHPMailer();
	
              $mail->IsSMTP();
              //$mail->SMTPDebug = 1;
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = 'ssl';
              $mail->Host = "smtp.gmail.com";
              $mail->Port = 465; // or 587
              $mail->IsHTML(true);

              $mail->Username = "yourmobileapp2017@gmail.com";
              $mail->Password = "ABC@123456bb";

              $mail->setFrom('yourmobileapp2017@gmail.com', 'NTI');
              $mail->addAddress($_POST['emailph'], "nn");
          
              
              $mail->Subject = 'Forget Password Parking online NTI';
              $mail->Body = "Dear , Your Activation Code is : <strong>".$activation ."</strong> <br>please  visit this link: ".$link;

              if(!$mail->send()) {
                echo "Opps! For some technical reasons we couldn't able to sent you an email. We will shortly get back to you with download details.";	
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                $_SESSION['code']=$activation;
                echo("<h3 class='alert alert-success'>Message has been sent , check your email </h3>");
            }
            }else {
              echo("<h3 class='alert alert-danger'> Not Registerd Email</h3>");
            }
          }
            ?>
            <form role="form" method="post" class="login-form">
              <div class="form-group">
                <div class="input-icon">
                  <i class="icon lni-user"></i>
                  <input type="text" id="sender-email" class="form-control" name="emailph" placeholder="Email">
                </div>
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-common log-btn" name="checkbtn" value="Send activation code">
              </div>
              <div class="form-group mt-4">
                <ul class="form-links">
                  <li class="float-left"><a href="register.php">Don't have an account?</a></li>
                  <li class="float-right"><a href="login.php">Back to Login</a></li>
            
                </ul>
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