<?php
session_start();
include "headerAfter.php";
?>

</br></br></br></br>
    
  <h2 class="product-title" style="color:#e91e63;text-align: center">RENT FORM</h2>

  <section class="register section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-xs-12">
          <div class="register-form login-area">
           <div>
            <h3 class="text-center">We will Deliver it for you</h3>
            <?php
                if(isset($_POST["btncancel"]))
                {
                    unset($_SESSION['rentalcar']);
                    unset($_SESSION['rentno']);
                    header('location: indexUser.php');
                }
                include_once "Employee.php";
                $e= new employee();
                $log= $e-> getlastemployee();
                if($row= mysqli_fetch_assoc($log))
                {
                    $e-> SetEmployeeId($row['employeeid']);    
                    if(isset($_POST["btnsubmit"]))
                    { 
                        $e-> UpdateStatus();
                        include_once "rentdelivery.php";
                        $rd= new rentdelivery();
                        $rd-> SetLocation($_POST["txtlocation"]);
                        $rd-> SetRentNo($_SESSION['rentno']);
                        $rd-> SetEmployeeId($row['employeeid']);
                        $msg= $rd->Add();
                        if($msg=="ok")
                        {
                          header("Location: rentdeliveryconfirm.php");
                        }
                        else
                            echo($msg); 
                    }
            ?>
            <form class="login-form" method="post">
                <div class="form-group">
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="text" required class="form-control" name="txtlocation" placeholder="Location">
                </div>
                </div>
                <?php
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
    </div>
  </section>


<?php
include "footer.php";
?>