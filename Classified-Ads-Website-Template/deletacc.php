<?php
ob_start();
session_start();
include "headerAfter.php";
?>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Forgot Password</h2>
            <ol class="breadcrumb">
              <li><a href="#">Home /</a></li>
              <li class="current">Delet Account Page</li>
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
              Delete account form
            </h3>
						<h3 class='alert alert-warning'>Are you sure to delete account : <?php echo($_SESSION['user']); ?></h3>
                      <?php
                      if (isset($_POST['checkbtn'])) {
                      
                      
                      include_once "Car Owner.php";
                      $owner= new Car_Owner();
                      $owner->setPassword($_POST['txtpass']);
                      $owner->setID($_SESSION['id']);
                      $log=$owner->CheckById();
                      if ($row=mysqli_fetch_assoc($log)) {
                      
                        $msg=$owner->Delet();

                        if ($msg=='ok') {
                          echo("<h3 class='alert alert-success'>Your Account has been deleted</h3>");
                          header('Refresh:10; url=logout.php');

                        }else{
                          echo($msg);
                        }
                    }else{
                      echo("<h3 class='alert alert-danger'>Invalid Password</h3>");
                    }}
                      ?>
            <form role="form" method="post" class="login-form">
              <div class="form-group">
                <div class="input-icon">
                  <i class="icon lni-user"></i>
                  <input type="password" id="sender-email" required class="form-control" name="txtpass" placeholder="Password">
                </div>
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-common log-btn" name="checkbtn" value="Delet Account">
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