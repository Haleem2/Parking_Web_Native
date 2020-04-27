<?php
ob_start();
include "header.php";
session_start();
?>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Forgot Password</h2>
            <ol class="breadcrumb">
              <li><a href="#">Home /</a></li>
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
              Update Password
            </h3>
            <?php
            if (isset($_POST['updateButt'])) {
            
							if ($_POST['acivationtxt'] == $_SESSION['code']) {

                if ($_POST['password']==$_POST['repassword']) {
                  $reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                  if (preg_match($reg,$_POST['password'])) {
  
						
                  include_once "Car Owner.php";
                  $owner= new Car_Owner();
                  $owner->setPassword($_POST['password']);
                  $owner->setID($_GET['id']);
                  $update=$owner->Update();
                  if ($update=="ok") {

                    echo("<h3 class='alert alert-success'> Your Password Has Been Updated</h3>");
                    header("Refresh:5;  url=login.php");
                    
                  }else {
                    echo("<h3 class='alert alert-danger'> Not Registerd Email</h3>");
                  }

              }else{
                echo("<h3 class='alert alert-danger'>Sorry Password is Weak</h3> <h5 class='alert alert-danger'>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special characte</h5>");

              }

            }else{
              echo("<h3 class='alert alert-danger'>Sorry Not Matched Password</h3>");
            }
          }else {
								echo("<h3 class='alert alert-danger'> Wrong Code</h3>");
							}
        }
            ?>
            <form role="form" method="post" class="login-form">
              <div class="form-group">
                <div class="input-icon">
                  <i class="icon lni-user"></i>
                  <input type="text" required id="sender-email" class="form-control" name="acivationtxt" placeholder="Activation Code">
                </div>  
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-lock"></i>
                  <input type="password" required name="password" class="form-control" placeholder="New Password">
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-lock"></i>
                  <input type="repassword" required name="password" class="form-control" placeholder="Rewrite New Password">
                </div>
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-common log-btn" name="updateButt" value="Update Password">
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