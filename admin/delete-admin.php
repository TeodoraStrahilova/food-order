<?php 
    //include constants.php file
    include('../config/constants.php');

    // 1. get the ID of admin to be deleted
    $id = $_GET['id'];

    // 2. create SQL Query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //check the query executed successfully or not
   if($res==true){
        //query executed successfully and admin deleted
        //echo "admin deleted";

        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'>admin deleted</div>";

        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else{
        //failed to delete admin
        //echo "failed to delete admin";
    
        $_SESSION['delete'] = "<div class='error'>failed to delete admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }

    // 3. redirect to manage admin page with message (success/error)
?>