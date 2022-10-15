<?php include('partials-front/menu.php'); ?>

<h2 class="text-center">Your account information</h2>

<section class="categories text-center">
    <div class="container">
        <div class="container_l">

        <?php include ('php/error-messages.php'); ?>

            <form action="" method="post" class="login-email text-center">            
                                
            <?php
                        
            $select_data = mysqli_query($conn, "SELECT * FROM `tbl_users` WHERE id = '".$_SESSION['id']."' ");    
            if($select_data==TRUE){
                $count = mysqli_num_rows($select_data);
            
                if($count > 0){
                            while($rows = mysqli_fetch_assoc($select_data)){
                                //$id = $_SESSION['id'];
                                $id = $rows['id'];
                                $name = $rows['name'];
                                $email = $rows['email'];
                                $phone = $rows['phone'];
                                $address = $rows['address'];
                                $reg_date = $rows['reg_date'];

            ?>                

                            <div class="input-group">
                            <input type="text" name="name" value="<?php echo $name;?>" readonly>
                            </div>
                                                
                            <div class="input-group">
                            <input type="email"  name="email" value="<?php echo $email;?>" readonly>
                            </div >
                                                    
                            <div class="input-group">
                            <input type="phone"  name="phone" value="<?php echo $phone;?>" readonly>
                            </div>
                                                
                            <div class="input-group">
                            <input type="text"  name="address" value="<?php echo $address;?>" readonly>
                            </div>
                                
                            <div class="input-group">
                            <input type="text"  name="reg_date" value="<?php echo $reg_date;?>" readonly>
                            </div>       

                            <br>
                            <div class="input-group">
                                <a href="<?php echo SITEURL;?>user-update.php" class="btn_l btn-primary">Update</a>
                            </div>

                            <!--div class="input-group">
                                <a href="<?php echo SITEURL;?>user-pass.php" class="btn_l btn-primary">Change password</a>
                            </!--div-->

                            <div class="input-group">
                            <a href="user-delete.php?delete_all" onclick="return confirm('Are you sure you want to delete account?');" class="btn_l btn-primary">Delete account</a>
                            </div>
                        
            </form>
            <?php
                            }
                        }
                    }
            ?>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>