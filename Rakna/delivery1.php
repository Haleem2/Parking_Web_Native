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
            <h3>
            Your Parked Cars
            </h3>
            <?php
               if (isset($_POST['btnsubmit'])) 
               {
                if(!empty($_POST['check_list']))
                {
                    $_SESSION['cars']=array();
                    foreach($_POST['check_list'] as $checked)
                    {
                      array_push($_SESSION['cars'],$checked);
                    }
                } 
                header('location: deliveryform2.php');                            
              }
              include_once "TicketOrders.php";
              $ticket= new ticket();
              $ticket-> Setownerid($_SESSION['id']);
              $log= $ticket->GetParkedCarsByUserid();
              $x=1;
              if ($log->num_rows > 0)
              {
                while($row = $log->fetch_assoc())
                 {
            ?>
            <form class="login-form" method="post">
                <div class="form-control px-4">
                    <input type="checkbox" class="form-check-input" name="check_list[]" value="<?php echo($row['Car_Number']); ?>" id="defaultCheck<?php echo($x); ?>">
                    <label class="form-check-label" for="defaultCheck<?php echo($x); ?>"><?php echo("Car Number:<b>".$row['Car_Number']."</b>&nbsp Car Type:<b>".$row['Car Type']."</b>"); ?></label>
                </div>
                <br/>

            <?php
              $x++;
              } 
            }
            else 
                echo("<h6 class='alert alert-info'>No Cars are Parked</h6>");
            ?>
              <div class="text-center">
                <input type="submit" class="btn btn-common  log-btn" style="width:100%" name="btnsubmit" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
include_once "contactLinksBar.php";
include "footer.php";
?>