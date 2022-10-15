<?php include('../config/constants.php'); ?>
<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        
<section class="categories text-center">
<div class="container">
    <div class="container_l">

        <h2 class="text-center">Login</h2>
        <br>
        <?php 
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        
        if(isset($_SESSION['no-login-message'])){
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>

        <!-- login form start -->
        
        <form action="" method="POST" class="login-email text-center"> 
        
        <div class="input-group ">
        <input type="text" name="username" placeholder="Enter Username">
        </div>
        
        <div class="input-group ">
        <input type="password" name="password" placeholder="Enter Password"> 
        </div>

        <div class="input-group ">
        <input type="submit" name="submit" value="Login" class="btn_l btn-primary">
        </div>

        </form>
        <!-- login form end -->

    </div>
</div>
</section>
    </body>
</html>

<?php 

    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //process for login
        // 1. get the data from login form

        $username = mysqli_real_escape_string($conn, $_POST['username']); // This is for escaping quotes '' "", it can make for everyone unwanted data

        $password = $_POST['password'];
        //$password = mysqli_real_escape_string($conn, $raw_password);

        // 2. sql to check whether the user with username and password exist or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' and password='$password'";
    
        // 3. execute the query
        $res =  mysqli_query($conn, $sql);

        // 4. count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1){
            //user available and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it
            
            $sql2 = "SELECT role FROM tbl_admin WHERE username='$username'";
            $res2 =  mysqli_query($conn, $sql2);


            $role = mysqli_fetch_array($res2);
            //$count2 = mysqli_num_rows($res2);
            
            //if($count2==1){
            $_SESSION['role'] = $role['role'];
            //redirect to home page/dashboard

            
            //if(isset($_SESSION['role']) == 'admin'){
            header('location:'.SITEURL.'admin/');
            //}
            //else{
            //header('location:'.SITEURL.'admin/');
            //}
        }
        else{
            //user not available and login fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password didn't match.</div>";

             //redirect to login
             header('location:'.SITEURL.'admin/login.php');

        }

    }

?>