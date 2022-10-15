<?php include('partials-front/menu.php'); ?>

<?php
if(isset($_POST['order_btn'])){

$id_user = $_SESSION['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$order_date = date("Y-m-d h:i:sa");
$shipping = 3;
$status = "Ordered";
$note = $_POST['note'];

$id_food = $_POST['id_food'];
$qty = $_POST['qty'];
$price = $_POST['price'];

$del_time = $_POST['del_time'];

$cart_query = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE id_user = $id_user");
$price_total = 0;

if(mysqli_num_rows($cart_query) > 0){
   while($product_item = mysqli_fetch_assoc($cart_query)){

        $qty = $product_item['qty'];
        $id_food = $product_item['id_food'];
        
        $price = number_format($product_item['price'] * $product_item['qty']);
        $price_total += $price;

   };
};


$price_t = $price_total + 3;

$order_query = mysqli_query($conn, "INSERT INTO `tbl_order`(id_user, shipping, order_date, status, address, del_time, note) VALUES('$id_user','$shipping','$order_date','$status','$address', '$del_time', '$note')") or die('query failed');
$last_id = $conn->insert_id;

$details_query = mysqli_query($conn, 
"INSERT INTO `tbl_details`(id_order, id_food, price, qty)  
SELECT $last_id, tbl_cart.id_food, tbl_food.price, tbl_cart.qty
FROM `tbl_cart` 
JOIN `tbl_food`
ON tbl_cart.id_food = tbl_food.id
WHERE tbl_cart.id_user = $id_user
");


if($cart_query && $order_query){ 
    mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE id_user = '$id_user'");

    header("location:".SITEURL.'order-page.php');    

}
//else{
//   header("location:".SITEURL.'empty-cart.php');
//}

}

?>

<h2 class="text-center">Complete your order</h2>

<section class="categories text-center">
    <div class="container">
        <div class="container_l">

            <form action="" method="post" class="login-email text-center">
                        
            <?php //Нещо не иска да работи с empty-cart.php, директно там прехвърля
            $id_user = $_SESSION['id'];
                $select_cart = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE id_user = '$id_user' ");
                
                //if(mysqli_num_rows($select_cart) > 0){
                    //while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    

                    $select_data = mysqli_query($conn, "SELECT name, email, phone, address FROM `tbl_users` WHERE id = '".$_SESSION['id']."' ");    
                         if(mysqli_num_rows($select_data) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_data)){
            ?>                
                            <div class="input-group">
                            <input type="text" placeholder="Name" name="name" value="<?php echo $fetch_cart['name'];?>" readonly>
                            </div>
                                                
                            <div class="input-group">
                            <input type="email" placeholder="Email" name="email" value="<?php echo $fetch_cart['email'];?>" readonly>
                            </div >
                                                    
                            <div class="input-group">
                            <input type="phone" placeholder="Phone number" name="phone" value="<?php echo $fetch_cart['phone'];?>" readonly>
                            </div>
                                                
                            <div class="input-group">
                            <input type="text" placeholder="Address" name="address" value="<?php echo $fetch_cart['address'];?>" required >
                            </div>

                            <select name="del_time" id="del_time" size="1"  class="input-group" required>
                            <option value="" > Choose a delivery time </option>
                            <option value="40min" > up to 40 minutes </option>
                            <option value="1hour" > up to 1 hour </option>
                            <option value="2hours" > up to 2 hours </option>
                            </select>

                            <div class="input-group">
                                <textarea name="note" rows="5" cols="31" placeholder="Notes to order."></textarea>
                            </div>
                                
                            <br>
                            <div class="input-group">
                                <input type="submit" value="Order now" name="order_btn" class="btn_l btn-primary">
                            </div>
                        
            </form>
            <?php
                            }
                        }
                        
                    //}
                //}//else{
                 //   header("location:".SITEURL.'empty-cart.php');
                //}
            
            ?>
        </div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>
