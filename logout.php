<?php include('partials-front/menu.php'); ?>


<?php
    //session_start();
    session_unset();
    session_destroy();
?> 
<br><br>
<h2 class="text-center">You have been logged out. <a href="login.php">Login again.</a></h2>
<p class="br"></p>
<?php include('partials-front/footer.php'); ?>