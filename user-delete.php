<?php 
    include('config/constants.php');
 
    if(isset($_GET['delete_all'])){

        $id = $_SESSION['id'];

        $sql = "DELETE FROM tbl_users WHERE id=$id";
        $res = mysqli_query($conn, $sql);

        session_destroy();
        $_SESSION['delete'] = "<div class='success'>admin deleted</div>";

        header('location:'.SITEURL.'index.php');
     }    

?>
