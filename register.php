<?php include('partials-front/menu.php'); ?>

<section class="categories text-center">
<div class="container">
    <div class="container_l">
        
        <?php include('php/error-messages.php') ?>           
    
        <form method="POST" class="login-email text-center">
        
        <h2 class="text-center">Register</h2> <br>
                
        <div class="input-group ">
            <input type="text" minlength="3" name="name" placeholder="Name" required>
        </div>

        <div class="input-group ">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group ">
            <input type="phone" name="phone" placeholder="Phone" required>
        </div>

        <div class="input-group ">
            <input type="address" name="address" placeholder="Address" required>
        </div>
        
        <div class="input-group ">
            <input type="password" minlength="8" name="password" placeholder="Password" required>
        </div>
            
        <div class="input-group ">
            <input type="password" minlength="8" name="cpassword" placeholder="Confirm password" required>
        </div>

        <div class="input-group ">
        <input type="submit" name="submit" value="Register" class="btn_l btn-primary">
        </div>

        <p class="text-center">Have an account? <br> <a href="<?php echo SITEURL; ?>login.php">Login here</a></p>


        </form>

        <?php

            if(isset($_POST['submit'])){
                
                $name =  $conn->real_escape_string($_POST['name']);
                $email = $conn->real_escape_string($_POST['email']);
                $phone = $conn->real_escape_string($_POST['phone']);
                $address = $conn->real_escape_string($_POST['address']);
         
                $password = $conn->real_escape_string($_POST['password']); //real_escape_string
                $cpassword = $conn->real_escape_string($_POST['cpassword']);
                
                $reg_date = date("Y-m-d h:i:sa");
               

                if ($password == $cpassword){
                    
                    $sql = "SELECT * FROM tbl_users WHERE email='$email'";
                    $res = mysqli_query($conn, $sql);

                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ //валиден имейл
                        $_SESSION['error'] = "<div class='error'>Email isn't invalid!</div>";
                            header("location:".SITEURL.'register.php');
                    }
                
                    else if (!preg_match("/^[a-zA-Z0-9]*$/", $name)){ //валидно име
                        $_SESSION['error1'] = "<div class='error'>Name isn't invalid!</div>";
                            header("location:".SITEURL.'register.php');
                    }

                    else if (!preg_match('/^[0-9]{10}+$/', $phone)){ //валиден телефон
                        $_SESSION['err-phone'] = "<div class='error'>Phone isn't invalid!</div>";
                            header("location:".SITEURL.'register.php');
                    }

                    else if(!$res -> num_rows > 0){
                        $hash = password_hash($password, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO tbl_users SET
                        name = '$name',
                        email = '$email',
                        phone = '$phone',
                        address = '$address',
                        password = '$hash', 
                        reg_date = '$reg_date'
                        ";

                        $res = mysqli_query($conn, $sql);
                        
                        
                            if($res==TRUE){
                                header("location:".SITEURL);    
                                
                                include 'reg-submit.php';
                                
                                $name = "";
                                $email = "";
                                $phone = "";
                                $address = "";
                                $_POST['password'] = "";
                                $_POST['cpassword'] = "";
                            }
                            else {
                                $_SESSION['failed-add'] = "<div class='error'>Failed to Register!</div>";
                                header("location:".SITEURL.'register.php');
                            } 

                            
                        }

                    
                    else {
                        $_SESSION['error-em'] = "<div class='error'>Email Already Exists!</div>";
                        header("location:".SITEURL.'register.php');
                    }

                }
            
                else {
                    $_SESSION['error-pas'] = "<div class='error'>Passwords not match!</div>";
                        header("location:".SITEURL.'register.php');

                }
            }
        ?>

    </div>
</div>
</section>

<?php include('partials-front/footer.php'); ?>
