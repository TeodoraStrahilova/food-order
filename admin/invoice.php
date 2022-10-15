<!--?php include('partials/menu.php'); ?-->
<html lang="en"> 
<head>
    <title>Invoice</title>
</head>
<!-- $html .= '';-->

<?php include('../config/constants.php'); ?>
<style><?php include('../css/style.css'); ?></style> 


<div class="main-content">
    <div class ="wrapper"><br><br>
        <h1 class="text-center">Invoice</h1>

        <br><br>

        <?php 
            
            $id_order=$_GET['id_order'];

            $sql = "SELECT o.id_order, u.name, u.phone, u.email,
            o.address, o.order_date, o.del_time, o.note, d.qty, 
            d.price, f.title
            FROM tbl_order o
            JOIN tbl_users u
            ON o.id_user = u.id
            JOIN tbl_details d
            ON d.id_order = o.id_order
            JOIN tbl_food f
            ON f.id = d.id_food
            WHERE o.id_order=$id_order 
            ";

            $res=mysqli_query($conn, $sql);

            if($res==true){
                $count = mysqli_num_rows($res);

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
                       
                        do{
                     
                             //$qty[] = $row['qty'];
                             //$title[] = $row['title'];
                             //$title[] = $row['title'].' ('. $row['qty'] .') '.' ($'. $row['price'] .') ';
                             $title[] = $row['title'].' ('. $row['qty'] .'*'.'$'. $row['price'] .'='.'$'.$row['qty']*$row['price'].') <br>';


                             $price = number_format($row['price'] * $row['qty']);
                             $price_total += $price;
                     
                        }
                        while($row = mysqli_fetch_assoc($res));
                     
                    $titles = implode(' ' , $title);
                    //$qtys = implode(',', $qty);
                    $price_t = $price_total + 3;
                }
                else{
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            }
        ?>

        <form action="" method="POST">
            <table class="container_l container_l_t" border="1">
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



            </table>
            
            <!--a target="_blank" href="<?php echo SITEURL; ?>admin/print-details.php?id_order=<?php echo $id_order; ?>" class="btn-primary btn">Print</!--a-->

        </form>
    </div>

</div>

</html>
<!--?php include('partials/footer.php'); ?-->

<!--?php

$dompdf = new Dompdf;
$dompdf -> loadHtml($html);
$dompdf -> setPaper('A4', 'portrait');
$dompdf -> render();
$dompdf -> stream('invoice.pdf');

?-->