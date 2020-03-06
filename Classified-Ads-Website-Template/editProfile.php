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
              <li><a href="indexUser.php">Home /</a></li>
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
					
          <?php
            
            include_once "Car Owner.php";
            $owner= new Car_Owner();
            $owner->setID($_SESSION['id']);
            $data=$owner->GetDataById();

            if ($row=mysqli_fetch_assoc($data)) {
            ?>

            <h3 style="">
            Edit my Profile Form
            </h3>

            
            <form role="form" class="login-form" method="post" enctype="multipart/form-data">

            <table class="table table-striped">
                <tr>


					<?php  
					
          

					if (isset($_POST['btnUpate'])) {
            include_once "Car Owner.php";
					  $owner= new Car_Owner();
             $owner->setID($_SESSION['id']);
						$owner->setName($_POST['name']);
						$owner->setPhoneNum($_POST['phone']);
						$owner->setAddress($_POST['address']);
            $owner->setEmail($_POST['email']);
            

            $file = $_FILES['file'];
            // print_r($file);
            $fileName = $_FILES['file']['name'];
            $fileExtention = explode('.',$fileName);
            $actualFileExtention = strtolower(end($fileExtention));   
            $allowedExt = array('jpg','png','jpeg');




            $fileSize = $_FILES['file']['size'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            if(in_array($actualFileExtention,$allowedExt)){
              if($fileError === 0){
                 if($fileSize < 50000000) {
                      $fileNameNew = $row['Owner_Id'].'.'.$actualFileExtention;
                      // echo($row['Owner_Id']);
                      // echo($actualFileExtention);
                      // $_SESSION['photoname'] = $fileNameNew;
                      $fileDest = 'customer images/'.$fileNameNew;
                      move_uploaded_file($fileTmpName,$fileDest);
                      // echo('<img src="'.$fileDest.'" width=200 height=200 class="hello">');
                      $owner->setphotoName($fileNameNew);
                      $msg= $owner->UpdateProfile();

                        if ($msg=="ok") {
                        		echo("<h3 class='alert alert-success'>Your Profile Has Been Updated</h3>");
                          		header("Refresh:5 url=profile.php");
                        	}else if(strpos($msg,"UQphone")){
                        		echo("<h3 class='alert alert-danger'> Sorry this phone is used</h3>");
                        	}else if(strpos($msg,"UQemail")){
                        	 echo("<h3 class='alert alert-danger'> Sorry this mail is used</h3>");
                         }
                        

                      // if($msg=="ok"){
                      //     echo('<div class="alert alert-success text-center" role="alert">IFORMATIONS HAS BEEN UPDATED</div>');
                      //     $_SESSION['username'] = $_POST['editFName'] . ' ' . $_POST['editLName'];
                      //     header("Refresh:5; url=myaccount.php");
                      // }
                      // else
                      //     echo('<div class="alert alert-danger text-center" role="alert">ERROR IS : '.$msg);


                  }else{
                      echo("Too big!");
                  }
              }else{
                  echo("ERROR try again");
              }
          }else{
              echo("you cannt upload");
          }

      }



					// 	$msg= $owner->UpdateProfile();
					// 	if ($msg=="ok") {
					// 		echo("<h3 class='alert alert-success'>Your Profile Has Been Updated</h3>");
					// 		header("Refresh:5 url=profile.php");
					// 	}else if(strpos($msg,"UQphone")){
					// 		echo("<h3 class='alert alert-danger'> Sorry this phone is used</h3>");
					// 	}else if(strpos($msg,"UQemail")){
					// 	 echo("<h3 class='alert alert-danger'> Sorry this mail is used</h3>");
					//  }
					// 
					
					?>

                  <td colspan="2" style="text-align:center">
                    <div class="profilephoto">
                                  <!-- <div id="" class="rounded-circle d-block m-auto profilephoto" style="background:url('customer images/<?php //echo($row['customer_id']) ?>.jpg') no-repeat; background-size:cover" ><div id="profilephotohover" class="rounded-circle"><button id="btnUpload">Change Photo <i class="fas fa-camera"></i></button></div></div> -->
                                  <img width=200px height=200px class="rounded-circle d-block m-auto " id="img1" src="customer images/<?php echo($row['Photo_Name']); ?>" alt="">
                                  <div id="profilephotohover" class="rounded-circle"><div id="btnUpload"><hr>Change Photo <i class="fas fa-camera"></i></div></div>
                                  <input id="inputUpload" style="display:none;" type="file" name="file" onchange="showPhoto()" />
                      </div>
                  
                  </td>
                </tr>
                <tr>
                  <th scope="col">Name</th>
                  <td><input type="text" required class="form-control" name = "name" value="<?php echo($row['Name']); ?>"> </td>
                </tr>
                <tr>
                  <th scope="col">Email</th>
                  <td><input type="email" required class="form-control" name="email" value="<?php echo($row['Email']); ?>"> </td>
                </tr>

                <tr>
                  <th scope="col">Phone</th>
                  <td><input type="number" class="form-control" required name="phone" value="<?php echo($row['Phone_Number']); ?>"> </td>
                </tr>

                <tr>
                  <th scope="col">Address</th>
                  <td> <input type="text"  required name="address" class="form-control" value="<?php echo($row['Address']); ?>"> </td>
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
            
								
                <input type="submit" name="btnUpate" value="Update Your Profile" class="btn btn-common log-btn" style="width:100%;">
              
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
<script>
    $('#profilephotohover').click(function () {
        $('#inputUpload').click();
    });
    function showPhoto() {
            var file = document.getElementById('inputUpload').files[0];
            console.log(file);
            reader = new FileReader();
            // console.log(reader);
            reader.onloadend = function () {
                $('#img1').attr('src',reader.result);
                // console.log(reader.result);
            };

            reader.readAsDataURL(file);
        }
</script>