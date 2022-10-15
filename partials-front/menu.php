<?php include('config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="images/logo3.png" alt="Restaurant Logo" class="img-logo" >
                </a>
            </div>

            <div class="menu text-right">
                <ul>


                <?php
                    if(isset($_SESSION['email'])){ //когато е влязъл в профила си 
                ?>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>"><?php echo $lang['home'] ?></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php"><?php echo $lang['categories'] ?></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php"><?php echo $lang['afd'] ?></a>
                    </li>
                    
                    <li>
                    <a href="index.php?lang=en"><?php echo $lang['lang_en'];?> /</a>
                        <a href="index.php?lang=bg"><?php echo $lang['lang_bg'];?></a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>user-account.php"><img src="images/user.png" width="19" height="19"></a>
                    </li>        

                    <li>
                        <a href="<?php echo SITEURL; ?>shopping-cart.php"><img src="images/shopping-cart.png" alt="cart" width="20" height="20"></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>logout.php"><img src="images/log1.png" alt="login" width="21" height="21"></a>
                    </li>
                
                    

                    <?php
                        }else{  //когато не е влязъл в профила си потребителят
                    ?>

                    <li>
                        <a href="<?php echo SITEURL; ?>"><?php echo $lang['home'] ?></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php"><?php echo $lang['categories'] ?></a>
                    </li>
                    
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php"><?php echo $lang['afd'] ?></a>
                    </li>        
                            
                    <li>
                        <a href="index.php?lang=en"><?php echo $lang['lang_en'];?> /</a>
                        <a href="index.php?lang=bg"><?php echo $lang['lang_bg'];?></a>
                    </li>

                    <li>
                        <a href="<?php echo SITEURL; ?>register.php"><img src="images/user.png" width="19" height="19"></a> <!-- Profile? --> 
                    </li>

                    <?php
                        }
                    ?>
                    


                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->