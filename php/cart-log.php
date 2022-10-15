<?php
    if(isset($_SESSION['email'])){ //когато е влязъл в профила си 
        ?>
        
            <form action="" method="post">
                
                    <img src="images/food/<?php echo $fetch_food['image_name']; ?>" alt="">
                    <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                    <input type="hidden" name="id_food" value="<?php echo $id_food;?>"> 
                    <input type="hidden" name="title" value="<?php echo $title; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <input type="hidden" name="image_name" value="<?php echo $image_name; ?>">
                    <input type="number" name="qty" min="1"  value="<?php echo $qty=1; ?>" >
                    <input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
                
            </form>
                                                 
        
        <?php
        }else{  //когато не е влязъл в профила си потребителят
        ?>
                            
        <a href="<?php echo SITEURL; ?>login.php?food_id=<?php echo $id_food; ?>" class="btn btn-primary">Add to cart</a>
            
        <?php
            }
        ?>