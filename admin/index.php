<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>
                <br><br>

                <div class="col-4 text-center">
                    
                    <?php 
                        
                        //$sql5 = "SELECT SUM(id) AS Total FROM tbl_users"; //status='Delivered'

                        $sql6 = "SELECT * FROM tbl_admin";
                        //Execute Query
                        $res6 = mysqli_query($conn, $sql6);
                        //Count Rows
                        $count6 = mysqli_num_rows($res6);

                    ?>

                    <h1><?php echo $count6; ?></h1>
                    <br />
                    <b>Admins</b> 
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        
                        //$sql5 = "SELECT SUM(id) AS Total FROM tbl_users"; //status='Delivered'

                        $sql5 = "SELECT * FROM tbl_users";
                        //Execute Query
                        $res5 = mysqli_query($conn, $sql5);
                        //Count Rows
                        $count5 = mysqli_num_rows($res5);

                    ?>

                    <h1><?php echo $count5; ?></h1>
                    <br />
                    <b>Users</b> 
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_categories";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    <b>Categories</b> 
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    <b>Foods</b> 
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Create SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(price) AS Total FROM tbl_details"; //status='Delivered'

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row4['Total'];

                    ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    <b>Revenue Generated</b> 
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        
                        //$sql5 = "SELECT SUM(id) AS Total FROM tbl_users"; //status='Delivered'
                        //$myDate = date("d");

                        $sql7 = "SELECT * FROM tbl_users WHERE reg_date BETWEEN '2022-09-10' AND '2022-09-22' ";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);

                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    <b>Users Registered Today</b> 
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        
                        //$sql5 = "SELECT SUM(id) AS Total FROM tbl_users"; //status='Delivered'
                        
                        $sql8 = "SELECT * FROM tbl_order WHERE order_date BETWEEN '2022-09-10' AND '2022-09-22' ";
                        //Execute Query
                        $res8 = mysqli_query($conn, $sql8);
                        //Count Rows
                        $count7 = mysqli_num_rows($res8);

                    ?>

                    <h1><?php echo $count7; ?></h1>
                    <br />
                    <b>Orders Made Today</b> 
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tbl_order";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    <b>Total Orders</b> 
                </div>

                <div class="clearfix"></div>

                

            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('partials/footer.php') ?>