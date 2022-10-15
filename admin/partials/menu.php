<?php 

include('../config/constants.php');
include('login-check.php');

?>


<html>
    <head>
        <title>Food Order Website - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css"> 
    </head>
    
    <body>
        <!--Menu Section Starts -->
        <div class="menu text-center">
            <div class="wrapper">
                
                <?php
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin' ){ //
                ?>
            
                <ul>
                    <li> <a href="index.php">Home </a></li>
                    <li> <a href="manage-admin.php">Admins </a></li>
                    <li> <a href="manage-user.php">Users</a></li> 
                    <li> <a href="manage-category.php">Category </a></li>
                    <li> <a href="manage-food.php">Food </a></li>
                    <li> <a href="manage-order.php">Orders </a></li>
                    <li> <a href="logout.php">Logout </a></li>

                </ul>

                <?php
                    }else{         
                ?>
                <ul>
                    <li> <a href="index.php">Home </a></li>
                    <li> <a href="manage-user.php">Users</a></li> <!-- дали да има? -->
                    <li> <a href="manage-category.php">Category </a></li>
                    <li> <a href="manage-food.php">Food </a></li>
                    <li> <a href="manage-order.php">Orders </a></li>
                    <li> <a href="logout.php">Logout </a></li>
                </ul>
                <?php
                    }
                ?>

            </div>    

        </div>
        <!--Menu Section Ends -->