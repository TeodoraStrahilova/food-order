<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>

        <br><br>
                <!-- Button to add Admin-->
                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
                <br><br><br>

                <?php 
                
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }    

                    
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }    
                    
                if(isset($_SESSION['upload'])){
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }  
                
                if(isset($_SESSION['unauthorize'])){
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                } 

                if(isset($_SESSION['remove-failed'])){
                    echo $_SESSION['remove-failed'];
                    unset($_SESSION['remove-failed']);
                } 

                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                } 
                
                ?>


                <table class="tbl-full">
            <tr>
                <th>Serial Number </th>
                <th>Title </th>
                <th>Price </th>
                <th>Image </th>
                <th>Add date</th>
                <th>Active </th>
                <th>Actions </th>
                
            </tr>

            <?php
            
            //create sql query to get all the food
            $sql = "SELECT * FROM tbl_food";

            //execute the query
            $res = mysqli_query($conn, $sql);

            //count rows to check whether we have food or not
            $count = mysqli_num_rows($res);

            //create serial number variable and the set default value as 1 
            $sn=1;

                    
            if($count>0){
                //we have food in database
                //get the foods from database and display
                while($row=mysqli_fetch_assoc($res))
                {
                    // get the values from individual columns
                    $id = $row ['id'];
                    $title = $row ['title'];
                    $price = $row ['price'];
                    $image_name = $row ['image_name'];
                    $active = $row ['active'];
                    $add_date = $row ['add_date'];
                    ?>

                    <tr>
                        <td><?php echo $id; ?> </td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td>
                            <?php 
                            //check whether we have image or not
                            if($image_name=="")
                            {
                                //we do not have image, display error message
                                echo "<div class='error'>Image not added.</div>";
                            }
                            else
                            {
                                //we have image, display image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" height="90" width="100" class="img-curve">
                                <?php
                            }
                            ?>
                        </td>
                        
                        <td><?php echo $add_date; ?></td>   

                        <td><?php echo $active; ?></td>
                        
                        <td> 
                            <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Food</a>
                        </td>
                        
                    </tr>

                    <?php
                }
            }
            else 
            {
                //food not added in database
                echo "<tr><td colspan='7' class='error'> Food not added yet.</td></tr>";
            }
            ?>

            


        </table>  

    </div>
    
</div>

<?php include('partials/footer.php'); ?>