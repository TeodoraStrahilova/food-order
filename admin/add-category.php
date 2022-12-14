<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
    <br><br>
    
    <?php 
    
    if (isset($_SESSION['add'])) //checking whether the session is set or not
        {
            echo $_SESSION['add']; // display if set
            unset($_SESSION['add']); //remove message
        } 
        
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>

    <br><br>

    <!-- Add Category from Starts -->
    <form action="" method="POST" enctype="multipart/form-data"> <!--enctype="multipart/form-data" - for upload files or images-->

    <table class="tbl-30">
        <tr>
            <td>Title: </td>
            <td>
                <input type="text" name="title" placeholder="Category title">
            </td>
        </tr>

        <tr>
            <td>Select image:</td>
            <td>
                <input type="file" name="image">
            </td>
        </tr>

        <tr>
            <td>Active: </td>
            <td>
                <input type="radio" name="active" value="Yes"> Yes
                <input type="radio" name="active" value="No"> No
            </td>
        </tr>

        <tr>
            <td colspan="2" >
                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
        </tr>
    </table>

    </form>
    <!-- Add Category from Ends -->
    
    <?php 
    
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //echo "clicked";

        // 1. get the value from category form
        $title = $_POST['title'];

        //for radio input, we need to check whether button is selected or not

        if(isset($_POST['active'])){
            // get the value from form
            $active = $_POST['active'];
        }

        else{
            //set the default value
            $active = "No";

        }

        //check whether the image is selected ot not and set the value image name accordingly
        //print_r($_FILES['image']);

        //die(); //break the code here

        if(isset($_FILES['image']['name'])){
            //upload the image
            // to upload we need name, source path and destination path
            $image_name = $_FILES['image']['name'];
            
            //upload the image only if image is selected
                if($image_name != ""){

                

                //auto rename image
                //get the extension of our image(jpg, png, gif, etc)e. g. "specialfood1.jpg"
                $ext = end(explode('.', $image_name));

                //rename image
                $image_name = "Food_Category_".rand(000, 999).'.'.$ext; //e.g. Food_Category_834.jpg



                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/".$image_name;

                //finally upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                //check whether the image is uploaded or not
                // and if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==false){
                    //set message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
                    
                    //redirect to add category page
                    header('location:'.SITEURL.'admin/add-category.php');

                    //stop the process
                    die();
                }
            }
        }
        else {
            //don't upload image and set the image_name value as blank
            $image_name = "";
        }

        // 2. create sql query to insert category into database
        $sql = "INSERT INTO tbl_categories SET
        title = '$title',
        image_name = '$image_name',
        active = '$active'
        ";

        // 3. execute the query and save in database
        $res = mysqli_query($conn, $sql);

        // 4. whether the query executed or not and data added or not
        if($res==true){
            //query executed and category added
            $_SESSION['add'] = "<div class='success'>Category added successfully.</div>";

            //redirect to manage category page
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else{
            //failed to add
            $_SESSION['add'] = "<div class='error'>Failed to add category.</div>";

            //redirect to manage category page
            header('location:'.SITEURL.'admin/add-category.php');
        }

    }
    
    ?>


    </div>
</div>

<?php include ('partials/footer.php');?>
