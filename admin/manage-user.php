<?php include('partials/menu.php'); ?>

        <!--Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Registered Users</h1>
                
                <!-- <br><br> -->

                <br><br><br>
                <!-- Button to add Admin-->
                <!-- <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br><br><br> -->

                <table class="tbl-full">
            <tr>
                <th>Serial Number</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date of registration </th>
            </tr>

            <?php 
                //query to get all admins
                $sql = "SELECT id,name,email,address,phone,reg_date FROM tbl_users";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //check whether the query is executed or not
                if($res==TRUE){
                    //count rows to check whether we have data in database or not
                    $count = mysqli_num_rows($res); //function to get all the rows in database

                    //$sn=1; //create a variable and assign the value


                    // check the num of rows
                    if($count>0){

                        //have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            //using while loop to get all the data
                            //and while loop will run as long as we have data

                            //get individual data
                            $id = $rows['id'];
                            $name = $rows['name'];
                            $email = $rows['email'];
                            $address = $rows['address'];
                            $phone = $rows['phone'];
                            $reg_date = $rows['reg_date'];

                            //display the values in table
                        
                        ?>
                        
                        <!-- id created only once -->
                        <tr>
                        <td><?php echo $id; ?> </td>
                        <td><?php echo $name;?> </td>
                        <td><?php echo $email;?> </td>
                        <td><?php echo $address;?> </td>
                        <td><?php echo $phone;?> </td>
                        <td><?php echo $reg_date;?> </td>
                        </tr>


                        <?php 

                        }
                    }
                    else {
                            //we don't have data 
                    }
                }

            ?>


        </table>  

            </div>   
        </div>
        <!--Main Content Section Ends -->
<?php include('partials/footer.php'); ?>