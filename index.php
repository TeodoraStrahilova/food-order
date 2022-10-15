<?php include('partials-front/menu.php');?>
 
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="<?php echo $lang['search'] ?>" required>
                <input type="submit" name="submit" value="<?php echo $lang['search2'] ?>" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <section class="categories">
        <div class="container">
            <div class="box-3 float-container ">
            <img src="images/img1.jpeg" alt="Paris" class="img-responsive img-curve">           
                <div class="image__overlay image__overlay--primary">
                    <h3 class="image__title">
                        <p class="text-center"> <?php echo $lang['1card-in'] ?></p>
                    </h3>
                </div>
            </div>

            <div class="box-3 float-container ">         
            <img src="images/img2.jpeg" alt="Paris" class="img-responsive img-curve">
                <div class="image__overlay image__overlay--primary">
                    <h3 class="image__title">
                        <p class="text-center"><?php echo $lang['2card-in'] ?></p>
                    </h3>
                </div>
            </div>

            <div class="box-3 float-container ">
            <img src="images/img3.jpeg" alt="Paris" class="img-responsive img-curve">  
                <div class="image__overlay image__overlay--primary">
                    <h3 class="image__title">
                        <p class="text-center"><?php echo $lang['3card-in'] ?></p>
                        <p class="text-center"><?php echo $lang['32card-in'] ?></p>
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <?php include('partials-front/footer.php'); ?>