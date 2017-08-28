<?php
require_once ("vendor/autoload.php");
use Askme\Askme\Askme;



if(isset($_POST))
{


    $email = $_POST['username'];
    $password = $_POST['password'];



        if (empty($email) || empty($password))
        {
            echo "<script>alert('Fields are required')</script>";
        }
        else
        {
            $loginObject = new Askme();
            $loginObject->login($_POST);


        }



}