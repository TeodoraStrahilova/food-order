<?php 
    include "config/constants.php";
    //session_start();

    if(isset($_POST['submit']))
    {
        
        $email = $conn->real_escape_string($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM tbl_users WHERE email='$email'";    
        $res =  mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            password_verify($password, $hash);

            $row = mysqli_fetch_assoc($res);
            $_SESSION['id']=$row['id'];
            $_SESSION['email']=$row['email'];

            header('location:'.SITEURL);
        }
        else{ //това не знам трябва ли ми
            $_SESSION['login'] = "<div class='error text-center'>Username or Password didn't match.</div>";

            header('location:'.SITEURL.'login.php');

        }

    }

?>