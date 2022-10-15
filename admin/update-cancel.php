<?php include('partials/menu.php'); ?>


<?php 
    //include('../config/constants.php');
         
        if(isset($_POST['cancel']))
        {
                
                $id_order = $_POST['id_order'];
                $status = $_POST['status'];
                                
                $sql2 = "UPDATE tbl_order 
                SET status = $status
                WHERE id_order='$id_order'
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);
                if($res2){
                $_SESSION['update'] = "<div class='success'>Order status updated successfully.</div>";
                header('location:'.SITEURL.'admin/manage-order.php');
                }
                /*elseif($status == "Cancelled"){

                    $_SESSION['update'] = "<div class='error'>Failed to update.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                    die();

                }
*/
            
        }
        
?>
<?php include('partials/footer.php'); ?>