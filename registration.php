<?php
require_once ("vendor/autoload.php");
use Askme\Askme\Askme;

if($_POST)
{

    $firstname = htmlspecialchars(htmlentities(stripslashes(strip_tags($_POST['firstName']))));
    $lastname  = htmlspecialchars(htmlentities(stripslashes(strip_tags($_POST['lastName']))));
    $username  = htmlspecialchars(htmlentities(stripslashes(strip_tags($_POST['username']))));
    $email     = htmlspecialchars(htmlentities(stripslashes(strip_tags($_POST['email']))));
    $password  = htmlspecialchars(htmlentities(stripslashes(strip_tags($_POST['password']))));



   if($firstname == "" or $lastname == "" or $username == "" or $email == "" or $password == "")
    {
        echo "<script>alert('All fields are required')</script>";
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid email format";
    }
    else
    {
        $registrationObject = new Askme();
        $registrationObject->registration($_POST);
    }


}