<?php include('partials-front/menu.php'); ?>

    <!-- Categories Section Starts Here -->
    <h2 class="text-center"><?php echo $lang['category'] ?></h2>
    
    <!-- <section class="categories"> -->
        <div class="container">
            
            <?php 

                //Display all the categories that are active
                //Sql Query
                $sql = "SELECT * FROM tbl_categories WHERE active='Yes'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether categories available or not
                if($count>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                                              
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                            <div class="box-3 float-container ">
                                <?php 
                                    if($image_name=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not found.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Image" class="img-responsive img-curve">
                                        <div class="image__overlay image__overlay--primary">
                                            
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="image__title"><?php echo $title; ?></h3>
                            </div>
                            </div>
                        </a>

                        <?php
                    }
                }
                else
                {
                    //CAtegories Not Available
                    echo "<div class='error'>Category not found.</div>";
                }
            
            ?>     

            <div class="clearfix"></div>
        </div>
    <!-- </section> -->
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>