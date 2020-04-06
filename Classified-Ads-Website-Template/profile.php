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
            <h2 class="product-title">Login</h2>
            <ol class="breadcrumb">
              <li><a href="index.php">Home /</a></li>
              <li class="current">My Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="login section-padding">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-xs-12">
          <div class="login-form login-area " style="color:black;">
            <h3 style="">
            My Profile Form
            </h3>

            <?php
            
            include_once "Car Owner.php";
            $owner= new Car_Owner();
            $owner->setID($_SESSION['id']);
            $data=$owner->GetDataById();
            if ($row=mysqli_fetch_assoc($data)) {
            ?>
            <form role="form" class="login-form" method="post">

            <table class="table table-striped">
                <tr>
                  <td colspan="2" style="text-align:center">
                    <img src="customer images/<?php echo($row['Photo_Name']);?>" width="150px" height="150px" class="rounded-circle" />
                  </td>
                </tr>
                <tr>
                  <th scope="col">Name</th>
                  <td><?php echo($row['Name']); ?> </td>
                </tr>
                <tr>
                  <th scope="col">Email</th>
                  <td><?php echo($row['Email']); ?> </td>
                </tr>

                <tr>
                  <th scope="col">Phone</th>
                  <td><?php echo($row['Phone_Number']); ?> </td>
                </tr>

                <tr>
                  <th scope="col">Address</th>
                  <td><?php echo($row['Address']); ?> </td>
                </tr>
                <tr>
                  <th scope="col">Car Number</th>
                  <td><?php echo($row['Car Number']); ?> </td>
                </tr>
                <tr>
                  <th scope="col">Car Color</th>
                  <td><?php echo($row['Car Color']); ?> </td>
                </tr>
                <tr>
                  <th scope="col">Car License Number</th>
                  <td><?php echo($row['Car License Number']); ?> </td>
                </tr>

            </table>
            <?php }?>
            
                <a href="editprofile.php" class="form-group btn btn-success log-btn" style="width:100%;">Edit Profile</a>
                <a href="deletacc.php" class="form-group btn btn-danger log-btn" style="width:100%;">Delete Your Profile</a>
                <!-- <input type="submit" name="btnDelet" value="Delete Your Profile" class="btn btn-danger " style="width:100%;"> -->
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
include "contactLinksBar.php";
include "footer.php";
?>