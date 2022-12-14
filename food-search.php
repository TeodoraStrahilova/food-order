<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
                error_reporting(0);
                //Get the Search Keyword
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                
            ?>


            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>
            <form action="" method="POST">
                <input type="search" name="search" placeholder="<?php echo $lang['search'] ?>" required>
                <input type="submit" name="submit" value="<?php echo $lang['search2'] ?>" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">

        <?php include 'php/cart.php' ?> <!-- -->

            <!-- <h2 class="text-center">Food Menu</h2> -->
 

            <?php 

                //SQL Query to Get foods based on search keyword
                //$search = burger '; DROP database name;
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //Check whether food available of not
                if($count>0)
                {
                    //Food Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the details
                        $id_food = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php 
                                    // Check whether image name is available or not
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="" class="img-responsive-food img-curve">
                                        <?php 

                                    }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price">$<?php echo $price; ?></p>
                                <p class="food-detail scroll">
                                    <?php echo $description; ?>
                                </p>
                                <br>

                                <?php include 'php/cart-log.php' ?>
                            </div>
                        </div>

                        <?php
                    }
                }
                else
                {
                    //Food Not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            
            ?>

            
            <div class="clearfix"></div>


        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>