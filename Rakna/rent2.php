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
           <div class="text-center">
            <h3>You can get it from</h3>
            <?php
                if(isset($_POST["btncont"]))
                {
                    header('location: rent3.php');
                }
                if(isset($_POST["btnback"]))
                {
                    unset($_SESSION['rentalcar']);
                    header('location: rent1.php');
                }
                include_once "rentalcars.php"; 
                $rcars=new rentalcars();
                $rcars-> Setrentalcarno($_SESSION['rentalcar']);
                $log= $rcars-> getcarplace(); 
                if($row= mysqli_fetch_assoc($log))
                {
                    echo("<h4> Parking:&nbsp".$row['Parking_Name']."</h4>"); 
                    echo("<h4> Slot Code:&nbsp".$row['slot_code']."</h4>");
                }
            ?>
            <form class="login-form" method="post">
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-common log-btn" style="width:45%" name="btncont" value="Continue">
                    <input type="submit" class="btn btn-common log-btn" style="width:45%" name="btnback" value="Back">
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