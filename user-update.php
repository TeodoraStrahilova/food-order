<?php include('partials-front/menu.php'); ?>

<h2 class="text-center">Update information</h2>

<section class="categories text-center">
    <div class="container">
        <div class="container_l">

        <?php include('php/error-messages.php') ?>           
                                
            <?php
                        
                        $id_user = $_SESSION['id'];
                            
                        $sql="SELECT * FROM tbl_users WHERE id=$id_user";
        
                        $res=mysqli_query($conn, $sql);
            
                        if($res==true){
                            $count = mysqli_num_rows($res);
            
                            if($count==1){
                                
                                $row=mysqli_fetch_assoc($res);
            
                                $name = $row['name'];
                                $phone = $row['phone'];
                                $email= $row['email'];
                                $address = $row['address'];
                            }
                            else{
                                header('location:'.SITEURL.'user-account.php');
                            }
            
            ?>              
                        <form action="" method="post" class="login-email text-center">            
  
                            <div class="input-group">
                            <input type="text" minlength="3" placeholder="Name" name="name" value="<?php echo $name;?>">
                            </div>
                                                
                            <div class="input-group">
                            <input type="email" placeholder="Email" name="email" value="<?php echo $email;?>">
                            </div >
                                                    
                            <div class="input-group">
                            <input type="phone" placeholder="Phone number" name="phone" value="<?php echo $phone;?>">
                            </div>
                                                
                            <div class="input-group">
                            <input type="text" placeholder="Address" name="address" value="<?php echo $address;?>">
                            </div>
                                   
                            <br>
                            <div class="input-group">
                            <input type="hidden" name="id" value="<?php echo $id_user?>">
                            <input type="submit" name="submit" value="Update" class="btn_l btn-primary">
                            </div>

                            

<?php 

    if(isset($_POST['submit'])){

        $id_user = $_POST['id'];        
        $name =  $conn->real_escape_string($_POST['name']);
        $phone = $conn->real_escape_string($_POST['phone']);
        $email = $conn->real_escape_string($_POST['email']);
        $address = $conn->real_escape_string($_POST['address']);
    
        //$sql = "SELECT * FROM tbl_users WHERE id='$id_user'";
        //$res = mysqli_query($conn, $sql);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //валиден имейл
            $_SESSION['error'] = "<div class='error'>Email isn't invalid!</div>";
                header('location:'.SITEURL.'user-update.php');
        }
    
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)){ //валидно име
            $_SESSION['error'] = "<div class='error'>Name isn't invalid!</div>";
                header('location:'.SITEURL.'user-update.php');
        }

        else if (!preg_match('/^[0-9]{10}+$/', $phone)){ //валиден телефон
            $_SESSION['error'] = "<div class='error'>Phone isn't invalid!</div>";
                header('location:'.SITEURL.'user-update.php');
        }

        //if(!$res -> num_rows > 0){ трябва да се измисли проверка ако се въведе нов имейл или да не се въвежда нов само името адреса и телефона да се сменя ????

        $sql = "UPDATE tbl_users SET
        name = '$name',
        phone = '$phone',
        email = '$email',
        address = '$address'
        WHERE id='$id_user'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==true){

            $_SESSION['update'] = "<div class='success'>Information updated successfully!</div>";
            header('location:'.SITEURL.'user-account.php');
        }
        else{

            $_SESSION['update'] = "<div class='error'>Failed to update information!</div>";
            header('location:'.SITEURL.'user-account.php');
        }

    }  
    /*else {
        $_SESSION['error-em'] = "<div class='error'>Email Already Exists!</div>";
        header("location:".SITEURL.'user-update.php');
    }*/


?>

                            <div class="input-group">
                                <a href="<?php echo SITEURL;?>user-account.php" class="btn_l btn-primary">Cancel</a>
                            </div>

                        
            </form>
            <?php
                            }
                        
            ?>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>