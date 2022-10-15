<?php include('partials-front/menu.php'); ?>


<h2 class="text-center">Change password</h2>

<section class="categories text-center">
    <div class="container">
        <div class="container_l">      

        <?php include 'php/error-messages.php'; ?>

        <?php $id_user = $_SESSION['id']; ?>

        <form method="POST" class="login-email text-center">
                            
                            <div class="input-group">
                            <input type="password" placeholder="Current password" name="current_pass" required>
                            </div>

                            <br>
                            <div class="input-group">
                            <input type="password" placeholder="New password" minlength="8" name="new_pass" required>
                            </div>

                            <br>
                            <div class="input-group">
                            <input type="password" placeholder="Confirm password" minlength="8" name="confirm_pass" required>
                            </div>
                        
                            <br>
                            <div class="input-group">
                                <input type="hidden" name="id" value="<?php echo $id_user; ?>">
                                <input type="submit" value="Change password" name="submit" class="btn_l btn-primary">
                            </div>

                        

                </form>

            </div>
</div>

<?php 

        if(isset($_POST['submit'])){

            $id_user = $_POST['id'];

            $current_pass = $conn->real_escape_string($_POST['current_pass']);
            $new_pass = $conn->real_escape_string($_POST['new_pass']);
            $confirm_pass = $conn->real_escape_string($_POST['confirm_pass']);

            //$current_pass1 = strip_tags(mysqli_real_escape_string($conn, trim($current_pass)));
            //$new_pass1= strip_tags(mysqli_real_escape_string($conn, trim($new_pass)));
            //$confirm_pass1 = strip_tags(mysqli_real_escape_string($conn, trim($confirm_pass)));


            $sql = "SELECT * FROM tbl_users WHERE id=$id_user AND password='$current_pass' ";

            $res = mysqli_query($conn, $sql);
                
            if($res==true){

                $count = mysqli_num_rows($res);

                if($count==1){

                    if($new_pass==$confirm_pass){

                    $row = mysqli_num_rows($res);
                    //$password_hash = $row['new_pass'];
                    $hash = password_hash($new_pass, PASSWORD_BCRYPT);

                        if(password_verify($new_pass, $hash)){
                        
                            $sql2 = "UPDATE tbl_users SET
                            password='$hash'
                            WHERE id=$id_user
                            ";

                            $res2 = mysqli_query($conn, $sql2);

                            if($res2==true){
                                $_SESSION['error'] = "<div class='error text-center'>Successfully changed password!</div>";
                                
                                header('location:'.SITEURL.'user-account.php');
                            }
                            else{
                                $_SESSION['error'] = "<div class='error text-center'>Failed to change password!</div>";
                                
                                header('location:'.SITEURL.'user-account.php');
                            }
                        }
                                            
                    }
                        else{
                            $_SESSION['error'] = "<div class='error text-center'>Password didn't match!</div>";

                            header('location:'.SITEURL.'user-account.php');
                        }

                }
                /*else{
                    //user doesn't exist set message and redirect
                    $_SESSION['error'] = "<div class='error'>User not found</div>";

                    //redirect the user
                    header('location:'.SITEURL.'user-pass.php');
                }*/
            }
        }

?>

<?php include('partials-front/footer.php'); ?>

<!-- php 

if(isset($_POST['submit'])){

    $id_user = $_SESSION['id'];

    $current_pass = $conn->real_escape_string($_POST['current_pass']);
    $new_pass= $conn->real_escape_string($_POST['new_pass']);
    $confirm_pass = $conn->real_escape_string($_POST['confirm_pass']);


    $sql = "SELECT * FROM tbl_users WHERE id=$id_user AND password='$current_pass";

    $res = mysqli_query($conn, $sql);

    if($res==true){

        $count = mysqli_num_rows($res);

        if($count==1){

            if($new_pass==$confirm_pass){

                $hash = password_hash($new_pass, PASSWORD_BCRYPT);

                $sql2 = "UPDATE tbl_users SET
                password='$hash'
                WHERE id=$id_user
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true){

                    ?> <p class="text-center">Successfully changed password!</p> <!?php                           
                    
                    header('location:'.SITEURL.'user-account.php');
                }
                else{
                    ?> <p class="text-center">Failed to change password!</p> <!?php                           
                    
                    header('location:'.SITEURL.'user-pass.php');
                }
            }
            
            else{
                ?> <p class="text-center">Password didn't match!</p> <!?php                           

                header('location:'.SITEURL.'user-pass.php');
            }

        }

    }

}

-->