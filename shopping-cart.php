<?php include('partials-front/menu.php'); ?>
     
<?php
if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `tbl_cart` SET qty = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:shopping-cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `tbl_cart` WHERE id = '$remove_id'");
   header('location:shopping-cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `tbl_cart`");
   header('location:shopping-cart.php');
}

?>

         <h1 class="text-center">Shopping cart</h1>
         <br><br>
				<table class="container_l container_l_t">
					<thead>
                        <th>Image</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Action</th>
					</thead>

                    <tbody>

                        <?php                                                   
                        $id_user = $_SESSION['id'];

                        $select_cart = mysqli_query($conn, 
                        //"SELECT * FROM `tbl_cart` WHERE id_user = '".$_SESSION['id']."' ");
                        "SELECT tbl_cart.id, tbl_cart.id_user, tbl_food.image_name, tbl_cart.id_food,
                        tbl_food.title, tbl_cart.qty, tbl_food.price
                        FROM `tbl_cart`
                        JOIN `tbl_food`
                        ON tbl_cart.id_food = tbl_food.id 
                        WHERE tbl_cart.id_user = $id_user 
                        ");

                        $grand_total = 0; //grand_total - total to pay
                        if(mysqli_num_rows($select_cart) > 0){
                            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        ?>

                        <tr>
                            <input type="hidden" name="id_user" value="<?php echo $fetch_cart['id_user']?>">
                            <td><img src="images/food/<?php echo $fetch_cart['image_name']; ?>" height="75" width="80" alt="" class="img-curve"></td>
                            
                            <input type="hidden" name="id_food" value="<?php echo $fetch_cart['id_food']?>"> 
                            <td><?php echo $fetch_cart['title']; ?></td>
                            
                            <td>$<?php echo number_format($fetch_cart['price']); ?></td>
                            <td>
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                                <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['qty']; ?>" >
                                <input type="submit" class="btn" value="Update" name="update_update_btn">
                            </form>   
                            </td>
                            <td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['qty']); ?></td>
                            <td><a href="shopping-cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="btn btn-primary"> &nbsp; <b>Remove</b> &nbsp; </a></td>
                        </tr>
                        <?php
                        $grand_total += $sub_total;  
                        
                            };
                        };
                    
                        ?>
                        
                        <tr>
                        <td></td>
                        <td colspan="3" align="right" > <b> Shipping: </b></td>
                        <td>$3</td>
                        <td></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td colspan="3" align="right" > <b> Total to pay: </b></td>
                            <td>$<?php echo $grand_total+3; ?></td> <!-- 3 for shipping-->
                            
                            <input type="hidden" name="price" value="<?php echo $grand_total;?>"> 

                            <td><a href="shopping-cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="btn btn-primary"> &nbsp; <b>Delete all</b>  &nbsp;  </a></td>
                        </tr>

                    </tbody>

                </table>

                <br><br><br>

                <h2 class="text-center">
                    <div class="input-group">
                        <?php if($grand_total > 3) { ?>
                        <a href="checkout.php" class=" btn btn-primary">Procced to checkout</a>
                        <?php } else { ?>
                        <a href="" class="btn" disabled>Procced to checkout</a>
                        <?php } ?>
                    </div>
                </h2>
					

<?php include('partials-front/footer.php'); ?>