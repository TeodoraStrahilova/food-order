<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>

        <?php 
        
            //CHeck whether id is set or not
            if(isset($_GET['id_order']))
            {
                //GEt the Order Details
                $id_order=$_GET['id_order'];

                //Get all other details based on this id
                //SQL Query to get the order details
                $sql = "SELECT * FROM tbl_order WHERE id_order=$id_order";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                //Count Rows
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Detail Available
                    $row=mysqli_fetch_assoc($res);

                    $status = $row['status'];

                }
                else
                {
                    //DEtail not Available/
                    //Redirect to Manage Order
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
            else
            {
                //REdirect to Manage ORder PAge
                header('location:'.SITEURL.'admin/manage-order.php');
            }
        
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Status:</td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){ echo "selected"; } ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>

                
            

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">

                        <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                    </td>
                </tr>

                <tr>
                    <td>
                    <a href="<?php echo SITEURL;?>admin/manage-order.php" class="btn-primary">Cancel</a>
                    </td>
                    <td></td>
                </tr>

            </table>
        
        </form>


        <?php 
            //CHeck whether Update Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //Get All the Values from Form
                $id_order = $_POST['id_order'];
                $status = $_POST['status'];


                //Update the Values
                $sql2 = "UPDATE tbl_order SET 
                    status = '$status'
                    WHERE id_order='$id_order'
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether update or not
                //And REdirect to Manage Order with Message
                if($res2==true)
                {
                    //Updated
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
                else
                {
                    //Failed to Update
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>