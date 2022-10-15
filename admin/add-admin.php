<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

        <?php if (isset($_SESSION['add'])) //checking whether the session is set or not
        {
            echo $_SESSION['add']; // display if set
            unset($_SESSION['add']); //remove message
        } ?>

        <form action="" method="POST">

        <table class="tbl-30"> 
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="full_name" placeholder="Enter your name"></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="Enter username"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Enter password"></td>
            </tr>

            <tr>
                <td colspan="2" >
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>



    </div>

</div>

<?php include('partials/footer.php'); ?>

<?php
//Process the value from Form and Save it in Database
//Check whether the button is clicked or not

if(isset($_POST['submit'])) {
    //Button Clicked
    //echo "Button Clicked";

    // 1.Get the Data from Form
    $full_name= $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password encryption with md5

    // 2. SQL Query to Save the data into database
    $sql = "INSERT INTO tbl_admin SET 
        full_name = '$full_name',
        username = '$username',
        password = '$password'
    ";

    
    // 3. Executing Query and saving data into database
    $res = mysqli_query($conn, $sql); // or die(mysqli_error());
    
    // 4. check whether the (query is executed) data is inserted or not and display appropriate message
    if($res==TRUE){
        //data inserted
        //echo "inserted";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
        //redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //failed to insert data
        //echo "failed";
        $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
        //redirect page to add admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }

}
    
?>