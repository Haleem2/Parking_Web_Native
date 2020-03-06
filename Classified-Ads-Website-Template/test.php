<div class="carousel-inner">
                <?php 
                include_once "offers.php";
                $off = new offers();
                $result = $off->getAll();
                $active = 'active';
                $i=0;
                while($row = mysqli_fetch_assoc($result)){
                     if($i == 0){
                                ?>

                              <div class="carousel-item  <?php echo($active);?>">

                                <?php
                                $i++;
                                }else{
                                ?>

                                    <div class="carousel-item">

                                <?php
                                }?>  
                       
                        <img src="assets/images/slider/<?php echo($row['offer_photo_name']) ?>" class="d-block w-100" alt="...">             
                        <div class="carousel-caption d-none d-md-block">
                            <div class="sliderContent text-center">
                                <h3 class="sliderContentTitle"><?php echo($row['offer_title']) ?></h3>
                                <h1 class="sliderContentShortDesc"><?php echo($row['offer_short_desc']) ?></h1>
                                <p class="sliderContentDesc lead"><?php echo($row['description']) ?></p>
                                <a class="btn btn-outline-warning back btn-offer" href="singleproduct.php?off=<?php echo($row['offer_id']) ?>">Read More</a>
                            </div>
                        </div>
                    </div>

                    <?php
                }
                ?>
    </div>