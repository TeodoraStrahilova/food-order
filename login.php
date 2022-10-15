<?php include('partials-front/menu.php'); ?>


<?php
    //session_start();
?> 

<section class="categories text-center">
<div class="container">
    <div class="container_l">
        
        <?php include 'php/error-messages.php'; ?>

        <form method="POST" action="login-submit.php" class="login-email text-center">
        
            <h2 class="text-center">Login</h2> <br>
                    
            <div class="input-group ">
                <input type="text" name="email" placeholder="email" required>
            </div>
            
            <div class="input-group ">
                <input type="password" name="password" placeholder="password" required>
            </div>
                
            <div class="input-group ">
            <input type="submit" name="submit" value="Login" class="btn_l btn-primary">
            </div>

            <p class="text-center">Don't have an account? <br> <a href="<?php echo SITEURL; ?>register.php">Register here</a></p>

        </form>
    </div>
</div>
</section>

<?php include('partials-front/footer.php'); ?>



