<?php

include_once 'Connection.php';

if(isset($_REQUEST['btnregister'])){

    $name =  $_REQUEST['names'];
    $email =  $_REQUEST['email'];
    $password =$_REQUEST['passwords'];
    $role  = $_REQUEST['rolessystem'];


    $savequery = "INSERT INTO `registeration`(`Name`, `Email`, `Passowrd`, `Role_ID_FK`) VALUES ('$name','$email','$password',$role)";
    $result  = mysqli_query($conn,$savequery);
    if(!empty($result)){
        header("location: login.php");
    }
    else{
        header("location: login.php?errormsg= Please Try Again");
    }
   
}





?>