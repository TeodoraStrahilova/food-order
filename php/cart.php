<?php
    if(isset($_POST['add_to_cart'])){

    $id_user = $_SESSION['id'];
    $id_food = $_POST['id_food'];
    //$title = $_POST['title'];
    $price = $_POST['price'];
    $image_name = $_POST['image_name'];
    $qty = $_POST['qty'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `tbl_cart` WHERE id_food = '$id_food' and id_user = '$id_user' "); //

    if(mysqli_num_rows($select_cart) > 0){
    
    ?>
    
    <p class="text-center">Food already added to cart!</p>
    
    
    <?php
    
    }else{
    $insert_food = mysqli_query($conn, "INSERT INTO `tbl_cart`(id_user, id_food, qty) VALUES('$id_user', '$id_food', '$qty')");
    ?>
    
    <p class="text-center">Food added to cart succesfully!</p>
        
    <?php
    }

    }
    ?>