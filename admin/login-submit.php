<?php 
    include "../config/constants.php";
    //session_start();

    if(isset($_POST['submit']))
    {
        
        $username = $_POST['username'];
        $password = $_POST['password'];


        $ussername = strip_tags(mysqli_real_escape_string($conn, trim($username)));
        $password = strip_tags(mysqli_real_escape_string($conn, trim($password)));

        $sql = "SELECT * FROM tbl_admin WHERE username='".$username."' ";    
        $res =  mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            //password_verify($password, $hash);

            $row = mysqli_fetch_assoc($res);
            //$password_hash = $row['password'];

            /*if(password_verify($password,$password_hash)){
                //$_SESSION['login'] = "<div class='error text-center'>Login successfull!</div>";
                include 'reg-submit.php';
                header('location:'.SITEURL);
            }
            else{
                $_SESSION['login'] = "<div class='error text-center'>Password didn't match.</div>";
    
                header('location:'.SITEURL.'login.php');
    
            }

        }
        else{
            $_SESSION['login'] = "<div class='error text-center'>Email isn't valid!</div>";

            header('location:'.SITEURL.'login.php');
        */
        }



    }

?>