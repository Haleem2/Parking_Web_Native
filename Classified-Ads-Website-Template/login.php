<?php
ob_start(); // Initiate the output buffer
session_start();
include "header.php";
?>
  <div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Login</h2>
            <ol class="breadcrumb">
              <li><a href="index.php">Home /</a></li>
              <li class="current">Login</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>


  <section class="login section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-12 col-xs-12">
          <div class="login-form login-area">
            <h3>
              Login Now
            </h3>
            <?php
            if(isset($_COOKIE['usercookie'])){				
              header('location:index.php');
            }	
            if (isset($_POST['log'])) {
            
            
            include_once "Car Owner.php";
            $owner= new Car_Owner();
      
            $owner->setPassword($_POST['password']);
            $owner->setPhoneNum($_POST['emailph']);
            $owner->setEmail($_POST['emailph']);
            $log=$owner->Login();
            if ($row=mysqli_fetch_assoc($log)) {
                if (isset($_POST['keeplog'])) {
                  
                  setcookie("usercookie",$_POST['emailph'],time()+60*60*24*365);
                  
                }

                $_SESSION['user']=$row['Name'];
                $_SESSION['id']=$row['Owner_Id'];
                header('location:index.php');
            }else {
              echo("<h3 class='alert alert-danger'> Error Email Or password</h3>");
            }
          }
            ?>
            <form role="form" class="login-form" method="post">
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-user"></i>
                  <input type="text" id="sender-email" class="form-control" name="emailph" placeholder="Email Or Phone">
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-lock"></i>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="keeplog" class="custom-control-input" id="checkedall">
                  <label class="custom-control-label" for="checkedall">Keep me logged in</label>
                </div>
                <a class="forgetpassword" href="forget_password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <input type="submit" name="log" value="Log In" class="btn btn-common log-btn">
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