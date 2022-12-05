<?php

if(isset($_POST["submit"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdrepeat'];
    $userType = $_POST['userType'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat, $userType) != false){
        header("location: ../signup.php?error=emptyInput");
        exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../signup.php?error=invalidUid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if(pwdMatch($pwd, $pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordsDontMatch");
        exit();
    }
    if(UidExists($conn, $username, $email) != false){
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd, $userType);
}
else{
    header("location: ../signup.php");
    exit();
}