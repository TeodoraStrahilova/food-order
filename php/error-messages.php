<?php

if (isset($_SESSION['error-pas'])) //checking passwords 
{
    echo $_SESSION['error-pas']; 
    unset($_SESSION['error-pas']); 
}

if (isset($_SESSION['failed-add'])) //failed to add user 
{
    echo $_SESSION['failed-add']; 
    unset($_SESSION['failed-add']); 
}

if (isset($_SESSION['error-em'])) //email is Already Exists
{
    echo $_SESSION['error-em']; 
    unset($_SESSION['error-em']); 
}               

if (isset($_SESSION['error'])) //email is invalid
{
    echo $_SESSION['error']; 
    unset($_SESSION['error']); 
} 

if (isset($_SESSION['error1'])) //name is invalid
{
    echo $_SESSION['error1']; 
    unset($_SESSION['error1']); 
} 

if (isset($_SESSION['err-phone'])) //name is invalid
{
    echo $_SESSION['err-phone']; 
    unset($_SESSION['err-phone']); 
}

if(isset($_SESSION['login'])){ //invalid password or email
    echo $_SESSION['login'];
    unset($_SESSION['login']);
}


?>