<?php

if(isset($_POST["submit"])){
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $userType = $_POST["userType"];
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
   
    if(emptyInputLogin($username, $pwd, $userType) != false){
        header("location: ../login.php?error=emptyInput");
        exit();
    }
    longinUser($conn, $username, $pwd, $userType, $userType);

}
else{
    header("location: ../login.php");
    exit();
}