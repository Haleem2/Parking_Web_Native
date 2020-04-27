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
          <h3>
            Available Rental Cars
          </h3>
          <?php
            if (isset($_POST['btnsubmit'])) 
            {
                $_SESSION['rentalcar']= $_POST['txtcar'];
                header('location: rent2.php');
            } 
            include_once "rentalcars.php"; 
            $rcars=new rentalcars();
            $log= $rcars-> getavailablecars();
            $x=1;
            if ($log->num_rows > 0)
            {
              while($row= mysqli_fetch_assoc($log))
              {
         ?>
          <form class="login-form" method="post">
                <div class="form-control px-4">
                    <input type="checkbox" class="form-check-input" name="txtcar" value="<?php echo($row['rentalcarno']); ?>" id="defaultCheck<?php echo($x); ?>">
                    <label class="form-check-label" for="defaultCheck<?php echo($x); ?>"><?php echo($row['rcartype']); echo("&nbsp".$row['rcarcolor']);?></label>
                </div>
                <br/>

            <?php
              $x++;
              }
            }
            else 
                echo("<h6 class='alert alert-info'>No Available Rental Cars</h6>");
            ?>
              <div class="text-center">
                <input type="submit" class="btn btn-common  log-btn" style="width:100%" name="btnsubmit" value="Continue">
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