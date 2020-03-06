
<?php
ob_start();
include "header.php";
?>

<script>
    $(function () {
        $('#addopt').click(function () {
            var carNum = $('#carNum').val();
            var carColor= $('#carColor').val();
            var carLiesence= $('#carLiesence').val();
            var carModel= $('#carModel').val();

            if (carNum == '' || carColor =='' || carLiesence =='' || carModel == '' ) {
                alert('Please enter all fields!');
                return;
            }
            //check if the option value is already in the select box
            var flag=true;
            $('#carNumOpt option').each(function (index) {
                if ($(this).val() == carNum) {
                    flag=false;
                    alert('Duplicate option, Please enter new!');
                }
            })

            $('#carLisenceOpt option').each(function (index) {
                if ($(this).val() == carLiesence) {
                    flag=false;
                    alert('Duplicate option, Please enter new!');
                }
            })


            if(flag==true)
            {
            //add the new option to the select box
            $('#carNumOpt').append('<option value=' + carNum + '>' + carNum + '</option>');
            //select the new option (particular value)
            $('#carNumOpt option[value="' + carNum + '"]').prop('selected', true);
            
             //add the new option to the select box
             $('#carColorOpt').append('<option value=' + carColor + '>' + carColor + '</option>');
            //select the new option (particular value)
            $('#carColorOpt option[value="' + carColor + '"]').prop('selected', true);

             //add the new option to the select box
             $('#carLisenceOpt').append('<option value=' + carLiesence + '>' + carLiesence + '</option>');
            //select the new option (particular value)
            $('#carLisenceOpt option[value="' + carLiesence + '"]').prop('selected', true);

             //add the new option to the select box
            $('#carModelOpt').append('<option value=' + carModel + '>' + carModel + '</option>');
            //select the new option (particular value)
            $('#carModelOpt option[value="' + carModel + '"]').prop('selected', true);
            }
        });
    });

    
</script>


<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-wrapper">
            <h2 class="product-title">Join Us</h2>
            <ol class="breadcrumb">
              <li><a href="#">Home /</a></li>
              <li class="current">Register</li>
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
            if (isset($_POST['submit'])) {
              if (isset($_POST['chkterms'])) {
                
              
              include_once "Car Owner.php";
              if ($_POST['password']==$_POST['repassword']) {
                $reg="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
                if (preg_match($reg,$_POST['password'])) {

                  $owner = new Car_Owner();
                  $owner->setName($_POST['name']);
                  $owner->setPassword($_POST['password']);
                  $owner->setPhoneNum($_POST['phone']);
                  $owner->setAddress($_POST['address']);
                  $owner->setEmail($_POST['email']);
 
                  
                 $msg= $owner->Add();
                 if ($msg=="ok") {

                    $d=$owner->GetDataByPhone();
                    $row=mysqli_fetch_assoc($d);
                    $id=$row['Owner_Id'];

                    $msgcars='';
                    $car_color=[];
                    $car_model=[];
                    $car_num=[];
                    $car_license=[];

                    $car_num=$_POST['lstCarNum'];
                    $car_color=$_POST['lstCarColor'];
                    $car_model=$_POST['lstCarModel'];
                    $car_license=$_POST['lstCarLisence'];

                    for ($i=0; $i < count($car_color) ; $i++) { 

                      $owner->setID($id);
                      $owner->setCarNum($car_num[$i]);
                      $owner->setCarType($car_model[$i]);
                      $owner->setCarLicesnse($car_license[$i]);
                      $owner->setCarColor($car_color[$i]);
                      $msgcars=$owner->AddCar();
                    }

                    if ($msgcars=="ok") {
                      echo("<h3 class='alert alert-success'> Regisitration done</h3>");
                      header("Refresh:5 url=login.php");
                      
                    }else {
                      echo($msgcars);
                    }

                 }else if(strpos($msg,"UQphone")){
                   echo("<h3 class='alert alert-danger'> Sorry this phone is used</h3>");
                 }else if(strpos($msg,"UQemail")){
                  echo("<h3 class='alert alert-danger'> Sorry this mail is used</h3>");
                }

                  
                }else{
                  echo("<h3 class='alert alert-danger'>Sorry Password is Weak</h3> <h5 class='alert alert-danger'>Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special characte</h5>");

                }

              }else{
                echo("<h3 class='alert alert-danger'>Sorry Not Matched Password</h3>");
              }
            }else{
              echo("<h3 class='alert alert-danger'>Please accept our terms</h3>");
            }
            }
            ?>
            <h3>
              Register
            </h3>
            <form class="login-form" method="post">
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-user"></i>
                  <input type="text" id="" required class="form-control" name="name" placeholder="Username">
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-user"></i>
                  <input type="number" id="" required class="form-control" name="phone" placeholder="phone Number">
                </div>
              </div>
              <div class="form-group row">
                <div class="col">

                  <input type="text" id="carNum" required class="form-control" name="CarNum" placeholder="Car Number"> 
                </div>
                <div class="col">

                  <input type="text" id="carColor" required class="form-control" name="carColor" placeholder="Car Color"> 
                </div>
                <div class=" col">
                  
                  <input type="text" id="carLiesence" required class="form-control" name="carLiesence" placeholder="Car License Num"> 
                </div>
                <div class=" col">
                  
                  <input type="text" id="carModel" required class="form-control" name="carModel" placeholder="Car Model"> 
                </div>
              </div>


              <div class="form-group row">
                <div class="col">
                  <select name="lstCarNum[]" id="carNumOpt" multiple    size="4" class="form-control">

                  </select>
                </div>
                <div class="col">
                  <select name="lstCarColor[]" id="carColorOpt" multiple   size="4" class="form-control">
                    
                  </select>
                </div>
                <div class="col">
                  <select name="lstCarLisence[]" id="carLisenceOpt" multiple   size="4" class="form-control">
                    
                  </select>
                </div>
                <div class="col">
                  <select name="lstCarModel[]" id="carModelOpt" multiple   size="4" class="form-control">
                    
                  </select>
                </div>
              </div>

              <div class="form-group text-center">
                <input  type="button" id="addopt" class="btn  btn-success" style="width:50%" value="Add Car" >
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-user"></i>
                  <input type="text" id="addres" class="form-control" name="address" placeholder="Address">
                </div>
              </div>

              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-envelope"></i>
                  <input type="email" required id="" class="form-control" name="email" placeholder="Email Address">
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-lock"></i>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="input-icon">
                  <i class="lni-lock"></i>
                  <input type="password" name="repassword" class="form-control" placeholder="Retype Password">
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="chkterms" class="custom-control-input" id="checkedall">
                  <label class="custom-control-label" for="checkedall">By registering, you accept our
                    Terms & Conditions</label>
                </div>
              </div>
              <div class="text-center">
                <input type="submit" class="btn btn-common  log-btn" style="width:100%" name="submit" value="Register">
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