<?php
session_start();
// $_SESSION['id']=14;
// $_SESSION['user']="Haleem";
include "headerAfter.php";
?>

</br></br></br></br>
    
  <h2 class="product-title" style="color:#e91e63;text-align: center">RENT FORM</h2>

  <section class="register section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-md-12 col-xs-12">
          <div class="register-form login-area">
          <div class="text-center">
           <h3>Enter Your Personal Information</h3>
          </div>
            <?php
                if(isset($_POST["btnsubmit"]))
                {
                    include_once "Car Owner.php";
                    $carowner= new Car_Owner();
                    $carowner-> setID($_SESSION['id']);
                    $carowner-> setnationalid($_POST["txtnationalid"]);
                    $carowner-> setphotoName($_POST["txtphoto"]);
                    $msg1= $carowner->updatenationalidandphoto();
                    if($msg1=="ok")
                    {
                        echo("");
                    }
                    else
                        echo($msg1); 
                    include_once "rentalcars.php";
                    $rcars= new rentalcars();
                    $rcars-> Setrentalcarno($_SESSION['rentalcar']);
                    $msg2= $rcars-> changestatus();
                    if($msg2=="ok")
                    {
                        echo("");
                    }
                    else
                        echo($msg2);
                    include_once "rent.php";
                    $rent= new rent();
                    $rent-> SetUserId($_SESSION['id']);
                    $rent-> Setrentalcarno($_SESSION['rentalcar']);
                    $rent-> Setdatefrom($_POST["txtdatefrom"]);
                    $rent-> Setdateto($_POST["txtdateto"]);
                    $rent-> Settimefrom($_POST["txttimefrom"]);
                    $rent-> Settimeto($_POST["txttimeto"]);
                    $msg3= $rent->Add();
                    if($msg3=="ok")
                    {
                        header('location: rent4.php');
                    }
                    else
                        echo($msg3); 
                }
            ?>
            <form class="login-form" method="post">
                <div class="form-group">
                    NATIONAL ID
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="number"  required class="form-control" name="txtnationalid" >
                    </div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">UPLOAD COPY OF NATIONAL ID</label>
                  <input type="file" required class="form-control-file" id="exampleFormControlFile1" name="txtphoto">
                </div>
                <div class="form-group">
                    DATE FROM
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="date" id="" required class="form-control" name="txtdatefrom" >
                    </div>
                </div>
                <div class="form-group">
                    DATE TO
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="date" id="" required class="form-control" name="txtdateto" >
                    </div>
                </div>
                <div class="form-group">
                    TIME FROM
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="time" id="" required class="form-control" name="txttimefrom" >
                    </div>
                </div>
                <div class="form-group">
                    TIME TO
                    <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="time" id="" required class="form-control" name="txttimeto" >
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-common log-btn" style="width:100%" name="btnsubmit" value="Submit">
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