<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>
  
                <br><br><br>

                <?php 
                
                if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; 
                        unset($_SESSION['update']);
                    }

                ?>


                <table class="tbl-full" sortable>
            <tr>
                <th>№</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Delivery time</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            <?php 
                        //Get all the orders from database
                        $sql = "SELECT tbl_order.id_order, tbl_users.name, tbl_users.phone, tbl_users.email,
                        tbl_order.address, tbl_order.order_date, tbl_order.del_time, tbl_order.status
                        FROM tbl_order 
                        JOIN tbl_users
                        ON tbl_order.id_user = tbl_users.id
                        ORDER BY status DESC"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id_order = $row['id_order'];
                                $name = $row['name'];
                                $phone = $row['phone'];
                                $email = $row['email'];
                                $address= $row['address'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $del_time = $row['del_time'];

                                ?>

                                    <tr>
                                        <td><?php echo $id_order; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $del_time; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'>$status</label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-order.php?id_order=<?php echo $id_order; ?>" class="btn-secondary">Update</a>
                                            <a href="<?php echo SITEURL; ?>admin/details-order.php?id_order=<?php echo $id_order; ?>" class="btn-secondary">Details</a> 
                                            <!--
                                            <br><br>
                                            <a href="<?php echo SITEURL; ?>admin/update-ready.php?id_order=<?php echo $id_order; ?>" class="btn-primary">Ready</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-cancel.php?id_order=<?php echo $id_order; ?>" name="cancel" class="btn-danger">Cancel</a>
                                            -->
                                        </td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>


        </table>  
    <!--?php 
        if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
    ?>                            
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a class="active" href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    <!?php
                }
            }
        
            else
                {
                    echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";                    
                }
    ?-->                      
    </div>
    
</div>



<?php include('partials/footer.php'); ?>