<?php
ob_start();
session_start();
// $_SESSION['id']=14;
// $_SESSION['user']="Haleem";
$flag1;
$flag2;
$flag3;
include "headerAfter.php";
?>
<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Your Orders</h2>
            <ol class="breadcrumb">
              <li><a href="indexUser.php">Home /</a></li>
              <li class="current"><a href="userorders.php">Orders</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="register section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12 col-xs-12">
          <div class="register-form login-area">

          <?php
          ///////////////////////////////////////////////////////////////// 1-ticket
            include_once "TicketOrders.php";
            $t= new ticket();
            $t-> Setownerid($_SESSION['id']);
            $log1= $t-> todayordersforuser();
            if ($log1->num_rows > 0)
            {
              $x=1;
          ?>
            <h3 class="text-center">Parking Orders</h3>
            <form method="post">
            <table class="table table-responsive">
              <thead>
                <tr>
                <th scope="col">#</th>
                  <th scope="col">Car Number</th>
                  <th scope="col">License Number</th>
                  <th scope="col">Car Type</th>
                  <th scope="col">Car Color</th>
                  <th scope="col">Parking Name</th>
                  <th scope="col">Slot Code</th>
                  <th scope="col">From Day</th>
                  <th scope="col">To Day</th>
                  <th scope="col">From Time</th>
                  <th scope="col">To Time</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
          <?php
              while($row1 = $log1->fetch_assoc())
              {
          ?>
                <tr>
                <td><?php echo($x); ?></td>
                  <td><?php echo($row1['Car_Number']); ?></td>
                  <td><?php echo($row1['Car License Number']); ?></td>
                  <td><?php echo($row1['Car Type']); ?></td>
                  <td><?php echo($row1['Car Color']); ?></td>
                  <td><?php echo($row1['Parking_Name']); ?></td>
                  <td><?php echo($row1['slot_code']); ?></td>
                  <td><?php echo($row1['Date_From']); ?></td>
                  <td><?php echo($row1['Date_To']); ?></td>
                  <td><?php echo($row1['Time_From']); ?></td>
                  <td><?php echo($row1['Time_To']); ?></td>
                  <td><button class="btn btn-danger" name="btndeleteticket<?php echo($x); ?>" 
                  <?php
                  $new_time = date("Y-m-d H:i:s", strtotime('-2 hours'));
                  if ($row1['Reservation_Time'] <= $new_time)
                    echo("disabled");
                   ?>>Delete</button></td>
                </tr>
          <?php
                if(isset($_POST['btndeleteticket'.$x]))
                {
                  $t-> Setticketid($row1['ticket_id']);
                  $t-> Delet();
                  header('location: userorders.php');  
                }
                $x++;
              }
          ?>
              </tbody>
            </table>
          </form>
          <?php
            }
            else
              $flag1=1;

          ///////////////////////////////////////////////////////////////// 2-delivery
            include_once "delivery.php";
            $d= new delivery();
            $d-> SetUserId($_SESSION['id']);
            $log2= $d-> todayordersforuser();
            if ($log2->num_rows > 0)
            {
              $y=1;
          ?>
            <h3 class="text-center">Delivery Orders</h3>
            <form method="post">
            <table class="table  table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Car Number</th>
                  <th scope="col">License Number</th>
                  <th scope="col">Car Type</th>
                  <th scope="col">Car Color</th>
                  <th scope="col">Employee Name</th>
                  <th scope="col">Employee Phone Number</th>
                  <th scope="col">Time</th>
                  <th scope="col">Location</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
          <?php
              while($row2 = $log2->fetch_assoc())
              {
          ?>
                <tr>
                  <td><?php echo($y); ?></td>
                  <td><?php echo($row2['carno']); ?></td>
                  <td><?php echo($row2['licenseno']); ?></td>
                  <td><?php echo($row2['cartype']); ?></td>
                  <td><?php echo($row2['carcolor']); ?></td>
                  <td><?php echo($row2['employeename']); ?></td>
                  <td><?php echo($row2['employeephone']); ?></td>
                  <td><?php echo($row2['time']); ?></td>
                  <td><?php echo($row2['location']); ?></td>
                  <td><button class="btn btn-danger" name="btndeletedelivery<?php echo($y); ?>" 
                  <?php
                  $new_time = date("Y-m-d H:i:s", strtotime('-2 hours'));
                  if ($row2['deliveytimestamp'] <= $new_time)
                    echo("disabled");
                   ?>>Delete</button></td>
                </tr>
          <?php
                if(isset($_POST['btndeletedelivery'.$y]))
                {
                  $d-> SetDeliveryNo($row2['deliveryno']);
                  $d-> Delet();
                  header('location: userorders.php');  
                }
                $y++;
              }
          ?>
              </tbody>
            </table>
          </form>
          <?php
            }
            else
              $flag2=1;

        ///////////////////////////////////////////////////////////////// 3-rent
          include_once "rent.php";
          $r= new rent();
          $r-> SetUserId($_SESSION['id']);
          $log3= $r-> todayordersforuser();
          if ($log3->num_rows > 0)
          {
            $z=1;
        ?>
          <h3 class="text-center">Rent Orders</h3>
          <form method="post">
          <table class="table  table-responsive">
            <thead>
              <tr>
              <th scope="col">#</th>
                <th scope="col">Rental Car Number</th>
                <th scope="col">License Number</th>
                <th scope="col">Car Type</th>
                <th scope="col">Car Color</th>
                <th scope="col">Parking Name</th>
                <th scope="col">Slot Code</th>
                <th scope="col">From Day</th>
                <th scope="col">To Day</th>
                <th scope="col">From Time</th>
                <th scope="col">To Time</th>
                <th scope="col">Delivery Request</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
        <?php
            while($row3 = $log3->fetch_assoc())
            {
              include_once "rentdelivery.php";
              $rd= new rentdelivery();
              $rd-> SetRentNo($row3['rentno']);
              $check= $rd-> checkrenthasdelivery();
        ?>
              <tr>
              <td><?php echo($z); ?></td>
                <td><?php echo($row3['rentalcarno']); ?></td>
                <td><?php echo($row3['rcarlicenseno']); ?></td>
                <td><?php echo($row3['rcartype']); ?></td>
                <td><?php echo($row3['rcarcolor']); ?></td>
                <td><?php echo($row3['Parking_Name']); ?></td>
                <td><?php echo($row3['slot_code']); ?></td>
                <td><?php echo($row3['datefrom']); ?></td>
                <td><?php echo($row3['dateto']); ?></td>
                <td><?php echo($row3['timefrom']); ?></td>
                <td><?php echo($row3['timeto']); ?></td>
                <td>
                <?php
                  if ($deliveryrow = $check->fetch_assoc())
                    echo ("Yes");
                  else
                    echo ("No");
                ?>
                </td>
                <td><button class="btn btn-danger" name="btndeleterent<?php echo($z); ?>" 
                <?php
                $new_time = date("Y-m-d H:i:s", strtotime('-2 hours'));
                if ($row3['timestamp'] <= $new_time)
                  echo("disabled");
                  ?>>Delete</button></td>
              </tr>
        <?php
              if(isset($_POST['btndeleterent'.$z]))
              {
                $r-> SetrentNo($row3['rentno']);
                $r-> Delet();
                header('location: userorders.php');  
              }
              $z++;
            }
        ?>
            </tbody>
          </table>
        </form>
        <?php
          }
          else
            $flag3=1;
    
          ///////////////////////////////////////////////////////////////// no orders
          if (isset($flag1) && isset($flag2) && isset($flag3))
          {
            echo ("<h3 class='alert alert-dark text-center'>No Orders have been made Today</h3>");
          }
          ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
include "footer.php";
?>