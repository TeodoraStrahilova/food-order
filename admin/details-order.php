<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class ="wrapper">
        <h1>Details of order</h1>

        <br><br>

        <?php 
            // 1. get the ID of selected admin
            $id_order=$_GET['id_order'];

            // 2. create sql query to get the details
            $sql = "SELECT o.id_order, u.name, u.phone, u.email,
            o.address, o.order_date, o.del_time, o.note, d.qty, 
            d.price, f.title, f.price
            FROM tbl_order o
            JOIN tbl_users u
            ON o.id_user = u.id
            JOIN tbl_details d
            ON d.id_order = o.id_order
            JOIN tbl_food f
            ON f.id = d.id_food
            WHERE o.id_order=$id_order 
            ";

            //execute the query
            $res=mysqli_query($conn, $sql);

            //check whether the query is executed or not
            if($res==true){
                //check whether the data is available ot not
                $count = mysqli_num_rows($res);

                //check whether we have admin data ot not
                if($count>0){
                    $row=mysqli_fetch_assoc($res);

                    $id_order = $row['id_order'];
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $order_date = $row['order_date'];
                    $del_time = $row['del_time'];
                    $note = $row['note'];
                    
                    $price_total = 0;
                    //$title[] = $row['title'];
                       

                    //$qty = $row['qty'];
                    //$price = $row['price'];
                    //$res2 = mysqli_fetch_assoc($res);
                    //if(mysqli_num_rows($res) > 0){
                        do{
                     
                            //$qty[] = $row['qty'];
                            //$title[] = $row['title'].' ('. $row['qty'] .') '.' ($'. $row['price'] .') ';
                            $title[] = '<tr><td>'.$row['title'].'</td> <td>'. $row['qty'] .'*'.'$'. $row['price'] .'='.'$'.$row['qty']*$row['price'].'</td></tr> ';

                            //$prices[] = $row['price'];

                            $price = number_format($row['price'] * $row['qty']);
                            $price_total += $price;
                     
                        }
                        while($row = mysqli_fetch_assoc($res));
                    //};
                     
                    $titles = implode(' ' , $title);
                    //$qtys = implode(',', $qty);
                    //$pricess = implode(',', $prices);
                    $price_t = $price_total + 3;
                }
                else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="tbl-px">
                <tr>
                    <td> <b>Order:</b> </td>
                    <td><?php echo $id_order;?></td>
                </tr>
                
                <tr>
                    <td> <b>Name:</b> </td>
                    <td><?php echo $name;?></td>
                </tr>

                <tr>
                    <td> <b>Phone:</b></td>
                    <td><?php echo $phone;?></td>
                </tr>
                
                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo $email;?></td>
                </tr>

                <tr>
                    <td><b>Address:</b></td>
                    <td><?php echo $address;?></td>
                </tr>

                <tr>
                    <td><b>Date:</b></td>
                    <td><?php echo $order_date;?></td>
                </tr>

                <tr>
                    <td><b>Delivery time:</b></td>
                    <td><?php echo $del_time;?></td>
                </tr>

                <tr>
                    <td><b>Note:</b></td>
                    <td><?php echo $note;?></td>
                </tr>

                <tr>
                    <td><b>Ordered food:</b></td>
                    <td><?php echo $titles;?></td>
                </tr>

                <!--<tr>
                    <td>Quantity:</td>
                    <td><?php echo $qtys;?></td>
                </tr> -->
                
                <tr>
                    <td><b>Shipping:</b></td>
                    <td>$3</td>
                </tr>

                <tr>
                    <td><b>Total Price:</b></td>
                    <td>$<?php echo $price_t;?></td>
                </tr>

                

                <tr>
                    <td>
                    <a href="<?php echo SITEURL;?>admin/manage-order.php" class="btn-primary">Cancel</a>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                    <a target="_blank" href="<?php echo SITEURL; ?>admin/print-details.php?id_order=<?php echo $id_order; ?>" class="btn-primary btn">Print</a>
                    </td>
                    <td></td>
                </tr>

            </table>
        </form>
    </div>

</div>


<?php include('partials/footer.php'); ?>