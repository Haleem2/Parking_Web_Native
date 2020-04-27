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
            <h2 class="product-title">Delivery Form</h2>
            <ol class="breadcrumb">
              <li><a href="indexUser.php">Home /</a></li>
              <li class="current"><a href="delivery1.php">Delivery</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="register section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-xs-12">
          <div class="register-form login-area">
            <?php
                if(isset($_POST["btncancel"]))
                {
                    unset($_SESSION['cars']);
                    header('location: indexUser.php');
                }
                $y=0;
                include_once "Employee.php";
                $e= new employee();
                $log= $e-> getlastemployee();
                if($row= mysqli_fetch_assoc($log))
                {
                    $e-> SetEmployeeId($row['employeeid']);    
                    for ($x=1; $x<= count($_SESSION['cars']); $x++)
                    {
            ?>
            <h3>
            Car Number: <?php
                echo ($_SESSION['cars'][$y]); ?>
            </h3>
            <?php 
                    if(isset($_POST["btnsubmit"]))
                    {
                        $e-> UpdateStatus();
                        include_once "delivery.php";
                        $delivery= new delivery();
                        $delivery-> SetLocation($_POST["txtlocation$x"]);
                        $delivery-> SetTime($_POST["txttime$x"]);
                        $delivery-> SetCarNo($_SESSION['cars'][$y]);
                        $delivery-> SetUserId($_SESSION['id']);
                        $delivery-> SetEmployeeId($row['employeeid']);
                        $msg= $delivery->Add();
                        if($msg=="ok")
                        {
                            header('location: deliveryconfirm3.php');
                        }
                        else
                            echo($msg); 
                    }

            ?>
            <form class="login-form" method="post">
                <div class="form-group">
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="text" id="" required class="form-control" name="txtlocation<?php echo($x);?>" placeholder="Location">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="time" id="" required class="form-control" name="txttime<?php echo($x);?>" placeholder="Time">
                    </div>
                </div>
                      <?php
                        $y++;
                        }
                        echo("<div class='form-group'><div class='input-icon'><i class='lni-user'></i><p class='mx-5'>");
                        echo("Employee Name:&nbsp".$row['employeename']."<br/>"); 
                        echo("Employee Phone Number:&nbsp".$row['employeephone']);     
                        echo("</p></div></div>");                  
                        }
                        else
                          echo("<h6 class='alert alert-danger'>Sorry No employees are available now, Please try again later</h6>");
                      ?>
              <div class="d-flex justify-content-between">
                <input type="submit" class="btn btn-common log-btn" style="width:45%" name="btnsubmit" value="Submit">
                <input type="submit" class="btn btn-common log-btn" style="width:45%" name="btncancel" value="Cancel">
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